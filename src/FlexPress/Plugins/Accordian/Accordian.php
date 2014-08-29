<?php

namespace FlexPress\Plugins\Accordian;

use FlexPress\Components\Shortcode\Helper as ShortcodeHelper;
use FlexPress\Components\ACF\Helper as ACFHelper;
use FlexPress\Plugins\AbstractPlugin;

class Accordian extends AbstractPlugin
{

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
                <p>FlexPress Shortcodes - acf is not installed, please install it to use the shortcodes plugin.</p>
            </div>
        <?php
        }
        if (!class_exists('Timber')) {
            ?>
            <div class="error">
                <p>FlexPress Shortcodes - Timber is not installed, please install it to use the shortcodes plugin.</p>
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
