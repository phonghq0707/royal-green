<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_pricing_table')){
    function s7upf_vc_pricing_table($attr, $content = false){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'         => '',
            'title'         => '',
            'des'           => '',
			'img'			=> '',
            'price'         => '',
            'unit'          => '$',
            'duration'      => '',
            'color'         => '',
            'link'          => '',
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

        // Variable process
        $el_class .= ' '.$style;

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            ));

        // Call function get template
        $html = s7upf_get_template_element('pricing-table/table',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_pricing_table','s7upf_vc_pricing_table');

vc_map( array(
    "name"          => esc_html__("Pricing table", 'fattoria'),
    "base"          => "s7upf_pricing_table",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'fattoria'),
    "description"   => esc_html__( 'Display pricing table', 'fattoria' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'fattoria'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'fattoria')     => '',
                esc_html__("Color",'fattoria')     => 'pricing-color',
                esc_html__("Image",'fattoria')     => 'pricing-img',
            ),
            "description"   => esc_html__( 'Choose style to display.', 'fattoria' )
        ),
		array(
			"type"          => "attach_image",
			"admin_label"   => true,
			"heading"       => esc_html__("Image",'fattoria'),
			"param_name"    => "img",
			"dependency"    =>  array(
                "element"       => "style",
                "value"         => "pricing-img",
            ),
			"description"   => esc_html__( 'Choose a image to display as thumbnail pricing table.', 'fattoria' )
		),
        array(
            "type"          => "colorpicker",
            "heading"       => esc_html__("Color",'fattoria'),
            "param_name"    => "color",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "pricing-color",
            ),
            "description"   => esc_html__( 'Choose color.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Title",'fattoria'),
            "param_name"    => "title",
            "description"   => esc_html__( 'Enter title.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Description",'fattoria'),
            "param_name"    => "des",
            "description"   => esc_html__( 'Enter description.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Price",'fattoria'),
            "param_name"    => "price",
            "description"   => esc_html__( 'Enter price.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Unit",'fattoria'),
            "param_name"    => "unit",
            "description"   => esc_html__( 'Enter unit of price. Default is $.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Duration",'fattoria'),
            "param_name"    => "duration",
            "description"   => esc_html__( 'Enter duration of pricing table.', 'fattoria' )
        ),
        array(
            "type"          => "vc_link",
            "heading"       => esc_html__("Link",'fattoria'),
            "param_name"    => "link",
            "description"   => esc_html__( 'Link view detail.', 'fattoria' )
        ),
        array(
            "type"          => "textarea_html",
            "admin_label"   => true,
            "heading"       => esc_html__("Content",'fattoria'),
            "param_name"    => "content",
            "description"   => esc_html__( 'Enter content to display.', 'fattoria' )
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