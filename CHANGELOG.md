# Changelog

All Notable changes to `html-tokenizer` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

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
