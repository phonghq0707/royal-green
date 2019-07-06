<?php
/**
 * Created by Sublime text 3.
 * User: datlv
 * Date: 16/04/18
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_cate_list')){
    function s7upf_vc_cate_list($attr, $content = false){
        $html = $css_class = '';
        $data_array = shortcode_atts(array(
            'heading_title'     => '',
            'style'             => '',
            'cate_list'         => '',
            'cats'              => '',
            'icon_fontawesome'  => '',
            'image'             => '',
            'title'             => '',
            'link'              => '',
			'item_cat'			=> '',
			'itemres_cat'		=> '',
            'add_mega'          => '',
            'mega_item'         => '',
            'mega_width'        => '',
            'el_class'          => '',
            'custom_css'        => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;

        $el_class .= ' '.$style;

        $data = (array) vc_param_group_parse_atts( $cate_list );

        // Add variable to data
        $default_val = array(
            'title'      => '',
            'link'       => '',
            'mega_class' => '',
        );
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'data'          => $data,
            'default_val'   => $default_val,
        ));

        // Call function get template
        $html = s7upf_get_template_element('category-list/category-list',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_cate_list','s7upf_vc_cate_list');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_list_product_category',10,100 );
if ( ! function_exists( 's7upf_add_list_product_category' ) ) {
    function s7upf_add_list_product_category(){
        vc_map( array(
            "name"          => esc_html__("Category List", 'fattoria'),
            "base"          => "s7upf_cate_list",
            "icon"          => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'fattoria'),
            "description"   => esc_html__( 'Display product categories list with icon/image', 'fattoria' ),
            "params"        => array(
                array(
                    'type'          => 'textfield',
                    "holder"        => "div",
                    "admin_label"   => true,
                    'heading'       => esc_html__( 'Title', 'fattoria' ),
                    'param_name'    => 'heading_title',
                    "description"   => esc_html__( 'Enter heading title to display.', 'fattoria' )
                ),
				array(
					'type'          => 'textfield',
					'heading'       => esc_html__( 'Item slider display', 'fattoria' ),
					'param_name'    => 'item_cat',
					"description"   => esc_html__( 'Enter number of item. Example: 1.', 'fattoria' ),
				),
				array(
					'type'          => 'textfield',
					'heading'       => esc_html__( 'Custom item', 'fattoria' ),
					'param_name'    => 'itemres_cat',
					"description"   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'fattoria' ),
				),
                
        // Group Setting 
                array(
                    "type"          => "param_group",
                    "heading"       => esc_html__("Categories List ",'fattoria'),
                    "param_name"    => "cate_list",
                    "params"        => array(
                        
                        array(
                            "type"          => "dropdown",
                            "admin_label"   => true,
                            "heading"       => esc_html__("Style",'fattoria'),
                            "param_name"    => "style",
                            "value"         => array(
                                esc_html__("Default",'fattoria')    => 'link',
                                esc_html__("Add Icon",'fattoria')       => 'icon',
                                esc_html__("Add Image",'fattoria')      => 'image',
                                esc_html__("Style home 3",'fattoria')      => 'style2',
                            ),
                            "description"   => esc_html__( 'Choose style to display.', 'fattoria' )
                        ),
                        
                        array(
                            'type'          => 'iconpicker',
                            'heading'       => esc_html__( 'Icon', 'fattoria' ),
                            'param_name'    => 'icon_fontawesome',
                            'value'         => '',
                            'settings'      => array(
                                'emptyIcon'     => true,
                                'type'          => s7upf_default_icon_lib(),
                                'iconsPerPage'  => 4000,
                            ),
                            'description'   => esc_html__( 'Select icon from library.', 'fattoria' ),
                                'dependency'    => array(
                                'element'   => 'style',
                                'value'     => 'icon',
                            ),
                            
                        ),

                        array(
                            "type"          => "attach_image",
                            "admin_label"   => true,
                            "heading"       => esc_html__("Image",'fattoria'),
                            "param_name"    => "image",
                            "dependency"    =>  array(
                                "element"   => "style",
                                'value'     => array("image"),
                            ),
                            "description"   => esc_html__( 'Choose a image to display.', 'fattoria' )
                        ),

                        array(
                            'type'          => 'autocomplete',
                            "admin_label"   => true,
                            'heading'        => esc_html__( 'Product Category', 'fattoria' ),
                            'param_name'    => 'cats',
                            'settings' => array(
                                'multiple' => false,
                                'sortable' => false,
                                'values' => s7upf_get_list_taxonomy(),
                            ),
                            'save_always'   => true,
                            'description'   => esc_html__( 'List of product categories', 'fattoria' ),
                        ),   

                        array(
                            'type'          => 'textfield',
                            "holder"        => "h3",
                            "admin_label"   => true,
                            'heading'       => esc_html__( 'Custom Category Name', 'fattoria' ),
                            'param_name'    => 'title',
                            "description"   => esc_html__( 'Enter category name to display.', 'fattoria' )
                        ),
                        
                        array(
                            'type'          => 'textfield',
                            'heading'       => esc_html__( 'Custom Category URL', 'fattoria' ),
                            'param_name'    => 'link',
                            "description"   => esc_html__( 'Enter url to view detail.', 'fattoria' )
                        ),  

                        array(
                            "type"          => "checkbox",
                            "holder"        => "div",
                            "class"         => "",
                            "heading"       => esc_html__("Mega menu", 'fattoria'),
                            "param_name"    => "add_mega",
                            "value"     => array(
                                'Enable Mega menu' => 'enable'
                            ),
                            "description"   => esc_html__("Add mega menu when hover", 'fattoria')
                        ),   

                        array(
                            'heading'       => esc_html__( 'Mega items list', 'fattoria' ),
                            'type'          => 'dropdown',
                            'param_name'    => 'mega_item',
                            'description'   => esc_html__( 'Choose item to display.', 'fattoria' ),
                            'value'         => s7upf_list_post_type('s7upf_mega_item',true),
                            "dependency"    =>  array(
                                "element"   => "add_mega",
                                'value'     => array("enable"),
                            ),

                        ),
                        array(
                            'type'          => 'textfield',
                            'heading'       => esc_html__( 'Set width Mega menu', 'fattoria' ),
                            'param_name'    => 'mega_width',
                            "description"   => esc_html__( 'Custom width Mega menu. Example: 500px.', 'fattoria' ),
                            "dependency"    =>  array(
                                "element"   => "add_mega",
                                'value'     => array("enable"),

                            ),
                        ),
                        array(
                            'type'          => 'textfield',
                            'heading'       => esc_html__( 'Mega Menu Class', 'fattoria' ),
                            'param_name'    => 'mega_class',
                            "description"   => esc_html__( 'Add class to mega menu.', 'fattoria' ),
                            "dependency"    =>  array(
                                "element"   => "add_mega",
                                'value'     => array("enable"),

                            ),
                        ),
                    ),
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