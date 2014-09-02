<?php

/**
 * Plugin Name: Accordion
 * Plugin URI: https://github.com/FlexPress/plugin-accordion
 * Description: FlexPress based plugin
 * Version: 1.0.0
 * Author: FlexPress
 * Author URI: https://github.com/FlexPress
 * License: MIT
 */

use FlexPress\Plugins\Accordion\DependencyInjection\DependencyInjectionContainer;

// Dependency Injection
$dic = new DependencyInjectionContainer();
$dic->init();

// Run app
$dic['accordion']->init(__FILE__);
