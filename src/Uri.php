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

class Uri
{
    protected $uri;
    protected $parts;

    public function __construct(string $uri)
    {
        $is_valid = filter_var($uri, FILTER_VALIDATE_URL);

        if ($is_valid === false) {
            throw new Exception\InvalidUriException;
        }

        $this->uri = $uri;
        $parts = parse_url($uri);

        if ($parts === false) {
            throw new Exception\ParseUriException;
        }

        $this->parts = $parts;

        return $this;
    }

    public function __get(string $name) : string
    {
        if (array_key_exists($name, $this->parts)) {
            return $this->parts[$name];
        }
    }

    public function __set(string $name, string $value) : string
    {
        throw new Exception\InvalidOperationException;
    }

    public function __toString(): string
    {
        return $this->uri;
    }
}
