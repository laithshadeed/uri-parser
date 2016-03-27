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

namespace Http\Exception;

/**
 * This exception will be thrown when parse_uri failed
 *
 * @category  URI
 * @package   UriParser
 * @author    Laith Shadeed <laith.shadeed@gmail.com>
 * @copyright 2016 Laith Shadeed
 * @license   https://github.com/laithshadeed/LICENSE MIT
 * @link      https://github.com/laithshadeed/uri-parser
 */
class ParseUriException extends \InvalidArgumentException
{


    /**
     * Construct ParseUriException.
     */
    public function __construct()
    {
        parent::__construct('This uri can not be parsed s per parse_uri');

    }//end __construct()


}//end class
