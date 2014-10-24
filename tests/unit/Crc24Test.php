<?php
namespace Bigwhoop\Crc24\Test;

use Bigwhoop\Crc24\Crc24;

class Crc24Test extends \Codeception\TestCase\Test
{
    public function testHashing()
    {
        // https://github.com/froydnj/ironclad/blob/master/testing/test-vectors/crc24.testvec
        $this->assertEquals('b704ce', dechex(Crc24::hash('')));
        $this->assertEquals('f25713', dechex(Crc24::hash('a')));
        $this->assertEquals('ba1c7b', dechex(Crc24::hash('abc')));
        $this->assertEquals('dbf0b6', dechex(Crc24::hash('message digest')));
        $this->assertEquals('ed3665', dechex(Crc24::hash('abcdefghijklmnopqrstuvwxyz')));
        $this->assertEquals('4662cd', dechex(Crc24::hash('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')));
        $this->assertEquals('8313bb', dechex(Crc24::hash('12345678901234567890123456789012345678901234567890123456789012345678901234567890')));
        
        // https://github.com/alexgorbatchev/node-crc/blob/master/test/crc24.spec.coffee
        $this->assertEquals('8c0072', dechex(Crc24::hash('1234567890')));
    }
}