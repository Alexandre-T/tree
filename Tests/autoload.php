<?php
/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Autoload
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace {
    if (!$loader = @include __DIR__.'/../vendor/autoload.php') {
        echo <<<'EOM'
You must set up the project dependencies by running the following commands:
curl -s http://getcomposer.org/installer | php
php composer.phar install
EOM;
        exit(1);
    }
}
