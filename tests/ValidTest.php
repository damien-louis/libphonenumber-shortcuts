<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \PhoneNumberOneLine
 */
class ValidTest extends TestCase
{
    public static function testValidWithRegion(): void
    {
        $isValid = \PhoneNumberOneLine::isValid('06 07 08 09 10', 'FR');
        self::assertTrue($isValid);

        $isValid = \PhoneNumberOneLine::isValid('0607080910', 'FR');
        self::assertTrue($isValid);

        $isValid = \PhoneNumberOneLine::isValid('+33 607080910', 'FR');
        self::assertTrue($isValid);

        $isValid = \PhoneNumberOneLine::isValid('+1607080910', 'FR');
        self::assertFalse($isValid);

        $isValid = \PhoneNumberOneLine::isValid('+44123', 'FR');
        self::assertFalse($isValid);
    }

    public static function testValidWithoutRegion(): void
    {
        $isValid = \PhoneNumberOneLine::isValid('+33 607080910');
        self::assertTrue($isValid);

        $isValid = \PhoneNumberOneLine::isValid('notanumber');
        self::assertFalse($isValid);
    }
}
