# CRC-24

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
    
## License

MIT