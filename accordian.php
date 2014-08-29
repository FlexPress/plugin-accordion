<?php

/**
 * Plugin Name: Accordian
 * Plugin URI: https://github.com/FlexPress/plugin-boilerplate
 * Description: FlexPress based plugin
 * Version: 1.0.0
 * Author: FlexPress
 * Author URI: https://github.com/FlexPress
 * License: MIT
 */

use FlexPress\Plugins\Accordian\DependencyInjection\DependencyInjectionContainer;

// Dependency Injection
$dic = new DependencyInjectionContainer();
$dic->init();

// Run app
$dic['Accordian']->init(__FILE__);
