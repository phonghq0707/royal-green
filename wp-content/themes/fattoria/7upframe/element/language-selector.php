<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(defined('ICL_LANGUAGE_CODE') || class_exists('Polylang') || defined('QTX_VERSION')){
    if(!function_exists('s7upf_vc_language_selector')){
        function s7upf_vc_language_selector($attr){
            $html = $lang_sub = $lang_active = '';
            extract(shortcode_atts(array(
                'style'             => 'default',
                'flag'              => 'yes',
            ),$attr));
            switch ($style) {
                case 'poly-style':
                    if(function_exists('pll_the_languages')){
                        ob_start();
                        $html .=    '<div class="polylang-selector">';
                        pll_the_languages(array('dropdown'=>1,'show_flags'=>1));
                        $html .=    ob_get_clean();
                        $html .=    '</div>';
                    }
                    break;

                case 'wpml-style':
                    ob_start();
                    do_action('wpml_add_language_selector');
                    $html .=    ob_get_clean();
                    break;
                
                default:
                    if(defined('ICL_SITEPRESS_VERSION')){
                        $wpml_lang = icl_get_languages('skip_missing=0&orderby=custom');            
                        foreach ($wpml_lang as $lang) {
                            $url = $lang['country_flag_url'];
                            $flag_url = $lang['country_flag_url'];
                            $name = $lang['native_name'];
                            if($lang['active']){
                                $l_class = 'active';
                                $lang_active .=     '<a class="dropdown-link text-uppercase" href="'.esc_url($url).'">';
                                if($flag == 'yes') $lang_active .=     '<img alt="'.esc_attr__("flag","fattoria").'" src="'.esc_url($flag_url).'">';
                                $lang_active .=         '<span class="silver">'.$name.'</span>';
                                $lang_active .=     '</a>';
                            }
                            else $l_class = '';
                            $lang_sub .=                '<li class="'.$l_class.'">
                                                            <a href="'.esc_url($url).'">';
                            if($flag == 'yes') $lang_sub .=     '<img alt="'.esc_attr__("flag","fattoria").'" src="'.esc_url($flag_url).'">';
                            $lang_sub .=                        $name;
                            $lang_sub .=                    '</a>
                                                        </li>';
                        }
                        $html .=    '<div class="dropdown-box language-box">';
                        $html .=        $lang_active;
                        $html .=        '<ul class="list-none dropdown-list">';
                        $html .=            $lang_sub;
                        $html .=        '</ul>';
                        $html .=    '</div>';
                    }
                    elseif(class_exists('Polylang')){
                            global $polylang;
                            $languages = $polylang->model->get_languages_list();
                            $current_lang = pll_current_language();
                            foreach ($languages as $lang) {
                                $url = PLL()->links->get_translation_url($lang);
                                $flag_url = $lang->flag_url;
                                $name = $lang->name;
                                if($lang->slug == $current_lang){
                                    $l_class = 'active';
                                    $lang_active .=     '<a class="dropdown-link text-uppercase" href="'.esc_url($url).'">';
                                    if($flag == 'yes') $lang_active .=     '<img alt="'.esc_attr__("flag","fattoria").'" src="'.esc_url($flag_url).'">';
                                    $lang_active .=         '<span class="silver">'.$name.'</span>';
                                    $lang_active .=     '</a>';
                                }
                                else $l_class = '';
                                $lang_sub .=                '<li class="'.$l_class.'">
                                                                <a href="'.esc_url($url).'">';
                                if($flag == 'yes') $lang_sub .=     '<img alt="'.esc_attr__("flag","fattoria").'" src="'.esc_url($flag_url).'">';
                                $lang_sub .=                        $name;
                                $lang_sub .=                    '</a>
                                                            </li>';
                            }
                        $html .=    '<div class="dropdown-box language-box">';
                        $html .=        $lang_active;
                        $html .=        '<ul class="list-none dropdown-list">';
                        $html .=            $lang_sub;
                        $html .=        '</ul>';
                        $html .=    '</div>';
                    }
                    else{
                        if(defined('QTX_VERSION')){
                            global $q_config;
                            $languages = qtranxf_getSortedLanguages();
                            $current_lang = s7upf_get_current_language();
                            if(is_404()) $url = home_url('/'); else $url = '';
                            $flag_location=qtranxf_flag_location();
                            foreach ($languages as $lang) {
                                $url = qtranxf_convertURL($url, $lang, false, true);
                                $flag_url = $flag_location.$q_config['flag'][$lang];
                                $name = $q_config['language_name'][$lang];
                                if($lang == $current_lang){
                                    $l_class = 'active';
                                    $lang_active .=     '<a class="dropdown-link text-uppercase" href="'.esc_url($url).'">';
                                    if($flag == 'yes') $lang_active .=     '<img alt="'.esc_attr__("flag","fattoria").'" src="'.esc_url($flag_url).'">';
                                    $lang_active .=         '<span class="silver">'.$name.'</span>';
                                    $lang_active .=     '</a>';
                                }
                                else $l_class = '';
                                $lang_sub .=                '<li class="'.$l_class.'">
                                                                <a href="'.esc_url($url).'">';
                                if($flag == 'yes') $lang_sub .=     '<img alt="'.esc_attr__("flag","fattoria").'" src="'.esc_url($flag_url).'">';
                                $lang_sub .=                        $name;
                                $lang_sub .=                    '</a>
                                                            </li>';
                            }
                            $html .=    '<div class="dropdown-box language-box">';
                            $html .=        $lang_active;
                            $html .=        '<ul class="list-none dropdown-list">';
                            $html .=            $lang_sub;
                            $html .=        '</ul>';
                            $html .=    '</div>';
                        }
                    }
                    break;
            }            
            return $html;
        }
    }

    stp_reg_shortcode('s7upf_language_selector','s7upf_vc_language_selector');

    vc_map( array(
        "name"          => esc_html__("Language Selector", 'fattoria'),
        "base"          => "s7upf_language_selector",
        "icon"          => "icon-st",
        "category"      => esc_html__("7UP-Elements", 'fattoria'),
        "description"   => esc_html__( 'Display language selector', 'fattoria' ),
        "params"    => array(
            array(
                "type"          => "dropdown",
                "admin_label"   => true,
                "heading"       => esc_html__("Type",'fattoria'),
                "param_name"    => "style",
                "value"         => array(
                    esc_html__("Default",'fattoria')           => 'default',
                    esc_html__("Wpml style",'fattoria')        => 'wpml-style',
                    esc_html__("Polylang style",'fattoria')    => 'poly-style',
                ),
                "description"   => esc_html__( 'Choose a style to display.', 'fattoria' )
            ),
            array(
                "type"          => "dropdown",
                "admin_label"   => true,
                "heading"       => esc_html__("Show Flag",'fattoria'),
                "param_name"    => "flag",
                "value"         => array(
                    esc_html__("Yes",'fattoria')    => 'yes',
                    esc_html__("No",'fattoria')     => 'no',
                ),
                "dependency"    => array(
                    "element"       => "style",
                    "value"         => "default",
                )
            ),
        )
    ));
}