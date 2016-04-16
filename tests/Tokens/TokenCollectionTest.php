<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Comment;
use Kevintweber\HtmlTokenizer\Tokens\Text;
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

    public function testIterator()
    {
        $collection = new TokenCollection();
        $this->assertTrue($collection->isEmpty());
        $token1 = new Comment();
        $token2 = new Text();
        $collection[] = $token1;
        $collection[] = $token2;
        $testArray = array();
        foreach ($collection as $token) {
            $testArray[] = $token;
        }

        $this->assertEquals(array($token1, $token2), $testArray);
    }
}
