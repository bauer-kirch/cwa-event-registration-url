<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/internal/pt/trace_location.proto

namespace BauerKirch\CoronaWarnAppEventRegistration\Internal\Pt;

use UnexpectedValueException;

/**
 * Protobuf type <code>internal.pt.TraceLocationType</code>
 */
class TraceLocationType
{
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_UNSPECIFIED = 0;</code>
     */
    const LOCATION_TYPE_UNSPECIFIED = 0;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_PERMANENT_OTHER = 1;</code>
     */
    const LOCATION_TYPE_PERMANENT_OTHER = 1;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_TEMPORARY_OTHER = 2;</code>
     */
    const LOCATION_TYPE_TEMPORARY_OTHER = 2;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_PERMANENT_RETAIL = 3;</code>
     */
    const LOCATION_TYPE_PERMANENT_RETAIL = 3;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_PERMANENT_FOOD_SERVICE = 4;</code>
     */
    const LOCATION_TYPE_PERMANENT_FOOD_SERVICE = 4;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_PERMANENT_CRAFT = 5;</code>
     */
    const LOCATION_TYPE_PERMANENT_CRAFT = 5;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_PERMANENT_WORKPLACE = 6;</code>
     */
    const LOCATION_TYPE_PERMANENT_WORKPLACE = 6;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_PERMANENT_EDUCATIONAL_INSTITUTION = 7;</code>
     */
    const LOCATION_TYPE_PERMANENT_EDUCATIONAL_INSTITUTION = 7;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_PERMANENT_PUBLIC_BUILDING = 8;</code>
     */
    const LOCATION_TYPE_PERMANENT_PUBLIC_BUILDING = 8;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_TEMPORARY_CULTURAL_EVENT = 9;</code>
     */
    const LOCATION_TYPE_TEMPORARY_CULTURAL_EVENT = 9;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_TEMPORARY_CLUB_ACTIVITY = 10;</code>
     */
    const LOCATION_TYPE_TEMPORARY_CLUB_ACTIVITY = 10;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_TEMPORARY_PRIVATE_EVENT = 11;</code>
     */
    const LOCATION_TYPE_TEMPORARY_PRIVATE_EVENT = 11;
    /**
     * Generated from protobuf enum <code>LOCATION_TYPE_TEMPORARY_WORSHIP_SERVICE = 12;</code>
     */
    const LOCATION_TYPE_TEMPORARY_WORSHIP_SERVICE = 12;

    private static $valueToName = [
        self::LOCATION_TYPE_UNSPECIFIED => 'LOCATION_TYPE_UNSPECIFIED',
        self::LOCATION_TYPE_PERMANENT_OTHER => 'LOCATION_TYPE_PERMANENT_OTHER',
        self::LOCATION_TYPE_TEMPORARY_OTHER => 'LOCATION_TYPE_TEMPORARY_OTHER',
        self::LOCATION_TYPE_PERMANENT_RETAIL => 'LOCATION_TYPE_PERMANENT_RETAIL',
        self::LOCATION_TYPE_PERMANENT_FOOD_SERVICE => 'LOCATION_TYPE_PERMANENT_FOOD_SERVICE',
        self::LOCATION_TYPE_PERMANENT_CRAFT => 'LOCATION_TYPE_PERMANENT_CRAFT',
        self::LOCATION_TYPE_PERMANENT_WORKPLACE => 'LOCATION_TYPE_PERMANENT_WORKPLACE',
        self::LOCATION_TYPE_PERMANENT_EDUCATIONAL_INSTITUTION => 'LOCATION_TYPE_PERMANENT_EDUCATIONAL_INSTITUTION',
        self::LOCATION_TYPE_PERMANENT_PUBLIC_BUILDING => 'LOCATION_TYPE_PERMANENT_PUBLIC_BUILDING',
        self::LOCATION_TYPE_TEMPORARY_CULTURAL_EVENT => 'LOCATION_TYPE_TEMPORARY_CULTURAL_EVENT',
        self::LOCATION_TYPE_TEMPORARY_CLUB_ACTIVITY => 'LOCATION_TYPE_TEMPORARY_CLUB_ACTIVITY',
        self::LOCATION_TYPE_TEMPORARY_PRIVATE_EVENT => 'LOCATION_TYPE_TEMPORARY_PRIVATE_EVENT',
        self::LOCATION_TYPE_TEMPORARY_WORSHIP_SERVICE => 'LOCATION_TYPE_TEMPORARY_WORSHIP_SERVICE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

