<?php

/*
 * This File is part of the Thapp\Propreader package
 *
 * (c) iwyg <mail@thomas-appel.com>
 *
 * For full copyright and license information, please refer to the LICENSE file
 * that was distributed with this package.
 */

namespace Thapp\Propreader\Tests;

use Thapp\Propreader\PropReader;
use Thapp\Propreader\Tests\Fixures\Foo;

class PropReaderTest extends \PHPUnit_Framework_TestCase
{
    private $foo = 'bar';
    private $bar = 'baz';

    /** @test */
    public function itShouldReadPrivateProperties()
    {
        $reader = new PropReader;
        $this->assertSame(
            ['foo' => 'foo', 'bar' => 'bar', 'int' => 12, 'float' => 12.2],
            $reader->read(new Foo)
        );

        $this->assertSame(['bar' => 'bar', 'float' => 12.2], $reader->read(new Foo, 'bar', 'float'));
        $this->assertSame(['foo' => 'bar', 'bar' => 'baz'], $reader->read($this, 'foo', 'bar'));
    }
}
