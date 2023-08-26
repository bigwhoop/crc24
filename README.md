# CRC-24

[![CI](https://github.com/bigwhoop/crc24/actions/workflows/ci.yml/badge.svg)](https://github.com/bigwhoop/crc24/actions/workflows/ci.yml)

A CRC-24 implementation in PHP.

## Installation

    composer require bigwhoop/crc24

## Usage

    <?php
    use Bigwhoop\Crc24\Crc24;
    
    $checksum = Crc24::hash('your message');

## Tests

    composer install --dev
    vendor/bin/phpunit
    vendor/bin/phpstan
    
## License

MIT
