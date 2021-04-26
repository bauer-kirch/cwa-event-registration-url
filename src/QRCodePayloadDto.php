<?php
declare(strict_types=1);

namespace BauerKirch\CoronaWarnAppEventRegistration;

class QRCodePayloadDto
{
    private $locationType;
    private $description;
    private $address;
    private $defaultCheckInLengthInMinutes;
    private $startTime;
    private $endTime;

    public function __construct(LocationType $locationType, string $description, string $address, ?int $defaultCheckInLengthInMinutes = null, ?\DateTimeInterface $startTime = null, ?\DateTimeInterface $endTime = null)
    {
        $this->locationType = $locationType;
        $this->description = $description;
        $this->address = $address;
        $this->defaultCheckInLengthInMinutes = $defaultCheckInLengthInMinutes;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getLocationType(): LocationType
    {
        return $this->locationType;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getDefaultCheckInLengthInMinutes(): ?int
    {
        return $this->defaultCheckInLengthInMinutes;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }
}
