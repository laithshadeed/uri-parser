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
 * @link      https://github.com/laithshadeed/uri-parser
 * @license   MIT https://github.com/laithshadeed/LICENSE
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
 */

class Uri
{
    /**
     * The raw uri pass in the contructor
     *
     * @var string
     */
    protected string $uri = '';

    /**
     * The associated array of uri parts
     *
     * @var array<string, string>|null
     */
    protected Map<string, string> $parts;

    /**
     * The uri scheme
     *
     * @var string
     */
    protected string $scheme = '';

    /**
     * The uri host
     *
     * @var string
     */
    protected string $host = '';

    /**
     * The uri port
     *
     * @var string
     */
    protected string $port = '';

    /**
     * The uri user
     *
     * @var string
     */
    protected string $user = '';

    /**
     * The uri pass
     *
     * @var string
     */
    protected string $pass = '';

    /**
     * The uri path
     *
     * @var string
     */
    protected string $path = '';

    /**
     * The uri query
     *
     * @var string
     */
    protected string $query = '';

    /**
     * The uri fragement
     *
     * @var string
     */
    protected string $fragment = '';

    /**
     * Construct ParseUriException.
     *
     * @param string $uri String uri to be parsed.
     *
     * @throws Exception\ParseUriException if parse_uri failed to parse
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
        $parts     = parse_url($uri);

        if ($parts === false) {
            throw new Exception\ParseUriException();
        }

        $this->parts = $parts;
    }//end __construct()


    /**
     * Accessor for all uri parts, namely:
     * scheme, host, port, user, pass, path, query, fragment
     *
     * @param string $name The name of uri part
     *
     * @return string|null The value of uri part
     */
    public function __get(string $name) : mixed
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
    public function __set(string $name, string $value) : void
    {
        throw new Exception\InvalidOperationException();

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
