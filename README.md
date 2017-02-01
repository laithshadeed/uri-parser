[![Build Status](https://travis-ci.org/laithshadeed/uri-parser.svg?branch=master)](https://travis-ci.org/laithshadeed/uri-parser)

```
An attempt in 2016 to explore Hack lang and revisit PHP & its ecosystem after last time I used it in 2014.
```
## uri-parser
Sample URI Parser - Not meant to be used in production

## Install

```
composer require laithshadeed/uri-parser
```

## Usage

```
$uri = new Http\Uri('http://عربي.امارات/أسئلة-متكررة?مستحيل=نعم');
echo $uri->host;
```

## Hack & Travis

The code is written in Hack. I use h2tp to transpile it into plain PHP.
To make travis build successfully for non-hhvm versions, I added
./transpile file. It does the following:
 - transpile {src,test} -> php/{src,test}
 - Copy hhvm libs, vendor, phpunit configs -> ./php
