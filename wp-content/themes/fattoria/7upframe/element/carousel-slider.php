<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 31/08/15
 * Time: 10:00 AM
 */
/************************************Main Carousel*************************************/
if(!function_exists('s7upf_vc_slide_carousel'))
{
    function s7upf_vc_slide_carousel($attr, $content = false)
    {
        $html = $css_class = '';
        $data_array = array_merge(array(
            'item'          => '1',
            'speed'         => '',
            'itemres'       => '',
            'navigation'    => '',
            'pagination'    => '',
            'nav_next'      => '',
            'nav_prev'      => '',
            'banner_bg'     => '',
            'animation_out' => '',
            'animation_in'  => '',
            'margin'        => '',
            'stage_padding' => '',
            'start_position'=> '',
            'loop'          => '',
            'mousewheel'    => '',
            'custom_css'    => '',
            'el_class'      => '',
            'content'       => $content,            
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        $el_class .= ' '.$banner_bg;

        $attr = array_merge($attr,array(
            'el_class' => $el_class,
            ));
        $html = s7upf_get_template_element('slide-carousel/carousel','',$attr);
        return $html;
    }
}
stp_reg_shortcode('slide_carousel','s7upf_vc_slide_carousel');
vc_map(
    array(
        'name'          => esc_html__( 'Carousel Slider', 'fattoria' ),
        'base'          => 'slide_carousel',
        "category"      => esc_html__("7UP-Elements", 'fattoria'),
        "description"   => esc_html__( 'Display banner slider', 'fattoria' ),
        'icon'          => 'icon-st',
        'as_parent'     => array( 'only' => 'vc_column_text,vc_single_image,slide_banner_item,s7upf_advertisement,s7upf_team,s7upf_testimonial' ),
        'content_element' => true,
        'js_view'       => 'VcColumnView',
        'params'        => array(                       
            array(
                'heading'     => esc_html__( 'Item slider display', 'fattoria' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter number of item. Default is 1.', 'fattoria' ),
                'param_name'  => 'item',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Image style', 'fattoria' ),
                'param_name'  => 'banner_bg',
                'value'       => array(
                    esc_html__( 'Default', 'fattoria' )                        => '',
                    esc_html__( 'Banner Background', 'fattoria' )              => 'bg-slider',
                    esc_html__( 'Banner Background Parallax', 'fattoria' )     => 'bg-slider parallax-slider', 
                ),
            ),
            array(
                'heading'     => esc_html__( 'Speed', 'fattoria' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter time slider go to next item. Unit (ms). Example 5000. If empty this field autoPlay is false.', 'fattoria' ),
                'param_name'  => 'speed',
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation', 'fattoria' ),
                'param_name'  => 'navigation',
                'value'       => array(
                    esc_html__( 'Hidden', 'fattoria' )                  => '',
                    esc_html__( 'Default Navigation', 'fattoria' )      => 'navi-nav-style',
                ),
            ),
            array(
                'heading'     => esc_html__( 'Text prev', 'fattoria' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter text/html previous button slider', 'fattoria' ),
                'param_name'  => 'nav_prev',
                'dependency'  => array(
                    'element'   => 'navigation',
                    'not_empty' => true,
                    )
            ),
            array(
                'heading'     => esc_html__( 'Text next', 'fattoria' ),
                'type'        => 'textfield',
                'description' => esc_html__( 'Enter text/html next button slider', 'fattoria' ),
                'param_name'  => 'nav_next',
                'dependency'  => array(
                    'element'   => 'navigation',
                    'not_empty' => true,
                    )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Pagination', 'fattoria' ),
                'param_name'  => 'pagination',
                'value'       => array(
                    esc_html__( 'Hidden', 'fattoria' )                  => '',
                    esc_html__( 'Default Pagination', 'fattoria' )      => 'pagi-nav-style',
                ),
            ),
            array(
                'heading'     => esc_html__( 'Custom Item', 'fattoria' ),
                'type'        => 'textfield',
                'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'fattoria' ),
                'group'         => esc_html__('Advanced','fattoria'),
                'param_name'  => 'itemres',
            ),
            array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Item Out Animation', 'fattoria' ),
                'param_name'    => 'animation_out',
                'admin_label'   => true,
                'value'         => '',
                'settings'      => array(
                    'type'          => 'in',
                    'custom'        =>  array(
                        array(
                            'label'     => esc_html__( 'Default', 'fattoria' ),
                            'values'    => array(
                                esc_html__( 'Top to bottom', 'fattoria' ) => 'top-to-bottom',
                                esc_html__( 'Bottom to top', 'fattoria' ) => 'bottom-to-top',
                                esc_html__( 'Left to right', 'fattoria' ) => 'left-to-right',
                                esc_html__( 'Right to left', 'fattoria' ) => 'right-to-left',
                                esc_html__( 'Appear from center', 'fattoria' ) => 'appear',
                            ),
                        ),
                    ),
                ),
                'group'         => esc_html__('Advanced','fattoria'),
                'description' => esc_html__( 'Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).', 'fattoria' ),
            ),
            array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Item In Animation', 'fattoria' ),
                'param_name'    => 'animation_in',
                'admin_label'   => true,
                'value'         => '',
                'settings'      => array(
                    'type'          => 'in',
                    'custom'        =>  array(
                        array(
                            'label'     => esc_html__( 'Default', 'fattoria' ),
                            'values'    => array(
                                esc_html__( 'Top to bottom', 'fattoria' ) => 'top-to-bottom',
                                esc_html__( 'Bottom to top', 'fattoria' ) => 'bottom-to-top',
                                esc_html__( 'Left to right', 'fattoria' ) => 'left-to-right',
                                esc_html__( 'Right to left', 'fattoria' ) => 'right-to-left',
                                esc_html__( 'Appear from center', 'fattoria' ) => 'appear',
                            ),
                        ),
                    ),
                ),
                'group'         => esc_html__('Advanced','fattoria'),
                'description' => esc_html__( 'Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).', 'fattoria' ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Margin",'fattoria'),
                "param_name"    => "margin",
                'group'         => esc_html__('Advanced','fattoria'),
                'description'   => esc_html__( 'Enter number margin-right(px) on item.', 'fattoria' )
                ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Stage Padding",'fattoria'),
                "param_name"    => "stage_padding",
                'group'         => esc_html__('Advanced','fattoria'),
                'description'   => esc_html__( 'Padding left and right on stage (can see neighbours).', 'fattoria' )
                ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Start Position",'fattoria'),
                "param_name"    => "start_position",
                'group'         => esc_html__('Advanced','fattoria'),
                'description'   => esc_html__( 'Enter number of start position. Default is 0', 'fattoria' )
                ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Loop",'fattoria'),
                "param_name"    => "loop",
                'value'       => array(
                    esc_html__( 'Off', 'fattoria' )         => '',
                    esc_html__( 'On', 'fattoria' )          => 'true',
                ),
                'group'         => esc_html__('Advanced','fattoria'),
                'description'   => esc_html__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'fattoria' )
                ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Mousewheel",'fattoria'),
                "param_name"    => "mousewheel",
                'value'       => array(
                    esc_html__( 'Off', 'fattoria' )         => '',
                    esc_html__( 'On', 'fattoria' )          => 'true',
                ),
                'group'         => esc_html__('Advanced','fattoria'),
                'description'   => esc_html__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'fattoria' )
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

/*******************************************END MAIN*****************************************/


/**************************************BEGIN ITEM************************************/
//Banner item Frontend
if(!function_exists('s7upf_vc_slide_banner_item'))
{
    function s7upf_vc_slide_banner_item($attr, $content = false)
    {
        $html = $css_class = '';
        $data_array = array_merge(array(
            'style'             => '',
            'image'             => '',
            'size'              => '',
            'link'              => '',
            'info_animation'    => '',
            'info_style'        => '',
            'info_align'        => '',
            'info_transform'    => '',
            'merge'             => '1',
            'custom_css'        => '',
            'el_class'          => '',
            'content'           => $content,
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );

        $el_class .= ' '.$style.' '.$css_class;
        $info_class = $info_style.' '.$info_align.' '.$info_transform;
        if(!empty($info_animation)) $info_class .= ' animated';
        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'info_class'    => $info_class,
            'size'          => $size,
            ));
        if(!empty($image)){
            $html = s7upf_get_template_element('slide-carousel/item',$style,$attr);
        }
        return $html;
    }
}
stp_reg_shortcode('slide_banner_item','s7upf_vc_slide_banner_item');

// Banner item
vc_map(
    array(
        'name'     => esc_html__( 'Banner Item', 'fattoria' ),
        'base'     => 'slide_banner_item',
        'icon'     => 'icon-st',
        'content_element' => true,
        'as_child' => array('only' => 'slide_carousel'),
        'params'   => array(            
            array(
                "type"          => "textarea_html",
                "holder"        => "div",
                "heading"       => esc_html__("Content",'fattoria'),
                "param_name"    => "content",
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Style', 'fattoria' ),
                'param_name'    => 'style',
                'value'         => array(
                    esc_html__( 'Default', 'fattoria' ) => '',
                    )
            ),            
            array(
                'type'          => 'attach_image',
                'heading'       => esc_html__( 'Image', 'fattoria' ),
                'param_name'    => 'image',
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Link Banner', 'fattoria' ),
                'param_name'    => 'link',
            ),
            array(
                'type'          => 'animation_style',
                'heading'       => esc_html__( 'Info Animation', 'fattoria' ),
                'param_name'    => 'info_animation',
                'admin_label'   => true,
                'value'         => '',
                'settings'      => array(
                    'type'          => 'in',
                    'custom'        =>  array(
                        array(
                            'label'     => esc_html__( 'Default', 'fattoria' ),
                            'values'    => array(
                                esc_html__( 'Top to bottom', 'fattoria' ) => 'top-to-bottom',
                                esc_html__( 'Bottom to top', 'fattoria' ) => 'bottom-to-top',
                                esc_html__( 'Left to right', 'fattoria' ) => 'left-to-right',
                                esc_html__( 'Right to left', 'fattoria' ) => 'right-to-left',
                                esc_html__( 'Appear from center', 'fattoria' ) => 'appear',
                            ),
                        ),
                    ),
                ),
                'description' => esc_html__( 'Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).', 'fattoria' ),
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Style', 'fattoria' ),
                'param_name'    => 'info_style',
                'value'         => array(
                    esc_html__( 'None', 'fattoria' )     => '',
                    esc_html__( 'Black', 'fattoria' )    => 'black',
                    esc_html__( 'White', 'fattoria' )    => 'white',
                    esc_html__( 'Navi', 'fattoria' )     => 'navi',
                    )
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Align', 'fattoria' ),
                'param_name'    => 'info_align',
                'value'         => array(
                    esc_html__( 'Default', 'fattoria' )    => '',
                    esc_html__( 'Left', 'fattoria' )       => 'text-left',
                    esc_html__( 'Right', 'fattoria' )      => 'text-right',
                    esc_html__( 'Center', 'fattoria' )     => 'text-center',
                    )
                ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Info Transform', 'fattoria' ),
                'param_name'    => 'info_transform',
                'value'         => array(
                    esc_html__( 'Default', 'fattoria' )     => '',
                    esc_html__( 'Uppercase', 'fattoria' )   => 'text-uppercase',
                    )
                ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Merge",'fattoria'),
                "param_name"    => "merge",
                'description'   => esc_html__( 'Enter number item merge. Default is 1.', 'fattoria' )
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

/**************************************END ITEM************************************/

/**************************************BEGIN ITEM************************************/
//Banner item Frontend
if(!function_exists('s7upf_vc_slide_testimonial_item'))
{
    function s7upf_vc_slide_testimonial_item($attr, $content = false)
    {
        $html = $view_html = $view_html2 = '';
        extract(shortcode_atts(array(
            'style'         => '',
            'image'         => '',
            'name'          => '',
            'position'      => '',            
            'des'           => '',
            'link'          => '',
        ),$attr));
        switch ($style) {
            case 'about-page':
                $html .=    '<div class="item-about-client">
                                <div class="client-thumb"><a href="'.esc_url($link).'">'.wp_get_attachment_image($image,'full').'</a></div>
                                <div class="client-info">
                                    <p class="desc">'.esc_html($des).'</p>
                                    <h3 class="title14"><a href="'.esc_url($link).'" class="color">'.esc_html($name).'</a></h3>
                                    <span class="silver">'.esc_html($position).'</span>
                                </div>
                            </div>';
                break;
            
            default:
                $html .=    '<div class="item-testimo4 table">
                                <div class="testimo-thumb">
                                    <a href="'.esc_url($link).'">'.wp_get_attachment_image($image,'full',0,array("class"=>"round")).'</a>
                                </div>
                                <div class="testimo-info">
                                    <ul class="list-inline-block">
                                        <li><a href="'.esc_url($link).'" class="color text-uppercase">'.esc_html($name).'</a></li>
                                        <li><span>'.esc_html($position).'</span></li>
                                    </ul>
                                    <p class="desc">'.esc_html($des).'</p>
                                </div>
                            </div>';
                break;
        }        
        return $html;
    }
}
stp_reg_shortcode('slide_testimonial_item','s7upf_vc_slide_testimonial_item');

// Banner item
vc_map(
    array(
        'name'     => esc_html__( 'Testimonial Item', 'fattoria' ),
        'base'     => 'slide_testimonial_item',
        'icon'     => 'icon-st',
        'content_element' => true,
        'as_child' => array('only' => 'slide_carousel'),
        'params'   => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Style', 'fattoria' ),
                'param_name'  => 'style',
                'value'       => array(
                    esc_html__( 'Default', 'fattoria' ) => '',
                    esc_html__( 'About style', 'fattoria' ) => 'about-page',
                    )
            ),            
            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__( 'Image', 'fattoria' ),
                'param_name'  => 'image',
            ),
            array(
                'type'        => 'textfield',
                "holder"        => "h3",
                'heading'     => esc_html__( 'Name', 'fattoria' ),
                'param_name'  => 'name',
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Position', 'fattoria' ),
                'param_name'  => 'position',
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Link', 'fattoria' ),
                'param_name'  => 'link',
            ),  
            array(
                "type"          => "textarea",
                "holder"        => "p",
                "heading"       => esc_html__("Description",'fattoria'),
                "param_name"    => "des",
            ),
        )
    )
);

/**************************************END ITEM************************************/

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Slide_Carousel extends WPBakeryShortCodesContainer {}
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Slide_Banner_Item extends WPBakeryShortCode {}
}