<?php

declare(strict_types=1);

use libphonenumber\PhoneNumberUtil;

class PhoneNumberOneLine
{
    public const E164 = 0;
    public const INTERNATIONAL = 1;
    public const NATIONAL = 2;
    public const RFC3966 = 3;

    public static function format(string $number, int $format, ?string $region = null): ?string
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        try {
            $number = $phoneUtil->parse($number, $region);

            return $phoneUtil->format($number, $format);
        } catch (\Exception $e) {
            return null;
        }
    }

    public static function isValid(string $number, ?string $region = null): bool
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            return $phoneUtil->isValidNumber($phoneUtil->parse($number, $region));
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function getRegionCodeForNumber(string $number): ?string
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $phoneNumberObject = $phoneUtil->parse($number);

            return $phoneUtil->getRegionCodeForNumber($phoneNumberObject);
        } catch (\Exception $e) {
            return null;
        }
    }
}
