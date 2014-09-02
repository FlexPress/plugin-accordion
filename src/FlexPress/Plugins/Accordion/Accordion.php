<?php

namespace FlexPress\Plugins\Accordion;

use FlexPress\Components\Shortcode\Helper as ShortcodeHelper;
use FlexPress\Components\ACF\Helper as ACFHelper;
use FlexPress\Plugins\AbstractPlugin;

class Accordion extends AbstractPlugin
{

    const SETTINGS_GROUP_NAME = 'flexpress-accordion-settings-group';
    const OPTION_NAME_SHOW_ON = 'flexpress-accordion-show-on';

    /**
     * @var ShortcodeHelper
     */
    protected $shortcodeHelper;

    /**
     * @var ACFHelper
     */
    protected $acfHelper;

    public function __construct(ShortcodeHelper $shortcodeHelper, ACFHelper $acfHelper)
    {
        $this->shortcodeHelper = $shortcodeHelper;
        $this->acfHelper = $acfHelper;
    }

    /**
     *
     * Used to setup the plugin
     *
     * @param $file
     * @author Tim Perry
     *
     */
    public function init($file)
    {
        parent::init($file);

        $this->shortcodeHelper->registerShortcodes();
        $this->acfHelper->registerFieldGroups();

        add_action('admin_notices', array($this, "adminNotices"));

        add_options_page(
            'Accordion',
            'Accordion',
            'manage_options',
            'flexpress-accordion-options',
            array($this, 'menuPageCallback')
        );

    }

    /**
     *
     * Callback methods for the options page
     *
     * @author Tim Perry
     *
     */
    public function menuPageCallback()
    {

        $args = array(
            'public' => true,
            '_builtin' => false
        );

        $context = \Timber::getContext();
        $context['postTypes'] = get_post_types($args, 'names');
        $context['settingsGroupName'] = self::SETTINGS_GROUP_NAME;
        $context['fieldName'] = self::OPTION_NAME_SHOW_ON;
        $context['currentValue'] = get_option(self::OPTION_NAME_SHOW_ON);

        \Timber::render($this->getPath() . '/views/options-page.twig', $context);
    }

    /**
     *
     * Used to moan when acf and timber are not installed.
     *
     * @author Tim Perry
     *
     */
    public function adminNotices()
    {
        if (!function_exists('get_field')) {
            ?>
            <div class="error">
                <p>FlexPress Accordion - acf is not installed, please install it to use the shortcodes plugin.</p>
            </div>
        <?php
        }
        if (!class_exists('Timber')) {
            ?>
            <div class="error">
                <p>FlexPress Accordion - Timber is not installed, please install it to use the shortcodes plugin.</p>
            </div>
        <?php
        }

    }

    /**
     *
     * Returns the plugins directory
     *
     * @author Tim Perry
     *
     */
    public function getPath()
    {
        return $this->path;
    }

}
