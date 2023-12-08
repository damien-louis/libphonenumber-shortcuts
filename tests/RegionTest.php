<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \PhoneNumberOneLine
 */
class RegionTest extends TestCase
{
    public static function testRegion(): void
    {
        $result = \PhoneNumberOneLine::getRegionCodeForNumber('+44 117 496 0123');
        self::assertSame($result, 'GB');

        $result = \PhoneNumberOneLine::getRegionCodeForNumber('+33 1 02 03 04 05');
        self::assertSame($result, 'FR');

        $result = \PhoneNumberOneLine::getRegionCodeForNumber('+12135096995');
        self::assertSame($result, 'US');

        $result = \PhoneNumberOneLine::getRegionCodeForNumber('notanumber');
        self::assertNull($result);
    }
}
