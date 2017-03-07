# Castor

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/geminilabs/castor/blob/master/LICENSE)
[![GitHub version](https://badge.fury.io/gh/geminilabs%2Fcastor.svg)](https://badge.fury.io/gh/geminilabs%2Fcastor)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/geminilabs/castor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/geminilabs/castor/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/geminilabs/castor/badges/build.png?b=master)](https://scrutinizer-ci.com/g/geminilabs/castor/build-status/master)

Castor is a WordPress parent theme for [Dioscuri](https://github.com/geminilabs/dioscuri).

Minimum theme requirements:

* PHP 5.6
* WordPress 4.7.0

## Installation

This theme is meant to be initialised by [Dioscuri](https://github.com/geminilabs/dioscuri).

However, Castor can also be initialised on its own by running the following commands (make sure you first have `composer` and `yarn` installed, on macOS this can be done using [Homebrew](https://brew.sh/)):

```
git clone https://github.com/geminilabs/castor.git castor
rm -rf castor/.git
composer install -d castor
```
