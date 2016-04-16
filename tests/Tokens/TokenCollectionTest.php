<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Comment;
use Kevintweber\HtmlTokenizer\Tokens\TokenCollection;

class TokenCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructorAndDefaults()
    {
        $collection = new TokenCollection();
        $this->assertEquals(array(), $collection->toArray());
        $this->assertEquals(0, $collection->count());
        $this->assertTrue($collection->isEmpty());
        $this->assertFalse(isset($collection[0]));
    }

    public function testRemove()
    {
        $collection = new TokenCollection();
        $token = new Comment();
        $collection[0] = $token;
        $this->assertEquals(1, $collection->count());
        $this->assertTrue($collection->remove($token));
        $this->assertEquals(0, $collection->count());
        $this->assertFalse($collection->remove($token));
    }

    public function testArrayAccess()
    {
        $collection = new TokenCollection();
        $this->assertEquals(0, $collection->count());
        $this->assertFalse(isset($collection[0]));
        $token = new Comment();
        $collection[0] = $token;
        $this->assertEquals(1, $collection->count());
        $this->assertFalse($collection->isEmpty());
        $this->assertTrue(isset($collection[0]));
        $newToken = $collection[0];
        $this->assertEquals($token, $newToken);
        $this->assertEquals(1, $collection->count());
        unset($collection[0]);
        $this->assertEquals(0, $collection->count());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionInOffsetSet()
    {
        $collection = new TokenCollection();
        $collection[0] = 5;
    }
}
