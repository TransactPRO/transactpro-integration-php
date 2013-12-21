TransactPRO PHP integration
===============
[![Build Status](https://travis-ci.org/TransactPRO/integration-php.png?branch=master)](https://travis-ci.org/TransactPRO/integration-php)

# About
Library provide ability to make requests to TransactPRO Gateway API.

Library are supported by independent developers, and not by TransactPRO. So, submit all requests, issues and questions directly here (on GitHub).

Library provided as is.

You must adopt library for your projects by yourselves, we only provide basic functionality to make requests.

# Installation

### Composer
Preferred way of installation is through [composer](http://getcomposer.org/).

Add to your composer.json:
```
"repositories": [
    { "type": "git", "url": "https://github.com/TransactPRO/integration-php" }
],
"require": {
    "transact-pro/gate": "master",
}
```

And then install with:
```
$ composer.phar install
```

# Usage
[UNDER CONSTRUCTION]

# Testing
If you wish to run tests, you need to install development dependencies:
```
$ composer.phar install --dev
```

And then you can run them with:
```
$ vendor/bin/phpunit
```