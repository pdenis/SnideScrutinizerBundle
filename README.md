SnideScrutinizerBundle
======================

An quick overview of your repository (Symfony 2 Bundle)

[![Build Status](https://travis-ci.org/pdenis/SnideScrutinizerBundle.png?branch=master)](https://travis-ci.org/pdenis/SnideScrutinizerBundle)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/pdenis/SnideScrutinizerBundle/badges/quality-score.png?s=36b0c70f13ab1bf831afb0bee3a1dac9161dffc4)](https://scrutinizer-ci.com/g/pdenis/SnideScrutinizerBundle/)

# Setup
-----

## Installation by Composer

If you use composer, add SnideScrutinizerBundle bundle as a dependency to the composer.json of your application

```php
    "require": {
        ...
        "snide/scrutinizer-bundle": "dev-master"
        ...
    },

## Loading


Add the bundle to your app/AppKernel.php under the dev environment
```php
if (in_array($this->getEnvironment(), array('dev', 'test'))) {
    ...
    $bundles[] = new Snide\Bundle\ScrutinizerBundle\SnideScrutinizerBundle();
}
```

The bundle needs to copy the resources necessary to the web folder. You can use the command below:

```bash
    php app/console assets:install
```

## Configuration

Add the following to your `app/config/config_dev.yml` (you only want to use this in the dev environment)

```yml
snide_scrutinizer:
    repository:
            slug: pdenis/SnideTravinizerBundle # your repository slug
            type: github # github or bitbucket
    # Optional
    filesystem_cache_path: "%kernel.cache_dir%/scrutinizer"

```

## Overview

### General
<img src="https://raw.github.com/pdenis/SnideScrutinizerBundle/master/docs/screenshots/general.png" alt="Scrutinizer data">

### Metrics
<img src="https://raw.github.com/pdenis/SnideScrutinizerBundle/master/docs/screenshots/metrics.png" alt="Scrutinizer Metrics">
