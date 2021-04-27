<?php
declare(strict_types=1);

namespace BauerKirch\CoronaWarnAppEventRegistration;

use BauerKirch\CoronaWarnAppEventRegistration\Exception\InvalidArgumentException;
use BauerKirch\CoronaWarnAppEventRegistration\Exception\ReadException;
use BauerKirch\CoronaWarnAppEventRegistration\Internal\Pt\CWALocationData;
use BauerKirch\CoronaWarnAppEventRegistration\Internal\Pt\QRCodePayload;

class QRCodePayloadReader
{
    /**
     * @throws ReadException
     */
    public function readUrl(string $url): QRCodePayloadDto
    {
        if (strpos($url, '#') === false) {
            throw new InvalidArgumentException('Invalid URL given.');
        }

        [, $payload] = explode('#', $url);

        return $this->readPayload($payload);
    }

    /**
     * @throws ReadException
     */
    public function readPayload(string $payload): QRCodePayloadDto
    {
        $internalPayload = new QRCodePayload();
        $internalLocationData = new CWALocationData();
        try {
            $internalPayload->mergeFromString(Base64UrlUtil::decode($payload));
            $internalLocationData->mergeFromString($internalPayload->getVendorData());
        } catch (\Exception $e) {
            throw new ReadException($e);
        }

        $startTimestamp = (int) $internalPayload->getLocationData()->getStartTimestamp();
        $endTimestamp = (int) $internalPayload->getLocationData()->getEndTimestamp();
        $startTime = null;
        $endTime = null;
        if ($startTimestamp > 0 && $endTimestamp > 0) {
            $startTime = (new \DateTimeImmutable())->setTimestamp($startTimestamp);
            $endTime = (new \DateTimeImmutable())->setTimestamp($endTimestamp);
        }

        return new QRCodePayloadDto(
            new LocationType($internalLocationData->getType()),
            $internalPayload->getLocationData()->getDescription(),
            $internalPayload->getLocationData()->getAddress(),
            $internalLocationData->getDefaultCheckInLengthInMinutes(),
            $startTime,
            $endTime
        );
    }
}
