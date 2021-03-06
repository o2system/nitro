![alt text](https://repository-images.githubusercontent.com/68189900/0618cc80-5ca1-11ea-832d-7d26204da454 "O2System Curl Atom")

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/o2system/curl/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/o2system/curl/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/o2system/curl/badges/build.png?b=master)](https://scrutinizer-ci.com/g/o2system/curl/build-status/master)
[![Latest Stable Version](https://poser.pugx.org/o2system/curl/v/stable)](https://packagist.org/packages/o2system/curl)
[![Total Downloads](https://poser.pugx.org/o2system/curl/downloads)](https://packagist.org/packages/o2system/curl)

# O2System Curl

O2System Curl is a PHP Lightweight HTTP Request Client Library which is build for working more powerful with O2System Framework, but also can be used for integrated with others as standalone version with limited features.

Features
--------
- Utility methods to call GET, HEAD, POST, PUT, DELETE, CONNECT, OPTIONS, TRACE, PATCH requests.
- Supports form parameters, file uploads and custom body entities.
- Supports gzip compression.
- Supports Basic, Digest, Negotiate, NTLM Authentication natively.
- Customizable timeout.
- Customizable default headers for every request (DRY).
- Automatic response parsing for JSON, XML, HTML and PHP Serialize Parsing into a native object.
- Multiple request support.

### Composer Instalation
The best way to install O2System Curl is to use [Composer](https://getcomposer.org)
```
composer require o2system/curl
```
> Packagist: [https://packagist.org/packages/o2system/curl](https://packagist.org/packages/o2system/curl)

### Usage
```php
use O2System\Curl;
use O2System\Kernel\Http\Message\Uri;

// Single Request
$request = new Curl\Request();
$request->setUri( new Uri() )->withHost( 'api.o2system.id' )->withPath( 'testing');

// Multi Request
$multirequest = new Curl\MultiRequest();
$multirequest->register( $request );

// Get single response
$response = $request->get();

// Get multiple responses
$responses = $multirequest->get();
```

Documentation is available on this repository [wiki](https://github.com/o2system/curl/wiki) or visit this repository [github page](https://o2system.github.io/curl).

### Ideas and Suggestions
Please kindly mail us at [contact@o2system.id](mailto:contact@o2system.id])

### Bugs and Issues
Please kindly submit your [issues at Github](http://github.com/o2system/curl/issues) so we can track all the issues along development and send a [pull request](http://github.com/o2system/curl/pulls) to this repository.

### System Requirements
- PHP 7.2+ with (JSON, SimpleXML Extension)
- [Composer](https://getcomposer.org)
- [O2System Kernel](https://github.com/o2system/kernel)