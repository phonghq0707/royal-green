<?php
/**
 * Created by Sublime text 3.
 * User: datlv
 * Date: 11/07/18
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_testimonial'))
{
    function s7upf_vc_testimonial($attr, $content = false)
    {
        $html = $css_class = '';
        $data_array = shortcode_atts(array(
            'style'         => '',
            'image'         => '',
            'name'          => '',
            'pos'           => '',
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
        
        $el_class .= ' '.$style;
        
        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
        ));

        // Call function get template
        $html = s7upf_get_template_element('testimonals/testimonals',$style,$attr);

        return $html;
    }
}
stp_reg_shortcode('s7upf_testimonial','s7upf_vc_testimonial');

// Banner item
vc_map(
    array(
        'name'     => esc_html__( 'Testimonial', 'fattoria' ),
        'base'     => 's7upf_testimonial',
        'icon'     => 'icon-st',
        "category"      => esc_html__("7UP-Elements", 'fattoria'),
	    "description"   => esc_html__( 'Display testimonial of client', 'fattoria' ),
        'content_element' => true,
        'params'   => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Style', 'fattoria' ),
                'param_name'  => 'style',
                "admin_label"   => true,
                'value'       => array(
                    esc_html__( 'Default', 'fattoria' ) => '',
                    esc_html__( 'Style 2', 'fattoria' ) => 'style2',
                ),
	            "description"   => esc_html__( 'Choose style to display.', 'fattoria' ),

            ),            
            array(
                'type'        => 'attach_image',
                "admin_label"   => true,
                'heading'     => esc_html__( 'Image', 'fattoria' ),
                'param_name'  => 'image',
                "description"   => esc_html__( 'Choose a image to display.', 'fattoria' ),
               
            ),
            array(
                'type'        => 'textfield',
                "holder"        => "h3",
                'heading'     => esc_html__( 'Name', 'fattoria' ),
                'param_name'  => 'name',
                "description"   => esc_html__( 'Enter name to display.', 'fattoria' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Job', 'fattoria' ),
                'param_name'  => 'pos',
                "description"   => esc_html__( 'Enter job to display.', 'fattoria' ),
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Link', 'fattoria' ),
                'param_name'  => 'link',
	            "description"   => esc_html__( 'Enter url title to view detail.', 'fattoria' ),
            ),  
            array(
                "type"          => "textarea_html",
                "heading"       => esc_html__("Comment",'fattoria'),
                "param_name"    => "content",
                "description"   => esc_html__( 'Enter content text to display.', 'fattoria' )

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