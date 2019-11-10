# Castor

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/pryley/castor/blob/master/LICENSE)[![GitHub version](https://badge.fury.io/gh/pryley%2Fcastor.svg)](https://badge.fury.io/gh/pryley%2Fcastor)[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pryley/castor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pryley/castor/?branch=master)[![Build Status](https://scrutinizer-ci.com/g/pryley/castor/badges/build.png?b=master)](https://scrutinizer-ci.com/g/pryley/castor/build-status/master)

Castor is a WordPress boilerplate parent theme built for [Dioscuri](https://github.com/pryley/dioscuri).

Minimum theme requirements:

* PHP 7.1
* WordPress 5.2

## Installation

This theme is meant to be initialised by [Dioscuri](https://github.com/pryley/dioscuri).

However, Castor can also be initialised on its own by running the following commands (make sure you first have `composer` and `npm` installed, on macOS this can be done using [Homebrew](https://brew.sh/)):

```
git clone https://github.com/pryley/castor.git castor
rm -rf castor/.git
composer install -d castor
```

## Templating Structure

```
default                             /layouts/[layout]
├── head                            /global/head
│   ├── head-favicon                /global/head-favicon
│   └── head-seo                    /global/head-seo
├── header                          /global/header
│   ├── navigation                  /global/navigation
│   └── hero                        /partials/hero
├── [template]                      /[template]
├── sidebar                         /global/sidebar
└── footer                          /global/footer
```
```
404|front-page|page                 /[template]
└── page                            /partials/page
    ├── page-header                 /partials/page-header
    ├── page-content                /partials/page-content
    └── page-footer                 /partials/page-footer
```
```
index|search                        /[template]
├── page-header                     /partials/page-header
├── entry                           /partials/entry
│   ├── entry-featured              /partials/entry-featured
│   ├── entry-header                /partials/entry-header
│   ├── entry-content               /partials/entry-content
│   └── entry-footer                /partials/entry-footer
└── pagination                      /partials/pagination
```
```
single                              /[template]
├── single                          /partials/single
│   ├── single-header               /partials/single-header
│   │   └── meta                    /partials/meta
│   │       ├── meta-author         /partials/meta-author
│   │       └── meta-published      /partials/meta-published
│   ├── single-content              /partials/single-content
│   └── single-footer               /partials/single-footer
├── prev-next                       /partials/prev-next
└── comments                        /partials/comments
```
