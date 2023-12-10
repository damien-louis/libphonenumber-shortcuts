<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \PhoneNumberShortcuts
 */
class ValidTest extends TestCase
{
    public static function testValidWithRegion(): void
    {
        $isValid = \PhoneNumberShortcuts::isValid('06 07 08 09 10', 'FR');
        self::assertTrue($isValid);

        $isValid = \PhoneNumberShortcuts::isValid('0607080910', 'FR');
        self::assertTrue($isValid);

        $isValid = \PhoneNumberShortcuts::isValid('+33 607080910', 'FR');
        self::assertTrue($isValid);

        $isValid = \PhoneNumberShortcuts::isValid('+1607080910', 'FR');
        self::assertFalse($isValid);

        $isValid = \PhoneNumberShortcuts::isValid('+44123', 'FR');
        self::assertFalse($isValid);
    }

    public static function testValidWithoutRegion(): void
    {
        $isValid = \PhoneNumberShortcuts::isValid('+33 607080910');
        self::assertTrue($isValid);

        $isValid = \PhoneNumberShortcuts::isValid('notanumber');
        self::assertFalse($isValid);
    }
}
