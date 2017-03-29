<?php
/**
 * This file is part of the Lex TreeBundle.
 *
 * PHP version 5.6
 *
 * (c) Alexandre Tranchant <alexandre.tranchant@gmail.com>
 *
 * @category  Bundle
 *
 * @author    Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @copyright 2017 Alexandre Tranchant
 * @license   MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */

namespace Lex\TreeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Lex Tree Bundle.
 * This bundle helps you to store recursive Category.
 * It is very useful to Optimize Breadcrumbs. The tree is limiting number of SQL queries.
 *
 * @category Entity
 *
 * @author   Alexandre Tranchant <alexandre.tranchant@gmail.com>
 * @license  MIT
 *
 * @see https://github.com/Alexandre-T/tree/blob/master/LICENSE
 */
class LexTreeBundle extends Bundle
{
}
