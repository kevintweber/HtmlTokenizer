# Changelog

All Notable changes to `html-tokenizer` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## 2016-XX-XX

### Added
- Contents of "iframe" element ignored.

### Todo
- Collapse whitespace around text correctly.

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
