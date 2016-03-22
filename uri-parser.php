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

declare(strict_types=1);
error_reporting(E_ALL | E_STRICT);

class InstantiateClassException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('This class is not meant to be instantiated');
    }
}

class InvaliduriException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct('This string is invalid uri as per filter_var');
    }
}

class ParseuriException extends InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct('This uri can not be parsed s per parse_uri');
    }
}

class URI
{
    protected $uri;

    public function __construct($uri)
    {
        $is_valid = filter_var($uri, FILTER_VALIDATE_URL);

        if ($is_valid === false) {
            throw new InvaliduriException;
        }

        $this->uri = $uri;
        $parts = parse_url($uri);

        if ($parts === false) {
            throw new ParseuriException;
        }

        foreach ($parts as $k=>$v) {
            $this->{$k} = $v;
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->uri;
    }
}

class URI_Builder
{
    protected function __construct()
    {
        throw new InstantiateClassException;
    }

    public static function build(string $uri): uri
    {
        return new URI($uri);
    }
}

try {
      $uri = URI_Builder::build('http://www.google.com');
      echo $uri . "\n";
      echo $uri->scheme . "\n";
      echo $uri->host . "\n";
} catch (InvaliduriException $e) {
    echo $e->getMessage() . "\n";
}
