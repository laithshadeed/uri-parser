<?hh // strict
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

namespace Http;

use Http\Uri;

/**
 * The test class Uri
 *
 * @category  URI
 * @package   UriParser
 * @author    Laith Shadeed <laith.shadeed@gmail.com>
 * @copyright 2016 Laith Shadeed
 * @license   https://github.com/laithshadeed/LICENSE MIT
 * @link      https://github.com/laithshadeed/uri-parser
 */

/* HH_IGNORE_ERROR[2049] PHPUnit is not hackified */
/* HH_IGNORE_ERROR[4123] PHPUnit is not hackified */
class UriTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Test scheme parsed correctly
     *
     * @return void
     */
    public function testScheme() : void
    {
        $uri = new Uri('http://www.google.com');
        $this->assertEquals($uri->scheme, 'http');

    }//end testScheme()


    /**
     *  Test modifying immutable the scheme property
     *
     * @return void
     * @throws Exception\InvalidOperationException always
     *
     * @expectedException Http\Exception\InvalidOperationException
     */
    public function testModifyScheme() : void
    {
        $uri         = new Uri('http://www.google.com');
        $uri->scheme = 'something';

    }//end testModifyScheme()


    /**
     * Test parsing Arabic IDN
     *
     * @return void
     */
    public function testArabicUri() : void
    {
        $uri = new Uri('http://عربي.امارات/نحن?x=1');
        $this->assertEquals($uri->host, 'عربي.امارات');
        $this->assertEquals($uri->path, '/نحن');
        $this->assertEquals($uri->query, 'x=1');

    }//end testArabicUri()


    /**
     * Test parsing Arabic punnycode
     *
     * @return void
     */
    public function testArabicPunnycode() : void
    {
        $uri = new Uri('http://xn--ngbrx4e.xn--mgbaam7a8h/%D9%86%D8%AD%D9%86?%D9%85=%D9%84');
        $this->assertEquals($uri->host, 'xn--ngbrx4e.xn--mgbaam7a8h');
        $this->assertEquals($uri->path, '/%D9%86%D8%AD%D9%86');
        $this->assertEquals($uri->query, '%D9%85=%D9%84');

    }//end testArabicPunnycode()


}//end class
