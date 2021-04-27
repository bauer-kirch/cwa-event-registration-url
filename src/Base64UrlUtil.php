<?php
declare(strict_types=1);

namespace BauerKirch\CoronaWarnAppEventRegistration;

class Base64UrlUtil
{
    public static function encode(string $input): string
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($input));
    }

    public static function decode(string $input): string
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $input));
    }
}
