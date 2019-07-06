<?php
/**
 * Created by 7upTheme team.
 * User: 7upTheme
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_countdown')){
    function s7upf_vc_countdown($attr, $content = false){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'         => '',
            'title'         => '',
            'date_time'         => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );

        // Variable process
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        $el_class .= ' s7up-countdown-'.$style;

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
        ));

        // Call function get template
        $html = s7upf_get_template_element('countdown/countdown',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_countdown','s7upf_vc_countdown');

vc_map( array(
    "name"          => esc_html__("Countdown", 'fattoria'),
    "base"          => "s7upf_countdown",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'fattoria'),
    "description"   => esc_html__( 'Display countdown', 'fattoria' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'fattoria'),
            "param_name"    => "style",
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            "value"         => array(
                esc_html__("Default",'fattoria')     => '',
                esc_html__("Style 2",'fattoria')     => 'countdown-style2',
            ),
            "description"   => esc_html__( 'Choose style to display.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Date time",'fattoria'),
            "param_name"    => "date_time",
            'edit_field_class'=>'vc_col-sm-12 vc_column s7up_vc_calendar',
            "description"   => esc_html__( 'Select end date. Example: 12/13/2025 (Date format: "mm/dd/yy" ).', 'fattoria' )
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