<?php

namespace FlexPress\Plugins\Accordian\DependencyInjection;

use FlexPress\Plugins\Accordian\Accordian;

class DependencyInjectionContainer extends \Pimple
{

    public function init()
    {
        $this['Accordian'] = function () {
            return new Accordian();
        };
    }
}
