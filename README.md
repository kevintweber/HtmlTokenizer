# html-tokenizer

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This package will tokenize any HTML5 input.

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
$tokens = $htmlTokenizer->parse($htmlDocument);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email kevintweber@gmail.com instead of using the issue tracker.

## Credits

- [Kevin Weber][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/kevintweber/html-tokenizer.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/kevintweber/html-tokenizer/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/kevintweber/html-tokenizer.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/kevintweber/html-tokenizer.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/kevintweber/html-tokenizer.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/kevintweber/html-tokenizer
[link-travis]: https://travis-ci.org/kevintweber/html-tokenizer
[link-scrutinizer]: https://scrutinizer-ci.com/g/kevintweber/html-tokenizer/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/kevintweber/html-tokenizer
[link-downloads]: https://packagist.org/packages/kevintweber/html-tokenizer
[link-author]: https://github.com/kevintweber
[link-contributors]: ../../contributors
