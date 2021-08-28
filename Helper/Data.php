<?php

namespace Pragnesh\MasterPassword\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * ScopeConfigInterface scopeConfig
     *
     * @var scopeConfig
     */
    protected $scopeConfig;

    public function getConfig($path){
        return  $this->scopeConfig->getValue('master_password_config/'.$path, ScopeConfigInterface::SCOPE_TYPE_DEFAULT);
    }
}
