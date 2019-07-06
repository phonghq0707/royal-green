<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 05/09/15
 * Time: 10:00 AM
 */
if(class_exists("woocommerce")){
    if(!function_exists('s7upf_vc_products')){
        function s7upf_vc_products($attr, $content = false){
            $html = $css_class = '';
            $data_array = array_merge(array(
                'style'         => 'grid',
                'title'         => '',
                'des'           => '',
                'number'        => '8',
                'cats'          => '',
                'order_by'      => 'date',
                'order'         => 'DESC',
                'product_type'  => '',
                'column'        => '2',
                'row_number'    => '1',
                'gap'           => '',
                'pagination'    => '',
                'grid_type'     => '',
                'item_style'    => '',
                'item'          => '',
                'item_res'      => '',
                'speed'         => '',
                'slider_navi'   => '',
                'slider_pagi'   => '',
                'size'          => '',
                'animation'     => '',
                'el_class'      => '',
                'custom_css'    => '',
                'custom_ids'    => '',
                'filter_show'   => '',
                'filter_cats'   => '',
                'filter_price'  => 'yes',
                'filter_attr'   => '',
                'filter_style'  => '',
                'filter_column' => 'filter-2-col',
                'filter_pos'    => '',
            ),s7upf_get_responsive_default_atts());
            $attr = shortcode_atts($data_array,$attr);
            extract($attr);
            $css_classes = vc_shortcode_custom_css_class( $custom_css );
            $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
            
            // Variable process vc_shortcodes_css_class
            if(!empty($css_class)) $el_class .= ' '.$css_class;
            $el_class .= ' product-'.$style.'-view '.$grid_type.' '.$style.' filter-'.$filter_show;
            $paged = (get_query_var('paged') && $style != 'slider') ? get_query_var('paged') : 1;
            $args = array(
                'post_type'         => 'product',
                'posts_per_page'    => $number,
                'orderby'           => $order_by,
                'order'             => $order,
                'paged'             => $paged,
                );
            if($product_type == 'trending'){
                $args['meta_query'][] = array(
                        'key'     => 'trending_product',
                        'value'   => 'on',
                        'compare' => '=',
                    );
            }
            if($product_type == 'toprate'){
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby'] = 'meta_value_num';
                $args['meta_query'] = WC()->query->get_meta_query();
                $args['tax_query'][] = WC()->query->get_tax_query();
            }
            if($product_type == 'mostview'){
                $args['meta_key'] = 'post_views';
                $args['orderby'] = 'meta_value_num';
            }
            if($product_type == 'menu_order'){
                $args['meta_key'] = 'menu_order';
                $args['orderby'] = 'meta_value_num';
            }
            if($product_type == 'bestsell'){
                $args['meta_key'] = 'total_sales';
                $args['orderby'] = 'meta_value_num';
            }
            if($product_type=='onsale'){
                $args['meta_query']['relation']= 'OR';
                $args['meta_query'][]=array(
                    'key'   => '_sale_price',
                    'value' => 0,
                    'compare' => '>',                
                    'type'          => 'numeric'
                );
                $args['meta_query'][]=array(
                    'key'   => '_min_variation_sale_price',
                    'value' => 0,
                    'compare' => '>',                
                    'type'          => 'numeric'
                );
            }
            if($product_type == 'featured'){
                $args['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                );
            }
            if(!empty($cats)) {
                $custom_list = explode(",",$cats);
                $args['tax_query'][]=array(
                    'taxonomy'=>'product_cat',
                    'field'=>'slug',
                    'terms'=> $custom_list
                );
            }
            if(!empty($custom_ids)){
                $args['post__in'] = explode(',', $custom_ids);
            }
            $product_query = new WP_Query($args);
            $count = 1;
            $count_query = $product_query->post_count;
            $max_page = $product_query->max_num_pages;
            $size = s7upf_get_size_crop($size);
            if($gap != '') $el_class .= ' '.$gap;
            $attr = array_merge($attr,array(
                'el_class'      => $el_class,
                'product_query' => $product_query,
                'count'         => $count,
                'count_query'   => $count_query,
                'max_page'      => $max_page,
                'args'          => $args,
                'size'          => $size,
            ));
            $html = s7upf_get_template_element('products/'.$style,'',$attr);
            wp_reset_postdata();
            return $html;
        }
    }
stp_reg_shortcode('s7upf_products','s7upf_vc_products');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_list_product',10,100 );
if ( ! function_exists( 's7upf_add_list_product' ) ) {
    function s7upf_add_list_product(){
        $tab_id = 's7upf_'.uniqid();
        vc_map( array(
            "name"      => esc_html__("Products", 'fattoria'),
            "base"      => "s7upf_products",
            "icon"      => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'fattoria'),
            "description"   => esc_html__( 'Display list of product', 'fattoria' ),
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
                        esc_html__('Grid','fattoria')      => 'grid',
                        esc_html__('Slider','fattoria')    => 'slider',
                        esc_html__('Grid Featured','fattoria')    => 'grid-featured',
                        ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'heading'     => esc_html__( 'Number', 'fattoria' ),
                    'type'        => 'textfield',
                    'description' => esc_html__( 'Enter number of product. Default is 8.', 'fattoria' ),
                    'param_name'  => 'number',
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => esc_html__( 'Custom IDs', 'fattoria' ),
                    'param_name'  => 'custom_ids',
                    'description' => esc_html__( 'Enter list ID. Separate values by ",". Example is 12,15,20', 'fattoria' ),
                ),
                array(
                    'heading'     => esc_html__( 'Product Type', 'fattoria' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'product_type',
                    'value' => array(
                        esc_html__('Default','fattoria')            => '',
                        esc_html__('Trending','fattoria')          => 'trending',
                        esc_html__('Featured Products','fattoria')  => 'featured',
                        esc_html__('Best Sellers','fattoria')       => 'bestsell',
                        esc_html__('On Sale','fattoria')            => 'onsale',
                        esc_html__('Top rate','fattoria')           => 'toprate',
                        esc_html__('Most view','fattoria')          => 'mostview',
                        esc_html__('Menu order','fattoria')         => 'menu_order',
                    ),
                    'description' => esc_html__( 'Select Product View Type', 'fattoria' ),
                ),
                array(
                    'heading'     => esc_html__( 'Product Categories', 'fattoria' ),
                    'type'        => 'autocomplete',
                    'param_name'  => 'cats',
                    'settings' => array(
                        'multiple' => true,
                        'sortable' => true,
                        'values' => s7upf_get_list_taxonomy(),
                    ),
                    'save_always' => true,
                    'description' => esc_html__( 'List of product categories', 'fattoria' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Order By', 'fattoria' ),
                    'value' => s7upf_get_order_list(),
                    'param_name' => 'order_by',
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
                    'heading'       => esc_html__( 'Product style', 'fattoria' ),
                    'type'          => 'dropdown',
                    'description'   => esc_html__( 'Choose style to display.', 'fattoria' ),
                    'param_name'    => 'item_style',
                    'value'         => s7upf_get_product_style(),
                ),
                array(
                    'heading'     => esc_html__( 'Gap products', 'fattoria' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'gap',
                    'value' => array(                   
                        esc_html__('Default','fattoria')  => '',
                        esc_html__('0px','fattoria')   => 'gap-0',
                        esc_html__('5px','fattoria')   => 'gap-5',
                        esc_html__('10px','fattoria')  => 'gap-10',
                        esc_html__('15px','fattoria')  => 'gap-15',
                        esc_html__('20px','fattoria')  => 'gap-20',
                        esc_html__('30px','fattoria')  => 'gap-30',
                        esc_html__('40px','fattoria')  => 'gap-40',
                        esc_html__('50px','fattoria')  => 'gap-50',
                    ),
                    'description' => esc_html__( 'Select space for products.', 'fattoria' ),
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
                        "element"       => "style",
                        "value"         => "grid",
                    ),
                ),  
                array(
                    'heading'     => esc_html__( 'Column', 'fattoria' ),
                    'type'        => 'dropdown',
                    'param_name'  => 'column',
                    'value' => array(                   
                        esc_html__('1 columns','fattoria')  => '1',
                        esc_html__('2 columns','fattoria')  => '2',
                        esc_html__('3 columns','fattoria')  => '3',
                        esc_html__('4 columns','fattoria')  => '4',
                        esc_html__('5 columns','fattoria')  => '5',
                        esc_html__('6 columns','fattoria')  => '6',
                        esc_html__('7 columns','fattoria')  => '7',
                        esc_html__('8 columns','fattoria')  => '8',
                        esc_html__('9 columns','fattoria')  => '9',
                        esc_html__('10 columns','fattoria')  => '10',
                    ),
                    'description' => esc_html__( 'Select Column display ', 'fattoria' ),
                    "group"         => esc_html__("Grid Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "style",
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
                        "element"       => "style",
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
                    'heading'       => esc_html__( 'Thumbnail animation', 'fattoria' ),
                    'type'          => 'dropdown',
                    'description'   => esc_html__( 'Choose style to display.', 'fattoria' ),
                    'param_name'    => 'animation',
                    'value'         => s7upf_get_product_thumb_animation(),
                ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Item",'fattoria'),
                    "param_name"    => "item",
                    "group"         => esc_html__("Slider Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "style",
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
                        "element"       => "style",
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
                        "element"       => "style",
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
                        "element"       => "style",
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
                            "element"       => "style",
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
                            "element"       => "style",
                            "value"         => "slider",
                        ), 
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__( 'Show filter', 'fattoria' ),
                    'param_name'  => 'filter_show',
                    'value'       => array(
                        esc_html__( 'No', 'fattoria' )          => '',
                        esc_html__( 'Yes', 'fattoria' )         => 'yes',
                    ),
                    "group"         => esc_html__("Filter Settings",'fattoria'),
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__( 'Filter position', 'fattoria' ),
                    'param_name'  => 'filter_pos',
                    'value'       => array(
                        esc_html__( 'Left', 'fattoria' )          => '',
                        esc_html__( 'Right', 'fattoria' )         => 'pull-right',
                        esc_html__( 'Center', 'fattoria' )        => 'text-center',
                    ),
                    "group"         => esc_html__("Filter Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "filter_show",
                        "value"         => "yes",
                    ), 
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__( 'Filter style', 'fattoria' ),
                    'param_name'  => 'filter_style',
                    'value'       => array(
                        esc_html__( 'Style 1( Horizontal )', 'fattoria' )         => '',
                        esc_html__( 'Style 2( Column list inline )', 'fattoria' )          => 'filter-col',
                        esc_html__( 'Style 3( Column list )', 'fattoria' )          => 'filter-col filter-col-list',
                    ),
                    "group"         => esc_html__("Filter Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "filter_show",
                        "value"         => "yes",
                    ),
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__( 'Filter column', 'fattoria' ),
                    'param_name'  => 'filter_column',
                    'value'       => array(
                        esc_html__( '2 Column', 'fattoria' )         => 'filter-2-col',
                        esc_html__( '3 Column', 'fattoria' )         => 'filter-3-col',
                        esc_html__( '4 Column', 'fattoria' )         => 'filter-4-col',
                    ),
                    "group"         => esc_html__("Filter Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "filter_style",
                        "value"         => array("filter-col","filter-col filter-col-list"),
                    ),
                ),
                array(
                    'heading'       => esc_html__( 'Filter Categories', 'fattoria' ),
                    'type'          => 'autocomplete',
                    'param_name'    => 'filter_cats',
                    'settings'      => array(
                        'multiple'      => true,
                        'sortable'      => true,
                        'values'        => s7upf_get_list_taxonomy(),
                    ),
                    'save_always'   => true,
                    'description'   => esc_html__( 'List of product categories', 'fattoria' ),
                    "group"         => esc_html__("Filter Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "filter_show",
                        "value"         => "yes",
                    ), 
                ),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__( 'Filter price', 'fattoria' ),
                    'param_name'  => 'filter_price',
                    'value'       => array(
                        esc_html__( 'Yes', 'fattoria' )         => 'yes',
                        esc_html__( 'No', 'fattoria' )          => '',
                    ),
                    "group"         => esc_html__("Filter Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "filter_show",
                        "value"         => "yes",
                    ),
                ),
                array(
                    "type"          => "checkbox",
                    "heading"       => esc_html__( "Filter attribute", 'fattoria' ),
                    "param_name"    => "filter_attr",
                    "value"         => s7upf_get_list_attribute(),
                    "description"   => esc_html__( "Check list attribute to filter", 'fattoria' ),
                    "group"         => esc_html__("Filter Settings",'fattoria'),
                    "dependency"    =>  array(
                        "element"       => "filter_show",
                        "value"         => "yes",
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
}