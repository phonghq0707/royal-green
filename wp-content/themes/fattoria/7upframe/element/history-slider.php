<?php
/**
 * Created by Sublime text 3.
 * User: datlv
 * Date: 11/07/18
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_history_slider'))
{
    function s7upf_vc_history_slider($attr, $content = false)
    {
        $html = $css_class = '';
        $data_array = shortcode_atts(array(
			'list_history'	=> '',
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
        $data = (array) vc_param_group_parse_atts( $list_history );
		$default_val = array(
            'title'         => '',
            'desc'          => '',
            'number_year'   => '',
		);

        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
			'data'          => $data,
            'default_val'   => $default_val,
        ));

        // Call function get template
        $html = s7upf_get_template_element('history-slider/history-slider','' ,$attr);

        return $html;
    }
}
stp_reg_shortcode('s7upf_history_slider','s7upf_vc_history_slider');

// Banner item
vc_map(
    array(
        'name'     => esc_html__( 'History Slider', 'fattoria' ),
        'base'     => 's7upf_history_slider',
        'icon'     => 'icon-st',
        "category"      => esc_html__("7UP-Elements", 'fattoria'),
	    "description"   => esc_html__( 'Display history begin of site', 'fattoria' ),
        'content_element' => true,
        'params'   => array(   
			array(
				"type"          => "param_group",
				"heading"       => esc_html__("History List",'fattoria'),
				"param_name"    => "list_history",
				"params"        => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Title', 'fattoria' ),
						'param_name'  => 'title',
						"description"   => esc_html__( 'Enter title to display.', 'fattoria' )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Description', 'fattoria' ),
						'param_name'  => 'desc',
						"description"   => esc_html__( 'Enter the content of the imprints has been made.', 'fattoria' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Number Year', 'fattoria' ),
						'param_name'  => 'number_year',
						"description"   => esc_html__( 'Enter number year to display.', 'fattoria' ),
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
    )
);