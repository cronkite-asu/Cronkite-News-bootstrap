# How to contribute

## Development

This repository works with [GitHub Flow](https://docs.github.com/en/get-started/quickstart/github-flow) strategy.

- The `master` branch is always production-ready.
- To work on anything, create a descriptively named branch.
- Commit changes locally and push to your branch to Github.
- Open a [pull request](https://help.github.com/articles/about-pull-requests/) to merge when ready.
- After review, merge changes into `master`.
- After changes are applied to master immediately deploy to live server.

### Downloading the source code

```
git clone https://github.com/cronkite-asu/Cronkite-News-bootstrap.git
```

## Working With Pre-Commit

This project provides a [pre-commit](https://pre-commit.com) setup to ensure code is formatted to standards.

The `.pre-commit-config.yml` file is configured to run hooks from:

- [github.com/pre-commit/pre-commit-hooks](https://github.com/pre-commit/pre-commit-hooksd)
- [github.com/digitalpulp/pre-commit-php](https://github.com/digitalpulp/pre-commit-php)
- [github.com/pre-commit/mirrors-prettier](https://github.com/pre-commit/mirrors-prettier)

### Setup dependencies

#### macOS systems

Dependencies may be installed using the [Homebrew package manager](https://brew.sh/).

```
brew install php php-cs-fixer pre-commit
```

### Pre-Commit configuration

Install `pre-commit` hooks in your distro

```
cd Cronkite-News-bootstrap      # wherever you did your "git clone"
pre-commit install
```

### Run php-cs-fixer

[php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) runs on php files being committed. To manually run against all files in repository:

```
cd Cronkite-News-bootstrap         # wherever you did your "git clone"
php-cs-fixer check --rules=@PSR2 . # Check for issues without making changes
php-cs-fixer fix --rules=@PSR2 .   # Check and fix php file formatting
```

## Project's Standards

- [PSR-1: Basic Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md)
- [PSR-2: Coding Style Guide](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
