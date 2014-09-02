# FlexPress accordion plugin

## Install
Install via composer

```
composer require flexpress/plugin-accordion 1.0.*
```

## Setup
- Install ACF repeater (http://www.advancedcustomfields.com/add-ons/repeater-field/)
- You then need to change what post types it should display on, what can be done by visiting {wp-admin-url}/options-general.php?page=flexpress-accordion-options or via settings > Accordion.

## Changing the output

The plugin will load a default view but you can change this by using the filter fpshortcode_timber_template, e.g.:

```
add_filter('fpshortcode_timber_template', function() {
    return 'my/relative/view/path';
});
```

As it's relative timber will look in the themes folder however you can pass it a absolute path as well, which is what the plugin does by default.