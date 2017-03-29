<?php
/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Exception
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace Lex\TreeBundle\Exception;

use Doctrine\ORM\EntityNotFoundException;

/**
 * Tree Exception
 *
 * @category Manager
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */
class TreeNotFoundException extends EntityNotFoundException
{

}