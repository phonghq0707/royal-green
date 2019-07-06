<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_breadcrumb')){
    function s7upf_vc_breadcrumb($attr, $content = false){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'         => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        $el_class .=  ' '.$style.' breadcrumb-element';
        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'breadcrumb'    => 'on'
            ));

        // Call function get template
        $html = s7upf_get_template('breadcrumb',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_breadcrumb','s7upf_vc_breadcrumb');

vc_map( array(
    "name"          => esc_html__("Breadcrumb", 'fattoria'),
    "base"          => "s7upf_breadcrumb",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'fattoria'),
    "description"   => esc_html__( 'Display breadcrumb on your site', 'fattoria' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'fattoria'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'fattoria')     => '',
            ),
            "description"   => esc_html__( 'Choose style to display.', 'fattoria' )
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