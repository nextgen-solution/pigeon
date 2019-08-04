# Pigeon SDK

[Pigeon document is here!](https://documenter.getpostman.com/view/6412926/SVYkyMqq)

## Installation

1. Install via composer `composer require nextgen-solution/pigeon-sdk`
2. Publish configuration `php artisan vendor:publish`
3. Enjoy!

## Interface

```
/**
 * Send an email to recipient via Pigeon's service.
 *
 * @param  string $recipient
 * @param  string $template
 * @param  array $params
 * @return  array
 */
Pigeon::mail($recipient, $template, array $params = [])

/**
 * Send a text to recipient via Pigeon's service.
 *
 * @param  string $recipient
 * @param  string $template
 * @param  array $params
 * @return  array
 */
Pigeon::text($recipient, $template, array $params = [])

/**
 * Request Pigeon to generate an OTP and send it via mail.
 *
 * @param  string $recipient
 * @param  string $template
 * @return  array
 */
Pigeon::otpMail($recipient, $template)

/**
 * Request Pigeon to generate an OTP and send it via text.
 *
 * @param  string $recipient
 * @param  string $template
 * @return  array
 */
Pigeon::otpText($recipient, $template)

/**
 * Verify user's OTP.
 *
 * @param  string $recipient
 * @param  string $otp
 * @param  string $reference
 * @return  array
 */
Pigeon::otpVerify($recipient, $otp, $reference)
```
