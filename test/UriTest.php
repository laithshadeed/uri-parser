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

namespace LSS;

use LSS\Uri;

class UriTest extends \PHPUnit_Framework_TestCase
{
    public function testScheme()
    {
        $uri = new Uri('http://www.google.com');
        $this->assertEquals($uri->scheme, 'http');
    }

    /**
     * It throws exception because scheme is immutable
     *
     * @return void
     * @expectedException LSS\Exception\InvalidOperationException
     */
    public function testModifyScheme()
    {
        $uri = new Uri('http://www.google.com');
        $uri->scheme = 'something';
    }

}

