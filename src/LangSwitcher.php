<?php

namespace Bezbeli\WPML;

function LangSwitcher()
{
    if (function_exists('icl_get_languages')) {
        $languages = icl_get_languages('skip_missing=1');
        if (1 < count($languages)) {
            $ll_current = $languages[ICL_LANGUAGE_CODE]['native_name'];
            foreach ($languages as $l) {
                if (!$l['active']) {
                    $items = '<li class="menu-item custom-switcher"><a class="nav-link" href="'
                    . $l['url'] . '"><img src="'
                    . $l['country_flag_url']
                    . '" height="12" alt="'
                    . $l['language_code']
                    . '" width="18" /></a></li>';
                }
            }
        }
    }
    return $items;
}

// add_filter('wp_nav_menu_items', __NAMESPACE__ . '\\lang_dropdown', 10, 2);
