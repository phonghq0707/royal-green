<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_logo')){
    function s7upf_vc_logo($attr, $content = false){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'         => 'img',
            'site_title'    => 'on',
            'logo_img'      => '',
            'el_class'      => '',
            'custom_css'    => '',
            'content'       => $content,            
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class
            ));

        // Call function get template
        $html = s7upf_get_template_element('logo/logo',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_logo','s7upf_vc_logo');

vc_map( array(
    "name"          => esc_html__("Logo", 'fattoria'),
    "base"          => "s7upf_logo",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'fattoria'),
    "description"   => esc_html__( 'Display logo on your site', 'fattoria' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'fattoria'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'fattoria')     => 'img',
                esc_html__("Logo Text",'fattoria')   => 'text',
            ),
            "description"   => esc_html__( 'Choose logo style to display.', 'fattoria' )
        ),
        array(
            "type"          => "attach_image",
            "admin_label"   => true,
            "heading"       => esc_html__("Logo image",'fattoria'),
            "param_name"    => "logo_img",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "img",
            ),
            "description"   => esc_html__( 'Choose a image to display as logo site.', 'fattoria' )
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Seo site title in logo",'fattoria'),
            "param_name"    => "site_title",
            "value"         => array(
                esc_html__("On",'fattoria')     => 'on',
                esc_html__("Off",'fattoria')   => 'off',
            ),
            "description"   => esc_html__( 'The site title will appear as html with the h1 tag.', 'fattoria' )
        ),
        array(
            "type"          => "textarea_html",
            "admin_label"   => true,
            "heading"       => esc_html__("Text",'fattoria'),
            "param_name"    => "content",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "text",
            ),
            "description"   => esc_html__( 'Enter content logo text to display.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Extra class name",'fattoria'),
            "param_name"    => "el_class",
            'group'         => esc_html__('Design Options','fattoria'),
            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fattoria' )
        ),
        array(
            "type"          => "css_editor",
            "heading"       => esc_html__("CSS box",'fattoria'),
            "param_name"    => "custom_css",
            'group'         => esc_html__('Design Options','fattoria')
        ),
    )
));