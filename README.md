# Html Tokenizer

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package will tokenize HTML input.

Some uses of HTML tokens:
- Tidy/Minify HTML output
- Preprocess HTML
- Filter HTML
- Sanitize HTML

## Install

Via Composer

``` bash
$ composer require kevintweber/html-tokenizer
```

## Usage

``` php
<?php

namespace Kevintweber\HtmlTokenizer;

$htmlDocument = file_get_contents("path/to/html/document.html");

$htmlTokenizer = new HtmlTokenizer();
$tokens = $htmlTokenizer->parse($htmlDocument);  // That was easy ...

// Once you have tokens, you can manipulate them.
foreach ($tokens as $token) {
    if ($token->isElement()) {
        echo $token->getName() . "\n";
    }
}

// Or just output them to an array.
$tokenArray = $tokens->toArray();
```

The following simple HTML:
``` html
<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <!-- Start of content. -->
        <h1 id="big_title">Whoa!</h1>
        <div class="centered">It <em>parses</em>!</div>
    </body>
</html>
```

will produce the following array:
``` php
array(
    array(
        'type' => 'doctype',
        'value' => 'html'
    ),
    array(
        'type' => 'element',
        'name' => 'html',
        'children' => array(
            array(
                'type' => 'element',
                'name' => 'head',
                'children' => array(
                    array(
                        'type' => 'element',
                        'name' => 'title',
                        'children' => array(
                            array(
                                'type' => 'text',
                                'value' => 'Test'
                            )
                        )
                    )
                )
            ),
            array(
                'type' => 'element',
                'name' => 'body',
                'children' => array(
                    array(
                        'type' => 'comment',
                        'value' => 'Start of content.'
                    ),
                    array(
                        'type' => 'element',
                        'name' => 'h1',
                        'attributes' => array(
                            'id' => 'big_title'
                        ),
                        'children' => array(
                            array(
                                'type' => 'text',
                                'value' => 'Whoa!'
                            )
                        )
                    ),
                    array(
                        'type' => 'element',
                        'name' => 'div',
                        'attributes' => array(
                            'class' => 'centered'
                        ),
                        'children' => array(
                            array(
                                'type' => 'text',
                                'value' => 'It'
                            ),
                            array(
                                'type' => 'element',
                                'name' => 'em',
                                'children' => array(
                                    array(
                                        'type' => 'text',
                                        'value' => 'parses'
                                    )
                                )
                            ),
                            array(
                                'type' => 'text',
                                'value' => '!'
                            )
                        )
                    )
                )
            )
        )
    )
)
```

### Tokens

The tokens are of the following types:
| Name | Example |
| ------ | ------- |
| `cdata` | <![CDATA[ Character data goes in here. ]]> |
| `comment` | <!-- Comments go in here. --> |
| `doctype` | <!DOCTYPE html> |
| `element` | <div>Most of your markup will be elements.</div> |
| `php` | <?php echo "PHP code goes in here."; ?> |
| `text` | Most of your content will be text. |

### Special parsing situations
- Contents of an "iframe" element are not parsed.
- Contents of a "script" element are considered TEXT.
- Contents of a "style" element are considered TEXT.

### Limitations

Currently, this package will tokenize HTML5 and XHTML.

It tries to handle errors according to the standard.  The tokenizer can handle
some (but not all) malformed HTML.  You can set the tokenizer to fail silently
(default functionality) or throw an exception when it encounters an error.

If you come across valid HTML this package cannot parse, please submit an issue.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email kevintweber@gmail.com instead of using the issue tracker.

## Credits

- [Kevin Weber][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/kevintweber/html-tokenizer.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/kevintweber/HtmlTokenizer/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/kevintweber/HtmlTokenizer.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/kevintweber/HtmlTokenizer.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/kevintweber/html-tokenizer.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/kevintweber/html-tokenizer
[link-travis]: https://travis-ci.org/kevintweber/HtmlTokenizer
[link-scrutinizer]: https://scrutinizer-ci.com/g/kevintweber/HtmlTokenizer/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/kevintweber/HtmlTokenizer
[link-downloads]: https://packagist.org/packages/kevintweber/html-tokenizer
[link-author]: https://github.com/kevintweber
[link-contributors]: ../../contributors
