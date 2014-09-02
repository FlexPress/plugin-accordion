<?php

namespace FlexPress\Plugins\Accordion\DependencyInjection;

use FlexPress\Plugins\Accordion\Accordion;
use FlexPress\Components\Shortcode\Helper as ShortcodeHelper;
use FlexPress\Components\ACF\Helper as ACFHelper;
use FlexPress\Plugins\Accordion\Shortcodes\Accordion as AccordionShortcode;
use FlexPress\Plugins\Accordion\FieldGroups\Accordion as AccordionFieldGroup;

class DependencyInjectionContainer extends \Pimple
{

    public function init()
    {

        $this['objectStorage'] = $this->factory(
            function () {
                return new \SplObjectStorage();
            }
        );

        $this['accordionFieldGroup'] = function () {
            return new AccordionFieldGroup();
        };

        $this['acfHelper'] = function ($c) {
            return new ACFHelper($c['objectStorage'], $c['objectStorage'], array(
                $c['accordionFieldGroup']
            ), array());
        };

        $this['shortcodeHelper'] = function ($c) {
            return new ShortcodeHelper($c['objectStorage'], array(
                $c['accordionShortcode']
            ));
        };

        $this['accordionPlugin'] = function ($c) {
            return new Accordion($c['shortcodeHelper'], $c['acfHelper']);
        };

        $this['accordionShortcode'] = function ($c) {
            return new AccordionShortcode($c);
        };

    }
}
