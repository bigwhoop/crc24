<?php
declare(strict_types=1);

namespace Bigwhoop\Crc24\Tests;

use Bigwhoop\Crc24\Crc24;
use PHPUnit\Framework\TestCase;

class Crc24Test extends TestCase
{
    /** @test */
    public function i_generate_correct_hashes(): void
    {
        // https://github.com/froydnj/ironclad/blob/master/testing/test-vectors/crc24.testvec
        self::assertEquals('b704ce', dechex(Crc24::hash('')));
        self::assertEquals('f25713', dechex(Crc24::hash('a')));
        self::assertEquals('ba1c7b', dechex(Crc24::hash('abc')));
        self::assertEquals('dbf0b6', dechex(Crc24::hash('message digest')));
        self::assertEquals('ed3665', dechex(Crc24::hash('abcdefghijklmnopqrstuvwxyz')));
        self::assertEquals('4662cd', dechex(Crc24::hash('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')));
        self::assertEquals('8313bb', dechex(Crc24::hash('12345678901234567890123456789012345678901234567890123456789012345678901234567890')));

        // https://github.com/alexgorbatchev/node-crc/blob/master/test/crc24.spec.coffee
        self::assertEquals('8c0072', dechex(Crc24::hash('1234567890')));
    }
}