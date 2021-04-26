<?php

use BauerKirch\CoronaWarnAppEventRegistration\LocationType;
use BauerKirch\CoronaWarnAppEventRegistration\QRCodePayloadGenerator;
use BauerKirch\CoronaWarnAppEventRegistration\QRCodePayloadReader;

require "vendor/autoload.php";

$reader = new QRCodePayloadReader();

$generator = new QRCodePayloadGenerator();
$url = $generator->generateQRCodeUrl(
    LocationType::temporaryClubActivity(),
    'Beschr',
    'Addr',
    null,
    new \DateTimeImmutable(),
    (new \DateTimeImmutable())->modify('+3 hours')
);

var_dump($url);
var_dump($reader->readUrl($url));
//var_dump($reader->readUrl($url)->getStartTime()->getTimestamp());
