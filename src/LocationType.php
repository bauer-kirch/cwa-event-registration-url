<?php
declare(strict_types=1);

namespace BauerKirch\CoronaWarnAppEventRegistration;

use BauerKirch\CoronaWarnAppEventRegistration\Exception\InvalidArgumentException;
use BauerKirch\CoronaWarnAppEventRegistration\Internal\Pt\TraceLocationType;

class LocationType
{
    public const LOCATION_TYPE_UNSPECIFIED = TraceLocationType::LOCATION_TYPE_UNSPECIFIED; // 0
    public const LOCATION_TYPE_PERMANENT_OTHER = TraceLocationType::LOCATION_TYPE_PERMANENT_OTHER; // 1
    public const LOCATION_TYPE_TEMPORARY_OTHER = TraceLocationType::LOCATION_TYPE_TEMPORARY_OTHER; // 2
    public const LOCATION_TYPE_PERMANENT_RETAIL = TraceLocationType::LOCATION_TYPE_PERMANENT_RETAIL; // 3
    public const LOCATION_TYPE_PERMANENT_FOOD_SERVICE = TraceLocationType::LOCATION_TYPE_PERMANENT_FOOD_SERVICE; // 4
    public const LOCATION_TYPE_PERMANENT_CRAFT = TraceLocationType::LOCATION_TYPE_PERMANENT_CRAFT; // 5
    public const LOCATION_TYPE_PERMANENT_WORKPLACE = TraceLocationType::LOCATION_TYPE_PERMANENT_WORKPLACE; // 6
    public const LOCATION_TYPE_PERMANENT_EDUCATIONAL_INSTITUTION = TraceLocationType::LOCATION_TYPE_PERMANENT_EDUCATIONAL_INSTITUTION; // 7
    public const LOCATION_TYPE_PERMANENT_PUBLIC_BUILDING = TraceLocationType::LOCATION_TYPE_PERMANENT_PUBLIC_BUILDING; // 8
    public const LOCATION_TYPE_TEMPORARY_CULTURAL_EVENT = TraceLocationType::LOCATION_TYPE_TEMPORARY_CULTURAL_EVENT; // 9
    public const LOCATION_TYPE_TEMPORARY_CLUB_ACTIVITY = TraceLocationType::LOCATION_TYPE_TEMPORARY_CLUB_ACTIVITY; // 10
    public const LOCATION_TYPE_TEMPORARY_PRIVATE_EVENT = TraceLocationType::LOCATION_TYPE_TEMPORARY_PRIVATE_EVENT; // 11
    public const LOCATION_TYPE_TEMPORARY_WORSHIP_SERVICE = TraceLocationType::LOCATION_TYPE_TEMPORARY_WORSHIP_SERVICE; // 12

    private $type;

    public function __construct(int $type)
    {
        if ($type < 0 || $type > 12) {
            throw new InvalidArgumentException('Invalid value passed for "type" parameter.');
        }

        $this->type = $type;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function isPermanent(): bool
    {
        return $this->type === 1 || ($this->type >= 3 && $this->type <= 8);
    }

    public static function unspecified(): self
    {
        return new self(self::LOCATION_TYPE_UNSPECIFIED);
    }
    public static function permanentOther(): self
    {
        return new self(self::LOCATION_TYPE_PERMANENT_OTHER);
    }
    public static function temporaryOther(): self
    {
        return new self(self::LOCATION_TYPE_TEMPORARY_OTHER);
    }
    public static function permanentRetail(): self
    {
        return new self(self::LOCATION_TYPE_PERMANENT_RETAIL);
    }
    public static function permanentFoodService(): self
    {
        return new self(self::LOCATION_TYPE_PERMANENT_FOOD_SERVICE);
    }
    public static function permanentCraft(): self
    {
        return new self(self::LOCATION_TYPE_PERMANENT_CRAFT);
    }
    public static function permanentWorkplace(): self
    {
        return new self(self::LOCATION_TYPE_PERMANENT_WORKPLACE);
    }
    public static function permanentEducationalInstitution(): self
    {
        return new self(self::LOCATION_TYPE_PERMANENT_EDUCATIONAL_INSTITUTION);
    }
    public static function permanentPublicBuilding(): self
    {
        return new self(self::LOCATION_TYPE_PERMANENT_PUBLIC_BUILDING);
    }
    public static function temporaryCulturalEvent(): self
    {
        return new self(self::LOCATION_TYPE_TEMPORARY_CULTURAL_EVENT);
    }
    public static function temporaryClubActivity(): self
    {
        return new self(self::LOCATION_TYPE_TEMPORARY_CLUB_ACTIVITY);
    }
    public static function temporaryPrivateEvent(): self
    {
        return new self(self::LOCATION_TYPE_TEMPORARY_PRIVATE_EVENT);
    }
    public static function temporaryWorkshipService(): self
    {
        return new self(self::LOCATION_TYPE_TEMPORARY_WORSHIP_SERVICE);
    }
}
