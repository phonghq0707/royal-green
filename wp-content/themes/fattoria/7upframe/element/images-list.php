<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_payment'))
{
    function s7upf_vc_payment($attr, $content = false)
    {
        $html = $icon_html = '';
        $data_array = array_merge(array(
            'style'         => 'brand-slider',
            'title'         => '',
            'des'           => '',
            'list'          => '',
            'itemres'       => '',
            'speed'         => '',
            'size'          => '',
            'el_class'      => '',
            'custom_css'    => '',
            'content'       => $content,
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );

        $size = s7upf_get_size_crop($size,'full');

        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        $el_class .= ' '.$style;
        
        $data = (array) vc_param_group_parse_atts( $list );
        $default_val = array(
            'image'     => '',
            'title'     => '',
            'des'       => '',
            'link'      => '',
            'pos'       => '',
            );

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'data'          => $data,
            'default_val'   => $default_val,
            'size'          => $size,
            ));

        // Call function get template
        $html = s7upf_get_template_element('images-list/list',$style,$attr);

        return  $html;
    }
}

stp_reg_shortcode('sv_payment','s7upf_vc_payment');


vc_map( array(
    "name"          => esc_html__("Images list", 'fattoria'),
    "base"          => "sv_payment",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'fattoria'),
    "description"   => esc_html__( 'Display list images ', 'fattoria' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'fattoria'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'fattoria')    => 'brand-slider',
                esc_html__("Style 2",'fattoria')    => 'style2',
                ),
            "description"   => esc_html__( 'Choose a style to display.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Title",'fattoria'),
            "param_name"    => "title",
            "description"   => esc_html__( 'Enter title of element.', 'fattoria' ),
			'dependency'    => array(
                'element'       => 'style',
                'value'         => array('brand-slider'),
			)
        ),
        array(
            "admin_label"   => true,
            "type"          => "textfield",
            "heading"       => esc_html__("Description",'fattoria'),
            "param_name"    => "des",
            "description"   => esc_html__( 'Enter description of element.', 'fattoria' ),
			'dependency'    => array(
                'element'       => 'style',
                'value'         => array('brand-slider'),
			)
        ),        
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Image custom size",'fattoria'),
            "param_name"    => "size",
            'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fattoria' ),
			'dependency'    => array(
                'element'       => 'style',
                'value'         => array('brand-slider'),
			)
		),
        array(
            'heading'       => esc_html__( 'Custom Item', 'fattoria' ),
            'type'          => 'textfield',
            'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'fattoria' ),
            'param_name'    => 'itemres',
            'group'         => esc_html__("Slider Settings","fattoria"),
            'dependency'    => array(
                'element'       => 'style',
                'value'         => array('brand-slider'),
			)
        ),        
        array(
            'heading'       => esc_html__( 'Speed', 'fattoria' ),
            'type'          => 'textfield',
            'group'         => esc_html__("Slider Settings","fattoria"),
            'description'   => esc_html__( 'Enter time slider go to next item. Unit (ms). Example 5000. If empty this field autoPlay is false.', 'fattoria' ),
            'param_name'    => 'speed',
            'dependency'    => array(
                'element'       => 'style',
                'value'         => array('brand-slider'),
			)
        ),
        array(
            "type"          => "param_group",
            "heading"       => esc_html__("Add Image List",'fattoria'),
            "param_name"    => "list",
            "params"        => array(
                array(
                    "type"          => "attach_image",
                    "heading"       => esc_html__("Image",'fattoria'),
                    "param_name"    => "image",
					'dependency'    => array(
						'element'       => 'style',
						'value'         => array('brand-slider'),
					)
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Title",'fattoria'),
                    "param_name"    => "title",
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Description",'fattoria'),
                    "param_name"    => "des",
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Position",'fattoria'),
                    "param_name"    => "pos",
                    'description'   => esc_html__( 'Only testimonial item', 'fattoria' ),
					'dependency'    => array(
						'element'       => 'style',
						'value'         => array('brand-slider'),
					)
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Link",'fattoria'),
                    "param_name"    => "link",
					'dependency'    => array(
						'element'       => 'style',
						'value'         => array('brand-slider'),
					)
                ),
            ),
            'description'   => esc_html__( 'Add more image with link', 'fattoria' ),
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