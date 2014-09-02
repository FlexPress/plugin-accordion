<?php

namespace FlexPress\Plugins\Accordian\FieldGroups;

use FlexPress\Components\ACF\AbstractFieldGroup;

class Accordion extends AbstractFieldGroup
{

    /**
     * Returns the config data array for the field group
     *
     * @return array
     * @author Tim Perry
     */
    public function getConfig()
    {
        $config = array(
            'id' => 'acf_repeater',
            'title' => 'Accordion',
            'fields' =>
                array(
                    array(
                        'key' => 'field_53aad49dd9bcb',
                        'label' => 'Accordion',
                        'name' => \FlexPress\Plugins\Accordian\Shortcodes\Accordion::ACF_FIELD_NAME_ACCORDION,
                        'type' => 'repeater',
                        'order_no' => 0,
                        'instructions' => 'To display your accordion content on the page add the following shortcode to the main editor where you would like the accordion to display: [' . \FlexPress\Plugins\Accordian\Shortcodes\Accordion::ACF_FIELD_NAME_ACCORDIONSHORTCODE_NAME . ']',
                        'required' => 0,
                        'conditional_logic' =>
                            array(
                                'status' => 0,
                                'rules' =>
                                    array(
                                        0 =>
                                            array(
                                                'field' => 'null',
                                                'operator' => '==',
                                                'value' => '',
                                            ),
                                    ),
                                'allorany' => 'all',
                            ),
                        'sub_fields' =>
                            array(
                                'field_53aad4b8d9bcc' =>
                                    array(
                                        'label' => 'Title',
                                        'name' => 'fp_title',
                                        'type' => 'text',
                                        'instructions' => 'The title for the accordion',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'formatting' => 'none',
                                        'order_no' => 0,
                                        'key' => 'field_53aad4b8d9bcc',
                                    ),
                                'field_53aad4c1d9bcd' =>
                                    array(
                                        'label' => 'Content',
                                        'name' => 'fp_content',
                                        'type' => 'wysiwyg',
                                        'instructions' => 'The content for the accordion',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'toolbar' => 'basic',
                                        'media_upload' => 'yes',
                                        'the_content' => 'yes',
                                        'order_no' => 1,
                                        'key' => 'field_53aad4c1d9bcd',
                                    ),
                            ),
                        'row_min' => 0,
                        'row_limit' => '',
                        'layout' => 'row',
                        'button_label' => 'Add Accordion',
                    ),
                ),
            'location' =>
                array(
                    'allorany' => 'any',
                ),
            'options' =>
                array(
                    'position' => 'normal',
                    'layout' => 'standard',
                    'hide_on_screen' =>
                        array(),
                ),
            'menu_order' => 1,
        );

        $config['location']['rules'] = array();

        if ($postTypes = get_option(\FlexPress\Plugins\Accordian\Accordion::OPTION_NAME_SHOW_ON)) {

            foreach ($postTypes as $postType) {

                $acf_accordion['location']['rules'][] = array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => $postType,
                    'order_no' => '0',
                );

            }

        }

        return $config;

    }
}
