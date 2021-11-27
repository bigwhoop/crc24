<?php
declare(strict_types=1);

namespace Bigwhoop\Crc24;

final class Crc24
{
    private const CRC24_INIT = 0xb704ce;
    private const CRC24_POLY = 0x1864cfb;
    private const CRC24_OUTMASK = 0xffffff;

    /**
     * @see https://pretty-rfc.herokuapp.com/RFC2440#an-implementation-of-the-crc-24-in-c
     */
    public static function hash(string $input): int
    {       
        $crc = self::CRC24_INIT;
        $len = strlen($input);
        for ($i = 0; $i < $len; $i++) {
            $crc ^= (ord($input[$i]) & 255) << 16;
            for ($j = 0; $j < 8; $j++) {
                $crc <<= 1;
                if ($crc & 0x1000000) {
                    $crc ^= self::CRC24_POLY;
                }
            }
        }
        
        return $crc & self::CRC24_OUTMASK;
    }
}
