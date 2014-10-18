# CRC-24

[![Build Status](https://travis-ci.org/bigwhoop/crc24.svg?branch=master)](https://travis-ci.org/bigwhoop/crc24)
[![Code Coverage](https://scrutinizer-ci.com/g/bigwhoop/crc24/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/bigwhoop/crc24/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bigwhoop/crc24/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bigwhoop/crc24/?branch=master)

A CRC-24 implementation in PHP.

## Installation

    composer require "bigwhoop/crc24":"~1.0@stable"

## Usage

    <?php
    use Bigwhoop\Crc24\Crc24;
    
    $checksum = Crc24::hash('your message');

## Tests

    composer install --dev
    vendor/bin/codecept run
    