# Changelog

All Notable changes to `html-tokenizer` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## [0.3.1] 2017-03-12
### Changed
- Modified php requirement to better handle PHP version >= 7.0
- Modified travis configuration, so tests are also performed on PHP 7.1

## [0.3] 2016-05-17

### Added
- Tokens now contain the line and character position of the token within the origonal html.

### Fixed
- Better handling of closed-only elements.  ("img" element was being given children.)

## [0.2.4] 2016-05-14

### Fixed
- Fix bug in parsing element attribute with identical name and value.

## [0.2.3] 2016-05-10

### Fixed
- Empty quoted attributes parsed correctly.

## [0.2.2] 2016-05-08

### Added
- Contents of "iframe" element ignored.

### Fixed
- Collapse whitespace correctly.

## [0.2.1] - 2016-05-07

### Fixed
- Bad regex for PHP token.

## [0.2] - 2016-05-07

### Added
- Added PHP token.
- Contents of "style" and "script" elements parsed as TEXT.

### Changed
- Use mb_* string functions.  Polyfill added.

## [0.1] - 2016-04-17

### Added
- Initial release
