<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 05/09/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_posts')){
    function s7upf_vc_posts($attr, $content = false){
        $html = $css_class = '';
        $data_array = array_merge(array(
            'display'       => 'grid',
            'style'         => 'default',
            'title'         => '',
            'des'           => '',
            'number'        => '8',
            'cats'          => '',
            'order_by'      => 'date',
            'order'         => 'DESC',
            'column'        => '1',
            'row_number'    => '1',
            'pagination'    => '',
            'grid_type'     => '',
            'item_style'    => '',
            'item'          => '',
            'item_res'      => '',
            'speed'         => '',
            'slider_navi'   => '',
            'slider_pagi'   => '',
            'size'          => '',
            'el_class'      => '',
            'custom_css'    => '',
            'excerpt'       => '',
            'custom_ids'    => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        $el_class .= ' blog-'.$display.'-view '.$grid_type.' '.$style;
        $paged = (get_query_var('paged') && $display != 'slider') ? get_query_var('paged') : 1;
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => $number,
            'orderby'           => $order_by,
            'order'             => $order,
            'paged'             => $paged,
            );            
        if(!empty($cats)) {
            $custom_list = explode(",",$cats);
            $args['tax_query'][]=array(
                'taxonomy'=>'category',
                'field'=>'slug',
                'terms'=> $custom_list
            );
        }
        if(!empty($custom_ids)){
            $args['post__in'] = explode(',', $custom_ids);
        }
        $post_query = new WP_Query($args);
        $count = 1;
        $count_query = $post_query->post_count;
        $max_page = $post_query->max_num_pages;
        $size = s7upf_get_size_crop($size);
        $attr = array_merge($attr,array(
            'el_class'      => $el_class,
            'post_query'    => $post_query,
            'count'         => $count,
            'count_query'   => $count_query,
            'max_page'      => $max_page,
            'args'          => $args,
            'size'          => $size,
        ));
        $html = s7upf_get_template_element('posts/'.$display,$style,$attr);
        wp_reset_postdata();
        return $html;
    }
}
stp_reg_shortcode('s7upf_posts','s7upf_vc_posts');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_list_post',10,100 );
if ( ! function_exists( 's7upf_add_list_post' ) ) {
    function s7upf_add_list_post(){
        vc_map( array(
            "name"      => esc_html__("Posts", 'fattoria'),
            "base"      => "s7upf_posts",
            "icon"      => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'fattoria'),
            "description"   => esc_html__( 'Display list of post', 'fattoria' ),
            "params"    => array(                
                array(
                    'type'        => 'textfield',
                    "admin_label"   => true,
                    'heading'     => esc_html__( 'Title', 'fattoria' ),
                    'param_name'  => 'title',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Description', 'fattoria' ),
                    'param_name'  => 'des',
                ),
                array(
                    'heading'     => esc_html__( 'Style', 'fattoria' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Choose style to display.', 'fattoria' ),
                    'param_name'  => 'style',
                    'value'       => array(                        
                        esc_html__('Default','fattoria')     => 'default',
                        ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Display', 'fattoria' ),
                    "admin_label"   => true,
                    'type'        => 'dropdown',
                    'description' => esc_html__( 'Choose style to display.', 'fattoria' ),
                    'param_name'  => 'display',
                    'value'       => array(                        
                        esc_html__('Grid','fattoria')      => 'grid',
                        esc_html__('Slider','fattoria')    => 'slider',
                        ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Number', 'fattoria' ),
                    'type'        => 'textfield',
                    'description' => esc_html__( 'Enter number of product. Default is 8.', 'fattoria' ),
                    'param_name'  => 'number',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Custom IDs', 'fattoria' ),
                    'param_name'  => 'custom_ids',
                    'description' => esc_html__( 'Enter list ID. Separate values by ",". Example is 12,15,20', 'fattoria' ),
                ),
                array(
                    'heading'     => esc_html__( 'Post Categories', 'fattoria' ),
                    'type'        => 'autocomplete',
                    'param_name'  => 'cats',
                    'settings' => array(
                        'multiple' => true,
                        'sortable' => true,
                        'values' => s7upf_get_list_taxonomy('category'),
                    ),
                    'save_always' => true,
                    'description' => esc_html__( 'List of post categories', 'fattoria' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Order By', 'fattoria' ),
                    'value' => s7upf_get_order_list(),
                    'param_name' => 'orderby',
                    'description' => esc_html__( 'Select Orderby Type ', 'fattoria' ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Order', 'fattoria' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'order',
                    'value' => array(                   
                        esc_html__('Desc','fattoria')  => 'DESC',
                        esc_html__('Asc','fattoria')  => 'ASC',
                    ),
                    'description' => esc_html__( 'Select Order Type ', 'fattoria' ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Grid Sub string excerpt",'fattoria'),
                    "param_name"    => "excerpt",
                    'description'   => esc_html__( 'Enter number of character want to get from excerpt content. Default is 0(hidden). Example is 80. Note: This value only apply for items style can be show excerpt.', 'fattoria' ),
                ),
                array(
                    'heading'       => esc_html__( 'Post style', 'fattoria' ),
                    'type'          => 'dropdown',
                    'description'   => esc_html__( 'Choose style to display.', 'fattoria' ),
                    'param_name'    => 'item_style',
                    'value'         => s7upf_get_post_style(),
                ),             
                array(
                    'heading'     => esc_html__( 'Grid style', 'fattoria' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'grid_type',
                    'value' => array(                   
                        esc_html__('Default','fattoria')  => '',
                        esc_html__('Masonry','fattoria')  => 'list-masonry',
                    ),
                    'description' => esc_html__( 'Select Column display ', 'fattoria' ),
                    "group"         => esc_html__("Grid Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),  
                array(
                    'heading'     => esc_html__( 'Column', 'fattoria' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'column',
                    'value' => array(                   
                        esc_html__('2 columns','fattoria')  => '2',
                        esc_html__('3 columns','fattoria')  => '3',
                        esc_html__('4 columns','fattoria')  => '4',
                        esc_html__('5 columns','fattoria')  => '5',
                        esc_html__('6 columns','fattoria')  => '6',
                    ),
                    'description' => esc_html__( 'Select Column display ', 'fattoria' ),
                    "group"         => esc_html__("Grid Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),                
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Pagination",'fattoria'),
                    "param_name"    => "pagination",
                    "value"         => array(
                        esc_html__("None",'fattoria')                => '',
                        esc_html__("Pagination",'fattoria')          => 'pagination',
                        esc_html__("Load more button",'fattoria')    => 'load-more',
                        ),
                    'group'         => esc_html__('Grid Settings','fattoria'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "grid",
                    ),
                ),              
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Size Thumbnail",'fattoria'),
                    "param_name"    => "size",
                    'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height), for multi size: 200x100|200x200 separate by "|" or ",").', 'fattoria' ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Item",'fattoria'),
                    "param_name"    => "item",
                    "group"         => esc_html__("Slider Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Item Responsive",'fattoria'),
                    "param_name"    => "item_res",
                    "group"         => esc_html__("Slider Settings",'fattoria'),
                    'description'   => esc_html__( 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.', 'fattoria' ),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Speed",'fattoria'),
                    "param_name"    => "speed",
                    "group"         => esc_html__("Slider Settings",'fattoria'), 
                    'description'   => esc_html__( 'Enter number speed to auto slider (ms). Example is 5000. Default auto is disable.', 'fattoria' ),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),                   
                ),
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Row / item slider",'fattoria'),
                    "param_name"    => "row_number",
                    'value' => array(                   
                        esc_html__('1 row','fattoria')  => '1',
                        esc_html__('2 rows','fattoria')  => '2',
                        esc_html__('3 rows','fattoria')  => '3',
                        esc_html__('4 rows','fattoria')  => '4',
                        esc_html__('5 rows','fattoria')  => '5',
                        esc_html__('6 rows','fattoria')  => '6',
                        esc_html__('7 rows','fattoria')  => '7',
                        esc_html__('8 rows','fattoria')  => '8',
                        esc_html__('9 rows','fattoria')  => '9',
                        esc_html__('10 rows','fattoria')  => '10',
                    ),
                    'description'   => esc_html__( 'Choose number row to display', 'fattoria' ),
                    "group"         => esc_html__("Slider Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ),  
                ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Navigation', 'fattoria' ),
                'param_name'  => 'slider_navi',
                'value'       => array(
                    esc_html__( 'Hidden', 'fattoria' )                  => '',
                    esc_html__( 'Default Navigation', 'fattoria' )      => 'navi-nav-style',
                    esc_html__( 'Group Navigation', 'fattoria' )        => 'group-navi',
                ),
                "group"         => esc_html__("Slider Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
                    ), 
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Pagination', 'fattoria' ),
                'param_name'  => 'slider_pagi',
                'value'       => array(
                    esc_html__( 'Hidden', 'fattoria' )                  => '',
                    esc_html__( 'Default Pagination', 'fattoria' )      => 'pagi-nav-style',
                ),
                "group"         => esc_html__("Slider Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "display",
                        "value"         => "slider",
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
