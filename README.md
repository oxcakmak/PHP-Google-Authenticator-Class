# PHP-Google-Authenticator-Class
PHP Google Authenticator Class. The easiest way to generate custom codes for google authenticator application with php. A PHP implementation of the Google Authenticator TOTP (Time-based One-Time Password) authentication system.

## Support Me

This software is developed during my free time and I will be glad if somebody will support me.

Everyone's time should be valuable, so please consider donating.

[https://buymeacoffee.com/oxcakmak](https://buymeacoffee.com/oxcakmak)

## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
  - [Basic Authentication](#basic-authentication)
  - [Generate Auth URL](#generate-auth-url)
  - [Base32 Encoding/Decoding](#base32-encodingdecoding)
- [Configuration](#configuration)
  - [Time Skew](#time-skew)
  - [Character Sets](#character-sets)
- [Security Considerations](#security-considerations)
- [License](#license)
- [Credits](#credits)

## Features

- Base32 encoding/decoding with multiple character set support
- TOTP (Time-based One-Time Password) validation
- Google Authenticator compatible
- Configurable time skew tolerance
- URL generator for QR code creation

## Installation

1. Download the `GoogleAuthenticator.php` file
2. Include it in your PHP project:
```php
require_once('GoogleAuthenticator.php');
```

## Usage

### Basic Authentication

```php
// Create a new instance
$ga = new GoogleAuthenticator();

// Verify a code
$secret = 'JBSWY3DPEHPK3PXP'; // Your base32 secret key
$code = '123456'; // Code from Google Authenticator app
$isValid = $ga->checkCode($secret, $code);

if ($isValid) {
    echo "Code is valid!";
} else {
    echo "Invalid code!";
}
```

### Generate Auth URL

```php
$ga = new GoogleAuthenticator();
$secret = 'JBSWY3DPEHPK3PXP'; // Your base32 secret
$account = 'user@example.com';
$issuer = 'MyApp';

$url = $ga->getOTPAuthUrl($account, $secret, $issuer);
// Result: otpauth://totp/MyApp:user@example.com?secret=JBSWY3DPEHPK3PXP&issuer=MyApp
```

### Base32 Encoding/Decoding

```php
$ga = new GoogleAuthenticator();

// Encode
$encoded = $ga->fromString('Hello World');

// Decode
$decoded = $ga->toString($encoded);
```

## Configuration

### Time Skew

You can adjust the time skew tolerance to account for clock differences:

```php
$ga = new GoogleAuthenticator();
$ga->skew = 1; // Accept codes from ±30 seconds (default is 5)
```

### Character Sets

Three character sets are available:

- `csRFC3548`: Standard RFC3548 character set
- `csSafe`: Human-friendly character set (eliminates confusing characters)
- `cs09AV`: MIME::Base32 compatible character set

```php
$ga = new GoogleAuthenticator();
$ga->setCharset(GoogleAuthenticator::csSafe);
```

## Security Considerations

- Store secret keys securely
- Use HTTPS for all authentication requests
- Consider rate limiting authentication attempts
- Never display or log OTP codes
- Implement backup codes for account recovery

## License

This project is licensed under the GNU General Public License v2.0 or later.

## Credits

- Original Base32 implementation by Shannon Wynter
- Google Authenticator implementation by Brian Rak
