<?php

namespace FlexPress\Plugins\Accordion\Shortcodes;

use FlexPress\Components\Shortcode\AbstractShortcode;

class Accordion extends AbstractShortcode
{

    const ACF_FIELD_NAME_ACCORDION = 'fp_accordion';
    const SHORTCODE_NAME = 'accordion';

    protected $dic;

    public function __construct($dic)
    {
        $this->dic = $dic;
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

        if (!function_exists('get_field')) {
            return false;
        }

        if ($accordions = get_field(self::ACF_FIELD_NAME_ACCORDION)) {

            $markup = '<div class="accordion-block">';

            foreach ($accordions as $accordion) {

                $context = \Timber::get_context();
                $context["accordion"] = $accordion;

                $template = apply_filters(
                    'fpshortcode_timber_template',
                    $this->dic['accordionPlugin']->getPath() . "/views/accordion.twig"
                );

                $markup .= \Timber::compile($template, $context);

            }

            $markup .= '</div>';

            return $markup;

        }

        return false;

    }
}
