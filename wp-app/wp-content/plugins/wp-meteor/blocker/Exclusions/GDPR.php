<?php

/**
 * WP_Meteor
 *
 * @package   WP_Meteor
 * @author    Aleksandr Guidrevitch <alex@excitingstartup.com>
 * @copyright 2023 wp-meteor.com
 * @license   GPL 2.0+
 * @link      https://wp-meteor.com
 */

namespace WP_Meteor\Blocker\Exclusions;

/**
 * Provide Import and Export of the settings of the plugin
 */
class GDPR extends \WP_Meteor\Blocker\Base
{
    public $adminPriority = -2;
    public $priority = 99;
    public $tab = 'exclusions';
    public $title = 'Exclude GDPR/Cookie popups ';
    public $description = "Most of the time, you want your GDPR/Cookie to be displayed instantly, keep it enabled if that's the case.<br>Please let me know if it doesn't work for your GDPR banner";
    public $defaultEnabled = true;

    public function __construct()
    {
        parent::__construct();

        $settings = wpmeteor_get_settings();
        $regexp = null;
        if (
            isset($settings[$this->id])
            && @$settings[$this->id]['enabled']
        ) {
            $value = [
                "https://ap\.legalblink\.it/api/scripts/lb_cs\.js",
            ];

            // https://wordpress.org/support/topic/newest-version-3-2-3-causes-a-fatal-error/#post-16861528
            if (!\function_exists('is_plugin_active') || \is_plugin_active('complianz-gdpr-premium/complianz-gpdr-premium.php') || is_plugin_active('complianz-gdpr/complianz-gpdr.php')) {
                $value = array_merge($value, [
                    "var complianz\s*",
                    "/cookiebanner/js/complianz(?:\.min)?\.js",
                ]);
            }
            if (!\function_exists('is_plugin_active') || \is_plugin_active('cookie-notice/cookie-notice.php')) {
                $value = array_merge($value, [
                    "var cnArgs",
                    "/cookie-notice/js/front(?:\.min)?\.js",
                ]);
            }
            if (!\function_exists('is_plugin_active') || \is_plugin_active('gdpr-cookie-compliance/moove-gdpr.php')) {
                $value = array_merge($value, [
                    "/jquery(?:\.min)?.js",
                    "var moove_frontend_gdpr_scripts",
                    "var gdpr_consent__strict",
                    "/gdpr-cookie-compliance/dist/scripts/main\.js",
                ]);
            }
            if (!\function_exists('is_plugin_active') || \is_plugin_active('cookie-law-info/cookie-law-info.php')) {
                $value = array_merge($value, [
                    "var _ckyConfig",
                    "/cookie-law-info/lite/frontend/js/script(?:\.min)?.js",
                ]);
            }
            if (!\function_exists('is_plugin_active') || \is_plugin_active('eu-cookie-law-compliance/tplis-cookies.php')) {
                $value = array_merge($value, [
                    "/jquery(?:\.min)?.js",
                    "window\.hasPolisClConsent",
                ]);
            }
            if (!\function_exists('is_plugin_active') || \is_plugin_active('iubenda-cookie-law-solution/iubenda_cookie_solution.php')) {
                $value = array_merge($value, [
                    "var _iub",
                    "//cdn\.iubenda\.com/",
                ]);
            }
            if (!\function_exists('is_plugin_active') || \is_plugin_active('cookiebot/cookiebot.php')) {
                $value = array_merge($value, [
                    "//consent\.cookiebot\.com/uc\.js",
                ]);
            }
            if (!\function_exists('is_plugin_active') || \is_plugin_active('cookie-script-com/cookie-script.php')) {
                $value = array_merge($value, [
                    "cookie-script.com/s/\w+\.js",
                ]);
            }

            if (!$value) {
                return;
            }

            $regexp = "#(" . join('|', array_filter($value, function ($value) {
                return $value && @preg_match("#{$value}#", "") !== false;
            })) . ")#";

            \add_filter('wpmeteor_exclude', function ($exclude, $content) use ($regexp) {
                if ($exclude) {
                    return $exclude;
                }
                if (preg_match($regexp, $content)) {
                    return true;
                }
                return $exclude;
            }, null, 2);

            $exclude_js_array = function ($excluded_js) use ($value) {
                // error_log('exclude_js_array');
                return array_merge((array) $excluded_js, $value);
            };

            $exclude_js_string = function ($excluded_js) use ($value, $exclude_js_array) {
                // error_log('exclude_js_string :' .$excluded_js . "," . join(',', $value) . ",");
                if (is_array($excluded_js)) {
                    return $exclude_js_array($excluded_js);
                }
                // strings !
                return $excluded_js . "," . join(',', $value) . ",";
            };

            // WP-Rocket compatibility
            \add_filter('rocket_excluded_inline_js_content', $exclude_js_array);
            // Autoptimize compatibility
            \add_filter('autoptimize_filter_js_exclude', $exclude_js_string); // does it expect regexps?
            // Swift Performance compatibility
            \add_filter('breeze_filter_js_exclude', $exclude_js_string);
            // SG compatibility
            \add_filter('sgo_javascript_combine_excluded_inline_content', $exclude_js_array);

            // Hummingbird plugin
            \add_filter('wphb_minify_resource', function ($block, $handle, $type, $src) use ($regexp) {
                if ($type === "scripts") {
                    return true;
                }
            }, 10, 4);
        }
    }

    public function backend_display_settings()
    {
        echo '<div id="' . $this->id . '" class="simple"
                    data-prefix="' . $this->id . '" 
                    data-title="' . $this->title . '"></div>';
    }

    public function backend_adjust_wpmeteor($wpmeteor, $settings)
    {
        $wpmeteor['blockers'] = @$wpmeteor['blockers'] ?: [];
        $wpmeteor['blockers'][$this->id] = $settings[$this->id];
        return $wpmeteor;
    }

    public function backend_save_settings($sanitized, $settings)
    {
        $exists = isset($sanitized[$this->id]['enabled']);
        $sanitized[$this->id] = array_merge($settings[$this->id], $sanitized[$this->id] ?: []);
        $sanitized[$this->id]['enabled'] = $exists;

        return $sanitized;
    }

    /* triggered from wpmeteor_load_settings */
    public function load_settings($settings)
    {
        $settings[$this->id] = isset($settings[$this->id])
            ? $settings[$this->id]
            : ['enabled' => $this->defaultEnabled];

        $settings[$this->id]['id'] = $this->id;
        $settings[$this->id]['description'] = $this->description;
        return $settings;
    }

    public function frontend_adjust_wpmeteor($wpmeteor, $settings)
    {
        if ($settings[$this->id]['enabled']) {
            $wpmeteor[$this->id] = true;
        }
        return $wpmeteor;
    }
}
