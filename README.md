# Cronkite News bootstrap

Cronkite News theme using the Bootstrap framework.

## Description

This is the current theme for Cronkite News at Arizona State University.

## Installation

1. Clone this repository or upload a zip of the theme into your site’s themes directory.
1. Activate the new theme from within Appearance > Themes.
1. In "Settings -> Permalinks" click "Day and name" and save.
1. In "Settings -> Discussion" uncheck "Allow people to submit comments on new posts" and save.

## Contributing

You can use [pre-commit](https://pre-commit.com) to format code submitted to this repo.

The pre-commit-config.yml file is configured to run hooks from:

* [github.com/pre-commit/pre-commit-hooks](https://github.com/pre-commit/pre-commit-hooksd)
* [github.com/digitalpulp/pre-commit-php](https://github.com/digitalpulp/pre-commit-php)

### Downloading the source code

```
git clone https://github.com/cronkite-asu/Cronkite-News-bootstrap.git
```

### Setup dependencies

#### macOS systems

Dependencies may be installed using the [Homebrew package manager](https://brew.sh/).

```
brew install php php-cs-fixer pre-commit
```

### Pre-Commit coinfiguration

Install `pre-commit` hooks in your distro

```
cd Cronkite-News-bootstrap      # wherever you did your "git clone"
pre-commit install
```

## Changelog

### 3.0
* Update code to work with PHP 8.1.
* Format to PHP coding standard [PSR-2](https://www.php-fig.org/psr/psr-2/).
* Add README file.
