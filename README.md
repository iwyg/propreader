# private property reader

[![Author](http://img.shields.io/badge/author-iwyg-blue.svg?style=flat-square)](https://github.com/iwyg)
[![Source Code](http://img.shields.io/badge/source-lucid/signal-blue.svg?style=flat-square)](https://github.com/iwyg/propreader/master/)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/iwyg/propreader/blob//LICENSE.md)

[![Build Status](https://img.shields.io/travis/iwyg/propreader/master.svg?style=flat-square)](https://travis-ci.org/iwyg/propreader)
[![Code Coverage](https://img.shields.io/coveralls/iwyg/propreader/master.svg?style=flat-square)](https://coveralls.io/r/iwyg/propreader)
[![HHVM](https://img.shields.io/hhvm/thapp/propreader/dev-master.svg?style=flat-square)](http://hhvm.h4cc.de/package/thapp/propreader)

a quick (and dirty) implementation based on [@ocramius](https://github.com/Ocramius) blog post on
[fast object to array conversion](http://ocramius.github.io/blog/fast-php-object-to-array-conversion/).

## Installation

```bash
> composer require thapp/propreader
```

## Usage

```php
<?php

class Foo
{
    private $foo = 'bar';
    private $bar = 'baz';
    private $int = 0;
}

$reader = new \Thapp\PropReader\PropReader;
$props = $reader->read(new Foo, 'foo', 'bar'); // => ['foo' => 'bar', 'bar' => 'baz']
```
