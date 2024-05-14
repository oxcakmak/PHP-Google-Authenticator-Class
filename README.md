# PHP-Google-Authenticator-Class
PHP Google Authenticator Class. The easiest way to generate custom codes for google authenticator application with php.

### Usage:
include googleauth.php and base32.php
```php
<?php
include('base32.php');
$b32 = new Base32;

include('googleauth.php');
$ga = new GoogleAuth();

// How to generate key?
$generatedKey = $b32->fromString($email);

// $str = user@oxcakmak.com / $secret = user key
$forApp = 'otpauth://totp/'.$str.'?secret='.$secret;

// Verify code
$ga->checkCode($secret, $code) ? true : false;
```
