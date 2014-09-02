<?php

namespace FlexPress\Plugins\Accordian\DependencyInjection;

use FlexPress\Plugins\Accordian\Accordion;
use FlexPress\Components\Shortcode\Helper as ShortcodeHelper;
use FlexPress\Components\ACF\Helper as ACFHelper;

class DependencyInjectionContainer extends \Pimple
{

    public function init()
    {

        $this['objectStorage'] = function () {
            return new \SplObjectStorage();
        };

        $this['acfHelper'] = function ($c) {
            return new ACFHelper($c['objectStorage'], $c['objectStorage'], array(), array());
        };

        $this['shortcodeHelper'] = function ($c) {
            return new ShortcodeHelper($c['objectStorage'], array(
                $c['accordianShortcode']
            ));
        };

        $this['accordion'] = function ($c) {
            return new Accordion($c['shortcodeHelper'], $c['acfHelper']);
        };

        $this['accordionShortcode'] = function ($c) {
            return new \FlexPress\Plugins\Accordian\Shortcodes\Accordion($c['Accordian']);
        };

    }
}
