# bauer-kirch/cwa-event-registration-url

This PHP library allows generating Check-In URLs for the [Corona Warn App](https://www.coronawarn.app/) which can then be used to generate a QR code from. Moreover, event details can be extracted from existing Check-In URLs.

This library does not generate a QR code image. A dedicated library for QR code generation can be used for that, either in PHP or client side using JavScript. A QR code generated from the check-in URL will open the [Corona Warn App](https://www.coronawarn.app/) on mobile devices.

## Installation

```sh
composer require bauer-kirch/cwa-event-registration-url
```

## Usage

### Reading URLs

```php
use BauerKirch\CoronaWarnAppEventRegistration\QRCodePayloadReader;

$url = 'https://e.coronawarn.app/?v=1#CAESR...';
$reader = new QRCodePayloadReader();
$result = $reader->readUrl($url);
echo $result->getDescription();
```

### Generating URLs

```php
use BauerKirch\CoronaWarnAppEventRegistration\LocationType;
use BauerKirch\CoronaWarnAppEventRegistration\QRCodePayloadGenerator;

$generator = new QRCodePayloadGenerator();
$url = $generator->generateQRCodeUrl(
    LocationType::permanentWorkplace(),
    'Bauer + Kirch GmbH',
    'Pascalstr. 57, 52076 Aachen',
    120 // default check-in time in minutes
);
echo $url;
```
