<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \PhoneNumberOneLine
 */
class FormatTest extends TestCase
{
    public static function testException(): void
    {
        $result = \PhoneNumberOneLine::format('itsnotanumber', PhoneNumberOneLine::E164, 'FR');
        self::assertNull($result);
    }

    public static function testFormatWithRegion(): void
    {
        $result = \PhoneNumberOneLine::format('0605040302', PhoneNumberOneLine::E164, 'FR');
        self::assertSame($result, '+33605040302');

        $result = \PhoneNumberOneLine::format('0605040302', PhoneNumberOneLine::NATIONAL, 'FR');
        self::assertSame($result, '06 05 04 03 02');

        $result = \PhoneNumberOneLine::format('0605040302', PhoneNumberOneLine::INTERNATIONAL, 'FR');
        self::assertSame($result, '+33 6 05 04 03 02');

        $result = \PhoneNumberOneLine::format('0605040302', PhoneNumberOneLine::RFC3966, 'FR');
        self::assertSame($result, 'tel:+33-6-05-04-03-02');
    }

    public static function testFormatWithoutRegion(): void
    {
        $result = \PhoneNumberOneLine::format('+33605040302', PhoneNumberOneLine::NATIONAL);
        self::assertSame($result, '06 05 04 03 02');
    }
}
