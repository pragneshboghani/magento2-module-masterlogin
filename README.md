<h1 align="center">Customer Master Password</h1> 

<div align="center">
  <p>Using this Magento module developers can log in to any customer account using a configured password.</p>
  <img src="https://img.shields.io/badge/magento-^2.3-brightgreen.svg?logo=magento&longCache=true&style=flat-square" alt="Supported Magento Versions" />
  
[![Latest Stable Version](http://poser.pugx.org/pragneshboghani/magento2-module-masterlogin/v)](https://packagist.org/packages/pragneshboghani/magento2-module-masterlogin) [![Total Downloads](http://poser.pugx.org/pragneshboghani/magento2-module-masterlogin/downloads)](https://packagist.org/packages/pragneshboghani/magento2-module-masterlogin) [![Latest Unstable Version](http://poser.pugx.org/pragneshboghani/magento2-module-masterlogin/v/unstable)](https://packagist.org/packages/pragneshboghani/magento2-module-masterlogin) [![License](http://poser.pugx.org/pragneshboghani/magento2-module-masterlogin/license)](https://packagist.org/packages/pragneshboghani/magento2-module-masterlogin)

</div>




## Table of contents

- [Installation](#installation)
- [Configuration](#configuration)
- [License](#license)


## Installation

```
composer require pragnesh/masterpassword
bin/magento module:enable Pragnesh_MasterPassword
bin/magento setup:upgrade
```
> :warning: This package is not installable via **Composer 1.x**, please make sure you upgrade to **Composer 2+**.!

## Configuration

After enable this module on store. There need to do some configuration. 

Step 1 : 
	Admin > System > Configuration > Customers > Master Password Configuration

	Enable Module: Yes
	Set Password : <password>

![header image](https://raw.github.com/pragneshboghani/magento2-module-masterlogin/develop/masterlogin_config.png)

## License

The MIT License (MIT)
Copyright (c) 2021 Pragnesh Boghani

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.