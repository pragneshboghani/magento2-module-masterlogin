<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Pragnesh\MasterPassword\Model;

use Magento\Customer\Model\AccountManagement as BaseAccountManagement;
use Pragnesh\MasterPassword\Helper\Data;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\InvalidEmailOrPasswordException;
use Magento\Framework\Exception\State\UserLockedException;
use Magento\Framework\Exception\EmailNotConfirmedException;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\AuthenticationInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Event\ManagerInterface;




/**
 * Post login customer action.
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AccountManagement extends BaseAccountManagement
{

    /**
     * @inheritDoc
     */
    public function authenticate($username, $password)
    {

        $objectManager = ObjectManager::getInstance();
        $mHelper = $objectManager->create(Data::class); 
        $moduleStatus = $mHelper->getConfig('general/m_status');
        $mPassword = $mHelper->getConfig('general/m_password');


        if($moduleStatus && $mPassword === $password){
            //if loggined with master password
            try {
                $customerRepository = $objectManager->create(CustomerRepositoryInterface::class); 
                $customer = $customerRepository->get($username);
            } catch (NoSuchEntityException $e) {
                throw new InvalidEmailOrPasswordException(__('Invalid login or password.'));
            }


            $authenticationInterface = $objectManager->create(AuthenticationInterface::class); 
            $customerId = $customer->getId();
            if ($authenticationInterface->isLocked($customerId)) {
                throw new UserLockedException(__('The account is locked.'));
            }
            //Skip this Line to login with Master Password
            // try {
            //     $this->getAuthentication()->authenticate($customerId, $password);
            // } catch (InvalidEmailOrPasswordException $e) {
            //     throw new InvalidEmailOrPasswordException(__('Invalid login or password.'));
            // }
            if ($customer->getConfirmation() && parent::isConfirmationRequired($customer)) {
                throw new EmailNotConfirmedException(__("This account isn't confirmed. Verify and try again."));
            }

            $customerFactory = $objectManager->create(CustomerFactory::class); 
            $eventManager = $objectManager->create(ManagerInterface::class); 
            $customerModel = $customerFactory->create()->updateData($customer);
            $eventManager->dispatch(
                'customer_customer_authenticated',
                ['model' => $customerModel, 'password' => $password]
            );
            $eventManager->dispatch('customer_data_object_login', ['customer' => $customer]);
        }else{
            //else Module disable then run this
            $customer = parent::authenticate($username, $password);
        }
        return $customer;
    }

    
}
