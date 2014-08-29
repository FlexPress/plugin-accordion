<?php

namespace FlexPress\Plugins\Accordian\Shortcodes;

use FlexPress\Components\Shortcode\AbstractShortcode;

class Accordian extends AbstractShortcode
{

    const ACF_FIELD_NAME_ACCORDION = 'fp_accordion';
    const SHORTCODE_NAME = 'accordion';

    /**
     * @var \FlexPress\Plugins\Accordian\Accordian
     */
    protected $accordian;

    public function __construct($accordian)
    {
        $this->accordian = $accordian;
    }

    /**
     * Returns the name for the shortcode
     *
     * @return string
     */
    public function getName()
    {
        return self::SHORTCODE_NAME;
    }

    /**
     * Returns the callback for the shortcode
     *
     * @throws \RuntimeException
     * @return mixed
     */
    public function getCallback()
    {

        if (function_exists('get_field')) {
            return false;
        }

        if ($accordians = get_field(self::ACF_FIELD_NAME_ACCORDION)) {

            $markup = "<div class=\"accordion-block\">";

            foreach ($accordians as $accordian) {

                $context = \Timber::getContext();
                $context["accordian"] = $accordian;

                $markup .= \Timber::compile($this->accordian->getViewPath() . "/accordian.twig", $context);

            }

            $markup .= "</div>";

            return $markup;

        }

        return false;

    }
}
