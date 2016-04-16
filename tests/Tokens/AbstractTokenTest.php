<?php

namespace Kevintweber\HtmlTokenizer\Tests\Tokens;

use Kevintweber\HtmlTokenizer\Tokens\Token;

class AbstractTokenTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructorAndDefaults()
    {
        $abstractTokenMock = $this->getMockForAbstractClass(
            'Kevintweber\\HtmlTokenizer\\Tokens\\AbstractToken',
            array(Token::ELEMENT)
        );
        $this->assertNull($abstractTokenMock->getParent());
        $this->assertEquals(Token::ELEMENT, $abstractTokenMock->getType());
        $this->assertFalse($abstractTokenMock->isCDATA());
        $this->assertFalse($abstractTokenMock->isComment());
        $this->assertFalse($abstractTokenMock->isDocType());
        $this->assertTrue($abstractTokenMock->isElement());
        $this->assertFalse($abstractTokenMock->isText());
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
