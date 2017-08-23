# Use Octicons with Zend\View

[![Build Status](https://travis-ci.org/161io/zf-octicons-view-helper.svg?branch=master)](https://travis-ci.org/161io/zf-octicons-view-helper)
[![Latest Version](https://img.shields.io/packagist/v/161/zf-octicons-view-helper.svg)](https://packagist.org/packages/161/zf-octicons-view-helper)
[![License](https://img.shields.io/packagist/l/161/zf-octicons-view-helper.svg)](https://packagist.org/packages/161/zf-octicons-view-helper)



## Usage

```html
<!-- view/application/your-page.phtml -->
<button class="btn btn-primary"><?= $this->octicon('mark-github') ?> GitHub's icons</button>
```

```css
/* octicons.css */
.octicon {
  display: inline-block;
  vertical-align: text-top;
  fill: currentColor;
}
```

## FAQ

### Options

```php
$this->octicon('mark-github', 1); // icon size: 100%
$this->octicon('mark-github', 2); // icon size: 200%
$this->octicon('mark-github', [
    'ratio' => 1, // icon size: 100% 
    'class' => 'octicon', // Attribute class=""
]);
```


### Installation

```bash
$ composer require 161/zf-octicons-view-helper
```

* Add module `Io161\Octicons` in your `config/module.config.php`
* Add style `octicons.css`



### Update Octicons

```bash
$ composer octicons-update
```

*Yarn is required or replace Yarn by NPM in composer.json file.*


### Running Unit Tests

```bash
$ composer test
```
