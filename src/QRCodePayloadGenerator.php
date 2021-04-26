<?php
declare(strict_types=1);

namespace BauerKirch\CoronaWarnAppEventRegistration;

use BauerKirch\CoronaWarnAppEventRegistration\Exception\GenerateException;
use BauerKirch\CoronaWarnAppEventRegistration\Exception\InvalidArgumentException;
use BauerKirch\CoronaWarnAppEventRegistration\Internal\Pt\CrowdNotifierData;
use BauerKirch\CoronaWarnAppEventRegistration\Internal\Pt\CWALocationData;
use BauerKirch\CoronaWarnAppEventRegistration\Internal\Pt\QRCodePayload;
use BauerKirch\CoronaWarnAppEventRegistration\Internal\Pt\TraceLocation;

class QRCodePayloadGenerator
{
    public const CORONAWARNAPP_URL = 'https://e.coronawarn.app?v=1';

    /**
     * @throws GenerateException
     */
    public function generateQRCodeUrl(LocationType $locationType, string $description, string $address, ?int $defaultCheckInLengthInMinutes = null, ?\DateTimeInterface $startTime = null, ?\DateTimeInterface $endTime = null, string $url = null): string
    {
        if ($url === null) {
            $url = self::CORONAWARNAPP_URL;
        }

        $payload = $this->generatePayload($locationType, $description, $address, $defaultCheckInLengthInMinutes, $startTime, $endTime);

        return sprintf('%s#%s', $url, $payload);
    }

    /**
     * @throws GenerateException
     */
    public function generatePayload(LocationType $locationType, string $description, string $address, ?int $defaultCheckInLengthInMinutes = null, ?\DateTimeInterface $startTime = null, ?\DateTimeInterface $endTime = null): string
    {
        if (strlen($description) > 100) {
            throw new InvalidArgumentException('"description" must not exceed 100 characters.');
        }
        if (strlen($address) > 100) {
            throw new InvalidArgumentException('"address" must not exceed 100 characters.');
        }
        if (($startTime !== null || $endTime !== null) && $locationType->isPermanent()) {
            throw new InvalidArgumentException('"startTime" and "endTime" must be null when using a permanent location type.');
        }

        $crowd = new CrowdNotifierData();
        $crowd->setVersion(1);
        $crowd->setPublicKey($this->getPublicKey());
        $crowd->setCryptographicSeed($this->getCryptographicSeed());

        $location = new TraceLocation();
        $location->setVersion(1);
        $location->setDescription($description);
        $location->setAddress($address);

        if ($startTime !== null && $endTime !== null && !$locationType->isPermanent()) {
            $location->setStartTimestamp($startTime->getTimestamp());
            $location->setEndTimestamp($endTime->getTimestamp());
        }

        $locationData = new CWALocationData();
        $locationData->setVersion(1);
        $locationData->setType($locationType->getType());
        if ($defaultCheckInLengthInMinutes !== null) {
            $locationData->setDefaultCheckInLengthInMinutes($defaultCheckInLengthInMinutes);
        }

        $payload = new QRCodePayload();
        $payload->setVersion(1);
        $payload->setLocationData($location);
        $payload->setCrowdNotifierData($crowd);

        try {
            $payload->setVendorData($locationData->serializeToString());
            return base64_encode($payload->serializeToString());
        } catch (\Exception $e) {
            throw new GenerateException($e);
        }
    }

    /**
     * @throws GenerateException
     */
    public function generateQRCodeUrlFromDto(QRCodePayloadDto $dto, string $url = null): string
    {
        return $this->generateQRCodeUrl(
            $dto->getLocationType(),
            $dto->getDescription(),
            $dto->getAddress(),
            $dto->getDefaultCheckInLengthInMinutes(),
            $dto->getStartTime(),
            $dto->getEndTime(),
            $url
        );
    }

    /**
     * @throws GenerateException
     */
    public function generatePayloadFromDto(QRCodePayloadDto $dto): string
    {
        return $this->generatePayload(
            $dto->getLocationType(),
            $dto->getDescription(),
            $dto->getAddress(),
            $dto->getDefaultCheckInLengthInMinutes(),
            $dto->getStartTime(),
            $dto->getEndTime()
        );
    }

    private function getPublicKey(): string
    {
        return base64_decode('gwLMzE153tQwAOf2MZoUXXfzWTdlSpfS99iZffmcmxOG9njSK4RTimFOFwDh6t0Tyw8XR01ugDYjtuKwjjuK49Oh83FWct6XpefPi9Skjxvvz53i9gaMmUEc96pbtoaA');
    }

    private function getCryptographicSeed(): string
    {
        return random_bytes(16);
    }
}
