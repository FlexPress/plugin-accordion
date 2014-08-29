<?php

namespace FlexPress\Plugins\Accordian\DependencyInjection;

use FlexPress\Plugins\Accordian\Accordian;
use FlexPress\Components\Shortcode\Helper as ShortcodeHelper;
use FlexPress\Components\ACF\Helper as ACFHelper;

class DependencyInjectionContainer extends \Pimple
{

    public function init()
    {

        $this['objectStorage'] = function() {
            return new \SplObjectStorage();
        };

        $this['acfHelper'] = function ($c) {
            return new ACFHelper($c['objectStorage'], $c['objectStorage'], array(), array());
        };

        $this['Accordian'] = function () {
            return new Accordian();
        };

        $this['ccordianShortcode'] = function ($c) {
            return new \FlexPress\Plugins\Accordian\Shortcodes\Accordian($c['Accordian']);
        };

    }
}
