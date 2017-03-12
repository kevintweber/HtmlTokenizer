<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Token;
use PHPUnit\Framework\TestCase;

class AbstractTokenTest extends TestCase
{
    public function testConstructorAndDefaults()
    {
        $abstractTokenMock = $this->getMockForAbstractClass(
            'Kevintweber\\HtmlTokenizer\\Tokens\\AbstractToken',
            array(Token::ELEMENT)
        );
        $this->assertEquals(0, $abstractTokenMock->getDepth());
        $this->assertNull($abstractTokenMock->getParent());
        $this->assertEquals(Token::ELEMENT, $abstractTokenMock->getType());
        $this->assertFalse($abstractTokenMock->isCDATA());
        $this->assertFalse($abstractTokenMock->isComment());
        $this->assertFalse($abstractTokenMock->isDocType());
        $this->assertTrue($abstractTokenMock->isElement());
        $this->assertFalse($abstractTokenMock->isPhp());
        $this->assertFalse($abstractTokenMock->isText());

        $newAbstractTokenMock = $this->getMockForAbstractClass(
            'Kevintweber\\HtmlTokenizer\\Tokens\\AbstractToken',
            array(Token::ELEMENT, $abstractTokenMock)
         );
        $this->assertEquals(1, $newAbstractTokenMock->getDepth());
        $this->assertEquals($abstractTokenMock, $newAbstractTokenMock->getParent());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionInConstructor()
    {
        $abstractTokenMock = $this->getMockForAbstractClass(
            'Kevintweber\\HtmlTokenizer\\Tokens\\AbstractToken',
            array('asdf')
        );
    }
}
