# PHP-Google-Authenticator-Class
PHP Google Authenticator Class. The easiest way to generate custom codes for google authenticator application with php.

### Usage:
include authenticator.php
```php
/*
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
 * [GOOGLE AUTH]
 * @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
*/
include('authenticator.php');
```
you will create a password for the user or the domain you will use
```php
/* user code, username, user email etc. */
$b32->fromString("area");
```
For the person or area you want to log in within the application.
```php
/*
 *  Use this field to generate qr code
 *  https://github.com/oxcakmak/PHP-QR-Code-Class
*/
echo gaCode($username, $user['gaSecretCode']);
```
To check the valid 30 second code generated within the application
```php
/*
 *  These fields are written as examples.
 *  In 2-step verification systems, you can store users' keys with jwt tokens as security.
*/
if(gaVerify($code, $user['gaSecretCode'])){
  /* Database, execute functions etc.*/
}else{ /* if code false then */ }
```
