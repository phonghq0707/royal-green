<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_social')){
    function s7upf_vc_social($attr, $content = false){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'         => 'default',
            'list'          => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        $el_class .= ' '.$style;
        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'icon'      => '',
            'link'      => '',
            );

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'data'          => $data,
            'default_val'   => $default_val,
            ));

        // Call function get template
        $html = s7upf_get_template_element('social/social',$style,$attr);

		return  $html;
    }
}

stp_reg_shortcode('s7upf_social','s7upf_vc_social');

add_action( 'vc_before_init_base','s7upf_social_admin',10,100 );
if ( ! function_exists( 's7upf_social_admin' ) ) {
    function s7upf_social_admin(){
        vc_map( array(
            "name"          => esc_html__("Social", 'fattoria'),
            "base"          => "s7upf_social",
            "icon"          => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'fattoria'),
            "description"   => esc_html__( 'Display social list on your site', 'fattoria' ),
            "params"        => array(
                array(
        			'type'           => 'dropdown',
                    "admin_label"    => true,
                    'param_name'     => 'style',
        			'heading'        => esc_html__( 'Style', 'fattoria' ),
        			'value'          => array(
        				esc_html__( 'Default', 'fattoria' )     => 'default',
        			),
        			"description"   => esc_html__( 'Choose a style to display.', 'fattoria' )
        		),
                array(
                    "type"          => "param_group",
                    "heading"       => esc_html__("Social List",'fattoria'),
                    "param_name"    => "list",
                    "params"        => array(
                        array(
                            'type'          => 'iconpicker',
                            'heading'       => esc_html__( 'Icon', 'fattoria' ),
                            'param_name'    => 'icon',
                            'value'         => '',
                            'settings'      => array(
                                'emptyIcon'     => true,
                                'type'          => s7upf_default_icon_lib(),
                                'iconsPerPage'  => 4000,
                            ),
                            'description'   => esc_html__( 'Select icon from library.', 'fattoria' ),
                        ),
                        array(
                            "type"          => "textfield",
                            "heading"       => esc_html__("Link",'fattoria'),
                            "param_name"    => "link",
                            "description"   => esc_html__( 'Enter URL redirect when click to icon.', 'fattoria' )
                        ),
                    )
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
    }
}