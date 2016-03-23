<?php
/**
 *  URI Parser as per RFC3986
 *
 *  PHP Version 7
 *
 * @category  URI
 * @package   UriParser
 * @author    Laith Shadeed <laith.shadeed@gmail.com>
 * @copyright 2016 Laith Shadeed
 * @license   MIT https://github.com/laithshadeed/LICENSE
 * @link      https://github.com/laithshadeed/uri-parser
 */

namespace LSS\Exception;

class InstantiateUriBuilderException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('This class is not meant to be instantiated');
    }
}


