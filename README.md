# php-cs-fixer-config

My PHP CS Fixer config

It's based on the ideas of [`prooph/php-cs-fixer-config`](https://github.com/prooph/php-cs-fixer-config/).

## Installation

Run

```
$ composer require --dev phootwork/php-cs-fixer-config
```

Add to composer.json;

```json
"scripts": {
  "check": [
    "@cs",
  ],
  "cs": "php-cs-fixer fix -v --diff --dry-run",
  "cs-fix": "php-cs-fixer fix -v --diff",
}
```
  
## Usage

### Configuration

Create a configuration file `.php_cs` in the root of your project:

```php
<?php

$config = new phootwork\fixer\Config();
$config->getFinder()
    ->exclude(['fixture'])
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
```

### Git

Add `.php_cs.cache` (this is the cache file created by `php-cs-fixer`) to `.gitignore`:

```
vendor/
.php_cs.cache
```

### Travis

Update your `.travis.yml` to cache the `php_cs.cache` file:

```yml
cache:
  directories:
    - $HOME/.php-cs-fixer
```

Then run `php-cs-fixer` in the `script` section:

```yml
script:
  - vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --diff --dry-run
```

## Fixing issues

### Manually

If you need to fix issues locally, just run

```
$ composer cs-fix
```

### Pre-commit hook

You can add a `pre-commit` hook

```
$ touch .git/pre-commit && chmod +x .git/pre-commit
```
 
Paste this into `.git/pre-commit`:

```bash
#!/usr/bin/env bash

echo "pre commit hook start"

CURRENT_DIRECTORY=`pwd`
GIT_HOOKS_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

PROJECT_DIRECTORY="$GIT_HOOKS_DIR/../.."

cd $PROJECT_DIRECTORY;
PHP_CS_FIXER="vendor/bin/php-cs-fixer"

HAS_PHP_CS_FIXER=false

if [ -x "$PHP_CS_FIXER" ]; then
    HAS_PHP_CS_FIXER=true
fi

if $HAS_PHP_CS_FIXER; then
    git status --porcelain | grep -e '^[AM]\(.*\).php$' | cut -c 3- | while read line; do
        ${PHP_CS_FIXER} fix --config-file=.php_cs --verbose ${line};
        git add "$line";
    done
else
    echo ""
    echo "Please install php-cs-fixer, e.g.:"
    echo ""
    echo "  composer require friendsofphp/php-cs-fixer:2.0.0"
    echo ""
fi

cd $CURRENT_DIRECTORY;
echo "pre commit hook finish"
```
 
## License

This package is licensed using the MIT License.

## Editor/IDE Support

This repo contains a `editors/` folder, which has contains files to apply formatting based on these rules into your editor or IDE. You can have a look, if your editor/IDE is supported. A pull request to support yours is welcome
