<?php
/**
 * Notepad++.
 * User: 7uptheme
 * Date: 05/24/15
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_information'))
{
    function s7upf_vc_information($attr,$content = false)
    {
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'     	 => '',
            'icon'      	 => '',
            'title'      	 => '',
            'desc'      	 => '',
			'color'      	 => '',
			'percent'      	 => '',
			'radius'      	 => '90',
			'image'		 	 => '',
			'src_video'		 => '',
			'link'       	 => '',
			'el_class'       => '',
			'custom_css'     => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
		$el_class .= ' '.$css_class;
		// Call function get template
        $html = s7upf_get_template_element('infomation/infomation',$style,$attr);
        return $html;
    }
}
stp_reg_shortcode('s7upf_information','s7upf_vc_information');
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_information',10,100 );
if ( ! function_exists( 's7upf_add_information' ) ) {
	function s7upf_add_information(){
		vc_map( array(
			"name"      => esc_html__("Information", 'fattoria'),
			"base"      => "s7upf_information",
			"icon"      => "icon-st",
			"category"  => '7UP-Elements',
			"params"    => array(
				array(
					"type"          => "dropdown",
					"holder"        => "div",
					"heading"       => esc_html__("Style",'fattoria'),
					"param_name"    => "style",
					"value"         => array(
						esc_html__("Default",'fattoria')   => 'default',
						esc_html__("Style 2",'fattoria')   => 'style2',
						esc_html__("Info Statistic",'fattoria')   => 'style3',
						esc_html__("Info Icon Left",'fattoria')   => 'style4',
						esc_html__("Video",'fattoria')   => 'style5',
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link",'fattoria'),
					"param_name" => "link",
				),
				array(  
					'type' => 'iconpicker' ,
					'heading' => esc_html__('Icon', 'fattoria'),
					'param_name' => 'icon',
					'value' => '',
					'settings'      => array(
						'emptyIcon'     => true,
						'type'          => s7upf_default_icon_lib(),
						'iconsPerPage'  => 4000,
					),
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('default','style2','style4'),
					),
					'description' =>  esc_html__( 'Select an icon from icons library.', 'fattoria' ),
				),
				array(
					"type"          => "attach_image",
					"admin_label"   => true,
					"heading"       => esc_html__("Image",'fattoria'),
					"param_name"    => "image",
					"dependency"    =>  array(
						"element"       => "style",
						"value"         => "style5",
					),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Source Video",'fattoria'),
					"param_name" => "src_video",
					"dependency"    =>  array(
						"element"       => "style",
						"value"         => "style5",
					),
					"description"   => esc_html__( 'Add Source video format *mp4', 'fattoria' ),
				),
				array(
					"type"          => "colorpicker",
					"heading"       => esc_html__("Color",'fattoria'),
					"param_name"    => "color",
					"dependency"    =>  array(
						"element"       => "style",
						"value"         => "style3",
					),
					"description"   => esc_html__( 'Choose color.', 'fattoria' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Percent",'fattoria'),
					"param_name" => "percent",
					"dependency"    =>  array(
						"element"       => "style",
						"value"         => "style3",
					),
					"description"   => esc_html__( 'Enter percent number value(0->100)', 'fattoria' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Radius",'fattoria'),
					"param_name" => "radius",
					"dependency"    =>  array(
						"element"       => "style",
						"value"         => "style3",
					),
					"description"   => esc_html__( 'Enter circle radius(default:90)', 'fattoria' ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title",'fattoria'),
					"param_name" => "title",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('default','style2','style3','style4'),
					)
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__("Description",'fattoria'),
					"param_name" => "desc",
					'dependency'    => array(
						'element'   => 'style',
						'value'   => array('default','style2','style3','style4'),
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Class Extra', 'fattoria' ),
					'param_name'  => 'el_class',
					'group'       => esc_html__('Design Option','fattoria') 
				),
				array(
					"type"          => "css_editor",
					"heading"       => esc_html__("Custom Style",'fattoria'),
					"param_name"    => "custom_css",
					'group'         => esc_html__('Design Option','fattoria')
				),
			)
		));
    }
}