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
            $crc ^= self::getUnicodePointOrdinal($input, $i) << 16;
            for ($j = 0; $j < 8; $j++) {
                $crc <<= 1;
                if ($crc & 0x1000000) {
                    $crc ^= self::CRC24_POLY;
                }
            }
        }
        
        return sprintf('%x', $crc & self::CRC24_OUTMASK);
    }

    /**
     * @param string $string
     * @param int $index
     * @return int
     */
    private static function getUnicodePointOrdinal($string, $index)
    {
        $char = substr($string, $index, 1);
        $size = strlen($char);        
        $ordinal = ord($char[0]) & (0xFF >> $size);
        for ($i = 1; $i < $size; $i++){
            $ordinal = $ordinal << 6 | (ord($char[$i]) & 127);
        }
        return $ordinal;
    }
}
