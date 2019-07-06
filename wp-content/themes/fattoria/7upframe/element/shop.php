<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:00 AM
 */
if(class_exists("woocommerce")){
if(!function_exists('s7upf_vc_shop')){
    function s7upf_vc_shop($attr){
        $html = $css_class = '';
        $order_default = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        if($order_default == 'menu_order') $order_default = $order_default.' title';
        $data_array = array_merge(array(
            'style'         => 'grid',
            'number'        => '12',
            'cats'          => '',
            'orderby'       => $order_default,
            'column'        => '2',
            'size'          => '',
            'size_list'     => '',
            'item_style'    => '',
            'item_style_list' => '',
            'grid_type'     => '',
            'shop_style'    => '',
            'check_type'    => 'on',
            'check_number'  => 'on',
            'el_class'      => '',
            'custom_css'    => '',
            'animation'     => '',
            'gap'           => '',
            'shop_ajax'     => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;

        $el_class .= ' product-'.$style.'-view '.$grid_type.' '.$gap;
        if(isset($_GET['orderby'])) $orderby = $_GET['orderby'];
        if(isset($_GET['type'])) $style = $_GET['type'];
        if(isset($_GET['number'])) $number = $_GET['number'];
        $size = s7upf_get_size_crop($size);
        $size_list = s7upf_get_size_crop($size_list);
        $attr = array_merge($attr,array(
            'style'     => $style,
            'size'      => $size,
            'size_list' => $size_list,
            'number'    => $number,
            ));
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type'         => 'product',
            'order'             => 'ASC',
            'posts_per_page'    => $number,
            'paged'             => $paged,
            );
        $attr_taxquery = array();
        $_chosen_attributes = WC_Query::get_layered_nav_chosen_attributes();
        if(!empty($_chosen_attributes) && is_array($_chosen_attributes)){
            $attr_taxquery = array('relation ' => 'AND');
            foreach ($_chosen_attributes as $key => $value) {
                $attr_taxquery[] =  array(
                                    'taxonomy'      => $key,
                                    'terms'         => $value['terms'],
                                    'field'         => 'slug',
                                    'operator'      => 'IN'
                                );
            }            
        }
        if(isset( $_GET['product_cat'])) $cats = $_GET['product_cat'];
        if(!empty($cats)) {
            $cats = explode(",",$cats);
            $attr_taxquery[]=array(
                'taxonomy'=>'product_cat',
                'field'=>'slug',
                'terms'=> $cats
            );
        }
        if (!empty($attr_taxquery)){
            $attr_taxquery['relation'] = 'AND';
            $args['tax_query'] = $attr_taxquery;
        }
        if( isset( $_GET['min_price']) && isset( $_GET['max_price']) ){
            $min = $_GET['min_price'];
            $max = $_GET['max_price'];
            $args['post__in'] = s7upf_filter_price($min,$max);
        }
        switch ($orderby) {
            case 'price' :
                $args['orderby']  = "meta_value_num ID";
                $args['order']    = 'ASC';
                $args['meta_key'] = '_price';
            break;

            case 'price-desc' :
                $args['orderby']  = "meta_value_num ID";
                $args['order']    = 'DESC';
                $args['meta_key'] = '_price';
            break;

            case 'popularity' :
                $args['meta_key'] = 'total_sales';                        
                $args['order']    = 'DESC';
            break;

            case 'rating' :
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby'] = 'meta_value_num';
                $args['order']    = 'DESC';
            break;

            case 'date':
                $args['orderby'] = 'date';
                $args['order']    = 'DESC';
                break;
            
            default:
                $args['orderby'] = $order_default;
                break;
        }
        $html .= s7upf_get_template('top-filter','',array('style'=>$style,'number'=>$number,'check_number'=>$check_number,'check_type'=>$check_type,'check_order'=>true),false);
        $attr_ajax = array(
                'item_style'    => $item_style,
                'item_style_list'=> $item_style_list,
                'column'        => $column,
                'size'          => $size,
                'size_list'     => $size_list,
                'shop_style'    => $shop_style,
                'number'        => $number,
                'animation'     => $animation,
                'cats'          => $cats,
                );
            $data_ajax = array(
                "attr"        => $attr_ajax,
                );
            $data_ajax = json_encode($data_ajax);
        $html .=    '<div class="'.esc_attr($el_class).' products-wrap js-content-wrap content-wrap-shop" data-load="'.esc_attr($data_ajax).'">
                        <div class="products row list-product-wrap js-content-main">';
        $product_query = new WP_Query($args);
        $max_page = $product_query->max_num_pages;
        $slug = $item_style;
        if($style == 'list') $slug = $item_style_list;
        if($product_query->have_posts()) {
            while($product_query->have_posts()) {
                $product_query->the_post();
                $html .= s7upf_get_template_woocommerce('loop/'.$style.'/'.$style,$slug,$attr,false);
            }
        }
        $html .=    '</div>';
        if($shop_style == 'load-more' && $max_page > 1){
            $data_load = array(
                "args"        => $args,
                "attr"        => $attr,
                );
            $data_loadjs = json_encode($data_load);
            $html .=    '<div class="btn-loadmore">
                            <a href="#" class="product-loadmore loadmore shop-button color2" 
                                data-load="'.esc_attr($data_loadjs).'" data-paged="1" 
                                data-maxpage="'.esc_attr($max_page).'">
                                '.esc_html__("Load more","fattoria").'
                            </a>
                        </div>';
        }
        else $html .= s7upf_get_template_woocommerce('loop/pagination','',array('wp_query'=>$product_query),false);
        $html .=    '</div>';        
        wp_reset_postdata();
        return $html;
    }
}

stp_reg_shortcode('s7upf_shop','s7upf_vc_shop');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_admin_shop',10,100 );
if ( ! function_exists( 's7upf_admin_shop' ) ) {
    function s7upf_admin_shop(){
        $order_default = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        if($order_default == 'menu_order') $order_default = $order_default.' title';
        vc_map( array(
            "name"      => esc_html__("Shop", 'fattoria'),
            "base"      => "s7upf_shop",
            "icon"      => "icon-st",
            "category"      => esc_html__("7UP-Elements", 'fattoria'),
            "description"   => esc_html__( 'Display shop page', 'fattoria' ),
            "params"    => array(
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Active Style",'fattoria'),
                    "param_name"    => "style",
                    "value"         => array(
                        esc_html__("Grid",'fattoria')   => 'grid',
                        esc_html__("List",'fattoria')   => 'list',
                        ),
                    ),
                array(
                    "type"          => "dropdown",
                    "admin_label"   => true,
                    "heading"       => esc_html__("Shop ajax",'fattoria'),
                    "param_name"    => "shop_ajax",
                    "value"         => array(
                        esc_html__("Off",'fattoria')   => '',
                        esc_html__("On",'fattoria')   => 'on',
                        ),
                    ),
                array(
                    'heading'     => esc_html__( 'Number', 'fattoria' ),
                    'type'        => 'textfield',
                    'description' => esc_html__( 'Enter number of product. Default is 12.', 'fattoria' ),
                    'param_name'  => 'number',
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
                    "type" => "dropdown",
                    "heading" => esc_html__("Order By",'fattoria'),
                    "param_name" => "orderby",
                    "value"         => array(
                        esc_html__( 'Default sorting', 'fattoria' )          => $order_default,
                        esc_html__( 'Popularity (sales)', 'fattoria' )       => 'popularity',
                        esc_html__( 'Average Rating', 'fattoria' )           => 'rating',
                        esc_html__( 'Sort by most recent', 'fattoria' )      =>'date',
                        esc_html__( 'Sort by price (asc)', 'fattoria' )      => 'price',
                        esc_html__( 'Sort by price (desc)', 'fattoria' )     =>'price-desc',
                        ),
                    ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Size Thumbnail(List)",'fattoria'),
                    "param_name"    => "size_list",
                    'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fattoria' ),
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
                    'heading'       => esc_html__( 'Thumbnail animation', 'fattoria' ),
                    'type'          => 'dropdown',
                    'description'   => esc_html__( 'Choose style to display.', 'fattoria' ),
                    'param_name'    => 'animation',
                    'value'         => s7upf_get_product_thumb_animation(),
                    ),
                array(
                    'heading'       => esc_html__( 'List item style', 'fattoria' ),
                    'type'          => 'dropdown',
                    'description'   => esc_html__( 'Choose style to display.', 'fattoria' ),
                    'param_name'    => 'item_style_list',
                    'value'         => s7upf_get_product_list_style(),
                    ),
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Show type filter",'fattoria'),
                    "param_name"    => "check_type",
                    "value"         => array(
                        esc_html__("On",'fattoria')   => 'on',
                        esc_html__("Off",'fattoria')   => 'off',
                        ),
                    'description'   => esc_html__( 'Show/hide type filter(list/grid) on blog page.', 'fattoria' ),
                    ),
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Show number filter",'fattoria'),
                    "param_name"    => "check_number",
                    "value"         => array(
                        esc_html__("On",'fattoria')   => 'on',
                        esc_html__("Off",'fattoria')   => 'off',
                        ),
                    'description'   => esc_html__( 'Show/hide number filter on blog page.', 'fattoria' ),
                    ),
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Shop Display",'fattoria'),
                    "param_name"    => "shop_style",
                    "value"         => array(
                        esc_html__("Default",'fattoria')             => '',
                        esc_html__("Load more button",'fattoria')    => 'load-more',
                        ),
                    ),        
                array(
                    "type"          => "dropdown",
                    "heading"       => esc_html__("Grid Display",'fattoria'),
                    "param_name"    => "grid_type",
                    "value"         => array(
                        esc_html__("Default",'fattoria')   => '',
                        esc_html__("Masonry",'fattoria')   => 'list-masonry',
                        ),
                    'group'         => esc_html__('Grid Settings','fattoria'),
                    ),
                array(
                    "type"          => "textfield",
                    "heading"       => esc_html__("Size Thumbnail(Grid)",'fattoria'),
                    "param_name"    => "size",
                    'group'         => esc_html__('Grid Settings','fattoria'),
                    'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height), for multi size: 200x100|200x200 separate by "|" or ",").', 'fattoria' ),
                    ),
                array(
                    'heading'       => esc_html__( 'Grid item style', 'fattoria' ),
                    'type'          => 'dropdown',
                    'description'   => esc_html__( 'Choose style to display.', 'fattoria' ),
                    'param_name'    => 'item_style',
                    'value'         => s7upf_get_product_style(),            
                    'group'         => esc_html__('Grid Settings','fattoria'),
                    ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Column",'fattoria'),
                    "param_name" => "column",
                    "value"         => array(
                        esc_html__("2 Column","fattoria")  => '2',
                        esc_html__("3 Column","fattoria")  => '3',
                        esc_html__("4 Column","fattoria")  => '4',
                        esc_html__("5 Column","fattoria")  => '5',
                        esc_html__("6 Column","fattoria")  => '6',
                        esc_html__("7 Column","fattoria")  => '7',
                        esc_html__("8 Column","fattoria")  => '8',
                        esc_html__("9 Column","fattoria")  => '9',
                        esc_html__("10 Column","fattoria") => '10',
                        ),
                    'group'         => esc_html__('Grid Settings','fattoria'),
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
                ),        
        ));
    }
}
}
