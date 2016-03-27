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

namespace Http;

/**
 * The main class for parsing uris
 *
 * Example:
 * <code>
 * $uri = new URI('http://www.my-domain/contact?me=1');
 * echo $uri->host;
 * echo $uri->scheme;
 * echo $uri->path;
 * echo $uri->query;
 * </code>
 *
 * @category  URI
 * @package   UriParser
 * @author    Laith Shadeed <laith.shadeed@gmail.com>
 * @copyright 2016 Laith Shadeed
 * @license   https://github.com/laithshadeed/LICENSE MIT
 * @link      https://github.com/laithshadeed/uri-parser
 *
 * @property-read string $scheme
 * @property-read string $host
 * @property-read string $port
 * @property-read string $user
 * @property-read string $pass
 * @property-read string $path
 * @property-read string $query
 * @property-read string $fragment
 */

class Uri
{
    /**
     * The raw uri pass in the contructor
     *
     * @var string|null
     */
    protected $uri = null;

    /**
     * The associated array of uri parts
     *
     * @var array<string, string>|null
     */
    protected $parts;


    /**
     * Construct ParseUriException.
     *
     * @param string $uri String uri to be parsed.
     *
     * @throws Exception\ParseUriException if parse_uri failed to parse
     * @todo   support lower version of PHP
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
        $parts     = parse_url($uri);

        if ($parts === false) {
            throw new Exception\ParseUriException;
        }

        $this->parts = $parts;

        return $this;

    }//end __construct()


    /**
     * Accessor for all uri parts, namely:
     * scheme, host, port, user, pass, path, query, fragment
     *
     * @param string $name The name of uri part
     *
     * @return string|null The value of uri part
     */
    public function __get(string $name) : string
    {
        if (array_key_exists($name, $this->parts) === true) {
            return $this->parts[$name];
        }

    }//end __get()


    /**
     * Setter is not allowed. As we assume the parsed part to be immutable
     *
     * @param string $name  The uri part name to be set
     * @param string $value The uri part value to be set
     *
     * @throws Exception\InvalidOperationException if called
     * @return void
     */
    public function __set(string $name, string $value)
    {
        throw new Exception\InvalidOperationException;

    }//end __set()


    /**
     * Convert object to string when printed or casted to string
     *
     * @return string The value of $uri property
     */
    public function __toString() : string
    {
        return $this->uri;

    }//end __toString()


}//end class
