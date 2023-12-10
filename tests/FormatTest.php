<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \PhoneNumberShortcuts
 */
class FormatTest extends TestCase
{
    public static function testException(): void
    {
        $result = \PhoneNumberShortcuts::format('itsnotanumber', PhoneNumberShortcuts::E164, 'FR');
        self::assertNull($result);
    }

    public static function testFormatWithRegion(): void
    {
        $result = \PhoneNumberShortcuts::format('0605040302', PhoneNumberShortcuts::E164, 'FR');
        self::assertSame($result, '+33605040302');

        $result = \PhoneNumberShortcuts::format('0605040302', PhoneNumberShortcuts::NATIONAL, 'FR');
        self::assertSame($result, '06 05 04 03 02');

        $result = \PhoneNumberShortcuts::format('0605040302', PhoneNumberShortcuts::INTERNATIONAL, 'FR');
        self::assertSame($result, '+33 6 05 04 03 02');

        $result = \PhoneNumberShortcuts::format('0605040302', PhoneNumberShortcuts::RFC3966, 'FR');
        self::assertSame($result, 'tel:+33-6-05-04-03-02');
    }

    public static function testFormatWithoutRegion(): void
    {
        $result = \PhoneNumberShortcuts::format('+33605040302', PhoneNumberShortcuts::NATIONAL);
        self::assertSame($result, '06 05 04 03 02');
    }
}
