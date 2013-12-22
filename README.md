TransactPRO PHP integration
===============
[![Build Status](https://travis-ci.org/TransactPRO/integration-php.png?branch=master)](https://travis-ci.org/TransactPRO/integration-php)

# About
**Author**: Dmitry Vrublevskis  
**Contact**: d.vrublevskis@gmail.com

Library provide ability to make requests to TransactPRO Gateway API.  
Library are supported by independent developers, and not by TransactPRO. So, submit all requests, issues and questions directly here (on GitHub).  
Library provided as is.  
You must adopt library for your projects by yourselves, we only provide basic functionality to make requests.  

# Installation
### Composer
Recommended way of installation is through [composer](http://getcomposer.org/).  
Add to your composer.json:
```javascript
"repositories": [
    { "type": "git", "url": "https://github.com/TransactPRO/integration-php" }
],
"require": {
    "transact-pro/gate": "master",
}
```
And then install with:
```bash
$ composer.phar install
```

# Usage
### Create gate client
| Field     | Mandatory | Type   | Description                                                          |
|-----------|-----------|--------|----------------------------------------------------------------------|
| apiUrl    | yes       | string | Api URL. Can be aquired via Integration manual.                      |
| guid      | yes       | string | Merchant GUID.                                                       |
| pwd       | yes       | string | Unecrypted password. It will be encrypted by client.                 |
| verifySSL | no        | bool   | Default: ```true```. Must be set to ```false``` for test environment |

#### Basic client
```php
use TransactPRO\Gate\GateClient;

$gateClient = new GateClient(array(
	'apiUrl'    => 'https://www.payment-api.com',
    'guid'      => 'AAAA-AAAA-AAAA-AAAA',
    'pwd'       => '111'
));

```

#### Client with disabled SSL check.
```php
use TransactPRO\Gate\GateClient;

$gateClient = new GateClient(array(
	'apiUrl'    => 'https://www.payment-api.com',
    'guid'      => 'AAAA-AAAA-AAAA-AAAA',
    'pwd'       => '111',
    'verifySSL' => false
));

```

# Tests
If you wish to run tests, you need to install development dependencies:
```bash
$ composer.phar install --dev
```
And then run them with:
```bash
$ vendor/bin/phpunit
```