<?php
/**
 * This file is part of Crc24
 *
 * (c) Philippe Gerber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Bigwhoop\Crc24;

class Crc24
{
    const CRC24_INIT = 0xb704ce;
    const CRC24_POLY = 0x1864cfb;
    const CRC24_OUTMASK = 0xffffff;

    /**
     * @param string $input
     * @return int
     * @see https://pretty-rfc.herokuapp.com/RFC2440#an-implementation-of-the-crc-24-in-c
     */
    public static function hash($input)
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
