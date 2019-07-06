<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
 
/******************************************Core Function******************************************/

//Get option
if(!function_exists('s7upf_get_option')){
	function s7upf_get_option($key,$default=NULL){
        if(function_exists('ot_get_option')){
            $value = ot_get_option($key,$default);
            if(empty($value) && $default !== NULL) $value = $default;
            return $value;
        }
        return $default;
    }
}
//Get list post type
if(!function_exists('s7upf_list_post_type')){
    function s7upf_list_post_type($post_type = 'page',$type = true){
        global $post;
        $post_temp = $post;
        $page_list = array();
        if($type){
            $page_list[] = array(
                'value' => '',
                'label' => esc_html__('-- Choose One --','fattoria')
            );
        }
        else $page_list[] = esc_html__('-- Choose One --','fattoria');
        if(is_admin()){
            $pages = get_posts( array( 'post_type' => $post_type, 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    if($type){
                        $page_list[] = array(
                            'value' => $page->ID,
                            'label' => $page->post_title,
                        );
                    }
                    else $page_list[$page->ID] = $page->post_title;
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}

//Get list sidebar
if(!function_exists('s7upf_get_sidebar_ids')){
    function s7upf_get_sidebar_ids($for_option=false){
        global $wp_registered_sidebars;
        $r=array();
        $r[]=esc_html__('--Select--','fattoria');
        if(!empty($wp_registered_sidebars)){
            foreach($wp_registered_sidebars as $key=>$value)
            {

                if($for_option){
                    $r[]=array(
                        'value'=>$value['id'],
                        'label'=>$value['name']
                    );
                }else{
                    $r[$value['id']]=$value['name'];
                }
            }
        }
        return $r;
    }
}

//Get order list
if(!function_exists('s7upf_get_order_list')){
    function s7upf_get_order_list($current=false,$extra=array(),$return='array'){
        $default = array(
            esc_html__('None','fattoria')               => 'none',
            esc_html__('ID','fattoria')                 => 'ID',
            esc_html__('Author','fattoria')             => 'author',
            esc_html__('Title','fattoria')              => 'title',
            esc_html__('Name','fattoria')               => 'name',
            esc_html__('Date','fattoria')               => 'date',
            esc_html__('Last Modified Date','fattoria') => 'modified',
            esc_html__('Post Parent','fattoria')        => 'parent',
        );

        if(!empty($extra) and is_array($extra))
        {
            $default=array_merge($default,$extra);
        }

        if($return=="array")
        {
            return $default;
        }elseif($return=='option')
        {
            $html='';
            if(!empty($default)){
                foreach($default as $key=>$value){
                    $selected=selected($key,$current,false);
                    $html.="<option {$selected} value='{$value}'>{$key}</option>";
                }
            }
            return $html;
        }
    }
}

// Get sidebar
if(!function_exists('s7upf_get_sidebar')){
    function s7upf_get_sidebar(){
        $default=array(
            'position'=>'right',
            'id'      =>'blog-sidebar'
        );
        if(class_exists("woocommerce") && s7upf_is_woocommerce_page()) $default['id'] = 'woocommerce-sidebar';
        return apply_filters('s7upf_get_sidebar',$default);
    }
}
// Check sidebar
if(!function_exists('s7upf_check_sidebar')){
    function s7upf_check_sidebar(){
        $sidebar = s7upf_get_sidebar();
        if($sidebar['position'] == 'no') return false;
        else return true;
    }
}

//Fill css background
if(!function_exists('s7upf_fill_css_background')){
    function s7upf_fill_css_background($data){
        $string = '';
        if(!empty($data['background-color'])) $string .= 'background-color:'.$data['background-color'].';';
        if(!empty($data['background-repeat'])) $string .= 'background-repeat:'.$data['background-repeat'].';';
        if(!empty($data['background-attachment'])) $string .= 'background-attachment:'.$data['background-attachment'].';';
        if(!empty($data['background-position'])) $string .= 'background-position:'.$data['background-position'].';';
        if(!empty($data['background-size'])) $string .= 'background-size:'.$data['background-size'].';';
        if(!empty($data['background-image'])) $string .= 'background-image:url("'.$data['background-image'].'");';
        if(!empty($string)) return S7upf_Assets::build_css($string);
        else return false;
    }
}
if(!function_exists('s7upf_fill_css_typography')){
    function s7upf_fill_css_typography($data,$important = ''){
        $style = '';
        if(!empty($data['font-color'])) $style .= 'color:'.$data['font-color'].$important.';';
        if(!empty($data['font-family'])) $style .= 'font-family:'.$data['font-family'].$important.';';
        if(!empty($data['font-size'])) $style .= 'font-size:'.$data['font-size'].$important.';';
        if(!empty($data['font-style'])) $style .= 'font-style:'.$data['font-style'].$important.';';
        if(!empty($data['font-variant'])) $style .= 'font-variant:'.$data['font-variant'].$important.';';
        if(!empty($data['font-weight'])) $style .= 'font-weight:'.$data['font-weight'].$important.';';
        if(!empty($data['letter-spacing'])) $style .= 'letter-spacing:'.$data['letter-spacing'].$important.';';
        if(!empty($data['line-height'])) $style .= 'line-height:'.$data['line-height'].$important.';';
        if(!empty($data['text-decoration'])) $style .= 'text-decoration:'.$data['text-decoration'].$important.';';
        if(!empty($data['text-transform'])) $style .= 'text-transform:'.$data['text-transform'].$important.';';
        return $style;
    }
}

// Get list menu
if(!function_exists('s7upf_list_menu_name')){
    function s7upf_list_menu_name(){
        $menu_nav = wp_get_nav_menus();
        $menu_list = array('Default' => '');
        if(is_array($menu_nav) && !empty($menu_nav)){
            foreach($menu_nav as $item){ 
                if(is_object($item)){
                    $menu_list[$item->name] = $item->slug;
                }
            }
        }
        return $menu_list;
    }
}

if(!function_exists('s7upf_breadcrumb')){
    function s7upf_breadcrumb($step = '') {
        global $post;
        if(is_home() && !is_front_page()) echo '<a href="'.esc_url(home_url('/')).'">'.esc_html__('Home','fattoria').'</a>'.$step.'<span>'.esc_html__('Blog','fattoria').'</span>';
        else echo '<a href="'.esc_url(home_url('/')).'">'.esc_html__('Home','fattoria').'</a>';
        if (is_single()){
            echo apply_filters('s7upf_output_content',$step);
            echo get_the_category_list($step);
            echo apply_filters('s7upf_output_content',$step).'<span>'.get_the_title().'</span>';
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( get_the_ID() );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = $step.'<a href="'.esc_url(get_permalink($ancestor)).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a>';
                }
                echo apply_filters('s7upf_output_content',$output);
                echo apply_filters('s7upf_output_content',$step) . '<span>'.$title.'</span>';
            } else {
                echo apply_filters('s7upf_output_content',$step) . '<span>'.get_the_title().'</span>';
            }
        }
        elseif(is_archive()) echo apply_filters('s7upf_output_content',$step) . "<span>".get_the_archive_title()."</span>";
        elseif(is_search()) echo apply_filters('s7upf_output_content',$step) . "<span>".esc_html__("Search Results for: ","fattoria").get_search_query().'</span>';
        elseif(is_404()) echo apply_filters('s7upf_output_content',$step) . "<span>".esc_html__("404 ","fattoria")."</span>";
    }
}
//Don't Show popup
if(!is_admin() && session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['dont_show_popup'])) $_SESSION['dont_show_popup'] = false;
add_action( 'wp_ajax_set_dont_show', 's7upf_set_dont_show' );
add_action( 'wp_ajax_nopriv_set_dont_show', 's7upf_set_dont_show' );
if(!function_exists('sv_set_dont_show')){
    function s7upf_set_dont_show() {
        $checked = $_POST['checked'];
        if($checked){
            session_start();  
            $_SESSION['dont_show_popup'] = $checked;
        }
        else{
            unset($_SESSION['dont_show_popup']); 
            session_destroy();
        }
    }
}
//Get current ID
if(!function_exists('s7upf_get_current_id')){   
    function s7upf_get_current_id(){
        $id = get_the_ID();
        if(is_front_page() && is_home()) $id = (int)get_option( 'page_on_front' );
        if(!is_front_page() && is_home()) $id = (int)get_option( 'page_for_posts' );
        if(is_archive() || is_search()) $id = 0;
        if (class_exists('woocommerce')) {
            if(is_shop()) $id = (int)get_option('woocommerce_shop_page_id');
            if(is_cart()) $id = (int)get_option('woocommerce_cart_page_id');
            if(is_checkout()) $id = (int)get_option('woocommerce_checkout_page_id');
            if(is_account_page()) $id = (int)get_option('woocommerce_myaccount_page_id');
        }
        return $id;
    }
}
//Get page value by ID
if(!function_exists('s7upf_get_value_by_id')){   
    function s7upf_get_value_by_id($key,$meta_empty = false){
        if(!empty($key)){
            $id = s7upf_get_current_id();
            $value = get_post_meta($id,$key,true);
            if(empty($value) && !$meta_empty) $value = s7upf_get_option($key);
            $session_page = s7upf_get_option('session_page');
            if($session_page == 'on'){
                if($key == 's7upf_header_page' || $key == 's7upf_footer_page' || $key == 'main_color' || $key == 'main_color2'){
                    $val_meta = get_post_meta($id,$key,true);
                    if(!empty($val_meta)) $_SESSION[$key] = $val_meta;
                    if(isset($_SESSION[$key])) $session_val = $_SESSION[$key];
                    else $session_val = '';
                    if(!empty($session_val)) $value = $session_val;
                }
            }
            return $value;
        }
        else return 'Missing a variable of this funtion';
    }
}
//Check woocommerce page
if (!function_exists('s7upf_is_woocommerce_page')){
    function s7upf_is_woocommerce_page() {
        if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
                return true;
        }
        $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                        "woocommerce_terms_page_id" ,
                                        "woocommerce_cart_page_id" ,
                                        "woocommerce_checkout_page_id" ,
                                        "woocommerce_pay_page_id" ,
                                        "woocommerce_thanks_page_id" ,
                                        "woocommerce_myaccount_page_id" ,
                                        "woocommerce_edit_address_page_id" ,
                                        "woocommerce_view_order_page_id" ,
                                        "woocommerce_change_password_page_id" ,
                                        "woocommerce_logout_page_id" ,
                                        "woocommerce_lost_password_page_id" ) ;
        foreach ( $woocommerce_keys as $wc_page_id ) {
                if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                        return true ;
                }
        }
        return false;
    }
}

//navigation
if(!function_exists('s7upf_paging_nav')){
    function s7upf_paging_nav($query = false,$style = '',$echo = true){
        if($query){
            $big = 999999999;
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $links = array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'       => '&page=%#%',
                    'current'      => max( 1, $paged ),
                    'total'        => $query->max_num_pages,
                    'end_size'     => 2,
                    'mid_size'     => 1
                );
        }
        else{
            if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
                return;
            }

            $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
            $pagenum_link = html_entity_decode( get_pagenum_link() );
            $query_args   = array();
            $url_parts    = explode( '?', $pagenum_link );

            if ( isset( $url_parts[1] ) ) {
                wp_parse_str( $url_parts[1], $query_args );
            }

            $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
            $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

            $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
            $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

            // Set up paginated links.
            $links = array(
                'base'          => $pagenum_link,
                'format'        => $format,
                'total'         => $GLOBALS['wp_query']->max_num_pages,
                'current'       => $paged,
                'end_size'      => 2,
                'mid_size'      => 1,
                'add_args'      => array_map( 'urlencode', $query_args ),
            );
        }
        $data = array(
            'links' => $links,
            'style' => $style,
        );
        $html = s7upf_get_template( 'paging-nav', false, $data, $echo );
        if(!$echo) return $html;
    }
}

//Set post view
if(!function_exists('s7upf_set_post_view')){
    function s7upf_set_post_view($post_id=false){
        if(!$post_id) $post_id=get_the_ID();
        $view=(int)get_post_meta($post_id,'post_views',true);
        $view++;
        update_post_meta($post_id,'post_views',$view);
    }
}

if(!function_exists('s7upf_get_post_view')){
    function s7upf_get_post_view($post_id=false){
        if(!$post_id) $post_id=get_the_ID();
        return (int)get_post_meta($post_id,'post_views',true);
    }
}

//remove attr embed
if(!function_exists('s7upf_remove_w3c')){
    function s7upf_remove_w3c($embed_code){
        $embed_code=str_replace('webkitallowfullscreen','',$embed_code);
        $embed_code=str_replace('mozallowfullscreen','',$embed_code);
        $embed_code=str_replace('frameborder="0"','',$embed_code);
        $embed_code=str_replace('frameborder="no"','',$embed_code);
        $embed_code=str_replace('scrolling="no"','',$embed_code);
        $embed_code=str_replace('&','&amp;',$embed_code);
        return $embed_code;
    }
}

// MetaBox
if(!function_exists('s7upf_display_metabox')){
    function s7upf_display_metabox($type =''){
        switch ($type) {
            case 'blog':
                break;

            default:
                ?>
                <ul class="list-inline-block post-meta-data">
                    <li><i class="la la-user gray" aria-hidden="true"></i><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></li>
                    <li><i class="la la-calendar gray"></i><span class="silver"><?php echo get_the_date()?></span></li>
                    <li><i aria-hidden="true" class="la la-comments-o"></i>
                        <a href="<?php echo esc_url( get_comments_link() ); ?>"><?php echo get_comments_number(); ?> 
                        <?php 
                            if(get_comments_number() != 1) esc_html_e('Comments', 'fattoria') ;
                            else esc_html_e('Comment', 'fattoria') ;
                        ?>
                        </a>
                    </li>
                    <?php 
                        $cats = get_the_category_list(' ');
                        if($cats):?>
                        <li><i class="la la-folder-open gray" aria-hidden="true"></i>                            
                            <?php echo apply_filters('s7upf_output_content',$cats);?>
                        </li>
                    <?php endif;?>
                    <?php 
                        $tags = get_the_tag_list(' ',' ',' ');
                        if($tags):?>
                        <li><i class="la la-tag" aria-hidden="true"></i>
                            <?php $tags = get_the_tag_list(' ',' ',' ');?>
                            <?php if($tags) echo apply_filters('s7upf_output_content',$tags); else esc_html_e("No Tag",'fattoria');?>
                        </li>
                    <?php endif;?>
                </ul>               
                <?php
                break;
        }
    }
}
if(!function_exists('s7upf_get_main_class')){
    function s7upf_get_main_class(){
        $sidebar=s7upf_get_sidebar();
        $sidebar_pos=$sidebar['position'];
        $main_class = 'content-wrap col-md-12 col-sm-12 col-xs-12';
        if($sidebar_pos != 'no' && is_active_sidebar( $sidebar['id'])) $main_class = 'content-wrap content-sidebar-'.$sidebar_pos.' col-md-9 col-sm-8 col-xs-12';
        return apply_filters('s7upf_main_class',$main_class);
    }
}
if(!function_exists('s7upf_output_sidebar')){
    function s7upf_output_sidebar($position){
        $sidebar = s7upf_get_sidebar();
        $sidebar_pos = $sidebar['position'];
        if($sidebar_pos == $position) get_sidebar();
    }
}
if(!function_exists('s7upf_get_import_category')){
    function s7upf_get_import_category($taxonomy='product_cat'){
        $cats = get_terms($taxonomy);
        $data_json = '{';
        foreach ($cats as $key => $term) {
            $thumb_cat_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
            $term_pa = get_term_by( 'id',$term->parent, $taxonomy );
            if(isset($term_pa->slug)) $slug_pa = $term_pa->slug;
            else $slug_pa = '';
            if($key > 0) $data_json .= ',';
            $data_json .= '"'.$term->slug.'":{"thumbnail":"'.$thumb_cat_id.'","parent":"'.$slug_pa.'"}';
        }
        $data_json .= '}';
        echo apply_filters('s7upf_output_content',$data_json);
    }
}
if(!function_exists('s7upf_fix_import_category')){
    function s7upf_fix_import_category($taxonomy){
        global $s7upf_config;
        $data = $s7upf_config['import_category'];
        if(!empty($data)){
            $data = json_decode($data,true);
            if(is_array($data)){
                foreach ($data as $cat => $value) {
                    $parent_id = 0;
                    $term = get_term_by( 'slug',$cat, $taxonomy );
                    if(isset($term->term_id)){
                        $term_parent = get_term_by( 'slug', $value['parent'], $taxonomy );
                        if(isset($term_parent->term_id)) $parent_id = $term_parent->term_id;
                        if($parent_id) wp_update_term( $term->term_id, $taxonomy, array('parent'=> $parent_id) );
                        if($value['thumbnail']){
                            if($taxonomy == 'product_cat')  update_woocommerce_term_meta( $term->term_id, 'thumbnail_id', $value['thumbnail']);
                            else{
                                update_term_meta( $term->term_id, 'thumbnail_id', $value['thumbnail']);
                            }
                        }
                    }
                }
            }
        }
    }
}
if ( ! function_exists( 's7upf_get_google_link' ) ) {
    function s7upf_get_google_link() {
        $font_url = '';
        $fonts  = array(
                    'Poppins:300,400,600,700',
					'Lemonada:regular,600,700',
					'Fira Sans Extra Condensed:regular,600,700'
                );
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'fattoria' ) ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), "//fonts.googleapis.com/css" );
        }

        return $fonts_url;
    }
}
// get list taxonomy
if(!function_exists('s7upf_list_taxonomy'))
{
    function s7upf_list_taxonomy($taxonomy,$show_all = true)
    {
        if($show_all) $list = array( esc_html__('--Select--','fattoria') => '' );
        else $list = array();
        if(!isset($taxonomy) || empty($taxonomy)) $taxonomy = 'category';
        $tags = get_terms($taxonomy);
        if(is_array($tags) && !empty($tags)){
            foreach ($tags as $tag) {
                $list[$tag->name] = $tag->slug;
            }
        }
        return $list;
    }
}
if(!function_exists('s7upf_check_enqueue')){
    function s7upf_check_enqueue($elements){
        global $post;
        $page_header = s7upf_get_value_by_id('s7upf_header_page');
        $page_header = get_post($page_header);
        $page_footer = s7upf_get_value_by_id('s7upf_footer_page');
        $page_footer = get_post($page_footer);
        $content = '';
        if(isset($page_header->post_content)) $content .= $page_header->post_content;
        if(isset($post->post_content)) $content .= $post->post_content;
        if(isset($page_footer->post_content)) $content .= $page_footer->post_content;
        $elements = explode(',', $elements);
        $check = false;
        foreach ($elements as $element) {
            if(!empty($element) && strpos($content, '['.$element)) $check = true;
        }
        return $check;
    }
}
if(!function_exists('s7upf_substr')){
    function s7upf_substr($string='',$start=0,$end=1){
        $output = '';
        if(!empty($string)){
            $string = strip_tags($string);
            if($end < strlen($string)){
                if($string[$end] != ' '){
                    for ($i=$end; $i < strlen($string) ; $i++) { 
                        if($string[$i] == ' ' || $string[$i] == '.' || $i == strlen($string)-1){
                            $end = $i;
                            break;
                        }
                    }
                }
            }
            $output = substr($string,$start,$end);
        }
        return $output;
    }
}
if(!function_exists('s7upf_get_template')){
    function s7upf_get_template( $view_name,$slug=false,$data=array(),$echo=FALSE ){
        $html = S7upf_Template::load_view($view_name,$slug,$data,$echo);
        if(!$echo) return $html;
    }
}
if(!function_exists('s7upf_get_template_post')){
    function s7upf_get_template_post( $view_name,$slug=false,$data=array(),$echo=FALSE ){
        $view_name = 'posts/'.$view_name;
        $html = S7upf_Template::load_view($view_name,$slug,$data,$echo);
        if(!$echo) return $html;
    }
}
if(!function_exists('s7upf_get_template_element')){
    function s7upf_get_template_element( $view_name,$slug=false,$data=array(),$echo=FALSE ){
        $view_name = 'elements/'.$view_name;
        $html = S7upf_Template::load_view($view_name,$slug,$data,$echo);
        if(!$echo) return $html;
    }
}
if(!function_exists('s7upf_get_template_product')){
    function s7upf_get_template_product( $view_name,$slug=false,$data=array(),$echo=FALSE ){
        $view_name = 'products/'.$view_name;
        $html = S7upf_Template::load_view($view_name,$slug,$data,$echo);
        if(!$echo) return $html;
    }
}
if(!function_exists('s7upf_get_template_woocommerce')){
    function s7upf_get_template_woocommerce( $view_name,$slug=false,$data=array(),$echo=FALSE ){
        $view_name = 'woocommerce/'.$view_name;
        $html = S7upf_Template::load_view($view_name,$slug,$data,$echo);
        if(!$echo) return $html;
    }
}
if(!function_exists('s7upf_get_template_widget')){
    function s7upf_get_template_widget( $view_name,$slug=false,$data=array(),$echo=FALSE ){
        $view_name = 'widgets/'.$view_name;
        $html = S7upf_Template::load_view($view_name,$slug,$data,$echo);
        if(!$echo) return $html;
    }
}
//get type url
if(!function_exists('s7upf_get_filter_url')){
    function s7upf_get_filter_url($key,$value){
        if(function_exists('s7upf_get_current_url')) $current_url = s7upf_get_current_url();
        else{
            if(function_exists('wc_get_page_id')) $current_url = get_permalink( wc_get_page_id( 'shop' ) );
            else $current_url = get_permalink();
        }
        $current_url = get_pagenum_link();
        if(isset($_GET[$key])){
            $current_val_string = $_GET[$key];
            if($current_val_string == $value){
                $current_url = str_replace('&'.$key.'='.$_GET[$key], '', $current_url);
                if(strpos($current_url,'&') > -1 )$current_url = str_replace('?'.$key.'='.$_GET[$key], '?', $current_url);
                else $current_url = str_replace('?'.$key.'='.$_GET[$key], '', $current_url);
            }
            if(strpos($current_val_string,',') > -1 ) $current_val_key = explode(',', $current_val_string);
            else $current_val_key = explode('%2C', $current_val_string);
            $val_encode = str_replace(',', '%2C', $current_val_string);
            if(!empty($current_val_string)){
                if(!in_array($value, $current_val_key)) $current_val_key[] = $value;
                else{
                    $pos = array_search($value, $current_val_key);
                    unset($current_val_key[$pos]);
                }            
                $new_val_string = implode('%2C', $current_val_key);
                $current_url = str_replace($key.'='.$val_encode, $key.'='.$new_val_string, $current_url);
                if (strpos($current_url, '?') == false) $current_url = str_replace('&','?',$current_url);
            }
            else $current_url = str_replace($key.'=', $key.'='.$value, $current_url);     
        }
        else{
            if(strpos($current_url,'?') > -1 ){
                $current_url .= '&amp;'.$key.'='.$value;
            }
            else {
                $current_url .= '?'.$key.'='.$value;
            }
        }
        return $current_url;
    }
}
//get type url
if(!function_exists('s7upf_get_key_url')){
    function s7upf_get_key_url($key,$value){
        if(function_exists('s7upf_get_current_url')) $current_url = s7upf_get_current_url();
        else{
            if(function_exists('wc_get_page_id')) $current_url = get_permalink( wc_get_page_id( 'shop' ) );
            else $current_url = get_permalink();
        }
        $current_url = get_pagenum_link();
        if(isset($_GET[$key])){
            $current_url = str_replace('&'.$key.'='.$_GET[$key], '', $current_url);
            if(strpos($current_url,'&') > -1 )$current_url = str_replace('?'.$key.'='.$_GET[$key], '?', $current_url);
            else $current_url = str_replace('?'.$key.'='.$_GET[$key], '', $current_url);
        }
        if(strpos($current_url,'?') > -1 ){
            $current_url .= '&amp;'.$key.'='.$value;
        }
        else {
            $current_url .= '?'.$key.'='.$value;
        }
        return $current_url;
    }
}
if(!function_exists('s7upf_get_post_style')){
    function s7upf_get_post_style($style = 'element'){
        $list = apply_filters('s7upf_post_item_style',array(
            esc_html__('Default','fattoria')      => '',
            esc_html__('Post grid 2','fattoria')      => 'style2',
            esc_html__('Post grid 3','fattoria')      => 'style3',
            esc_html__('Post grid 4','fattoria')      => 'style4',
            esc_html__('Post grid 5','fattoria')      => 'style5',
            esc_html__('Post grid 6','fattoria')      => 'style6',
            ));
        if($style != 'element'){
            $temp = array();
            foreach ($list as $key => $value) {
                $temp[] =   array(
                                'value' => $value,
                                'label' => $key,
                            );
            }
            $list = $temp;
        }
        return $list;
    }
}
if(!function_exists('s7upf_get_post_list_style')){
    function s7upf_get_post_list_style($style = 'element'){
        $list = apply_filters('s7upf_post_list_item_style',array(
            esc_html__('Default','fattoria')      => '',
            esc_html__('Post list 2','fattoria')      => 'style2',
            ));
        if($style != 'element'){
            $temp = array();
            foreach ($list as $key => $value) {
                $temp[] =   array(
                                'value' => $value,
                                'label' => $key,
                            );
            }
            $list = $temp;
        }
        return $list;
    }
}
if(!function_exists('s7upf_get_product_list_style')){
    function s7upf_get_product_list_style($style = 'element'){
        $list = apply_filters('s7upf_product_list_item_style',array(
            esc_html__('Default','fattoria')      => '',
            esc_html__('Product list 2','fattoria')      => 'style2',
            ));
        if($style != 'element'){
            $temp = array();
            foreach ($list as $key => $value) {
                $temp[] =   array(
                                'value' => $value,
                                'label' => $key,
                            );
            }
            $list = $temp;
        }
        return $list;
    }
}
if(!function_exists('s7upf_get_product_style')){
    function s7upf_get_product_style($style = 'element'){
        $list = apply_filters('s7upf_product_item_style',array(
            esc_html__('Default','fattoria')      => '',
            esc_html__('Product grid 2','fattoria')      => 'style2',
            esc_html__('Product grid 3','fattoria')      => 'style3',
            esc_html__('Product featured','fattoria')    => 'style4',
            esc_html__('Product Hot Deals','fattoria')   => 'style5',
            esc_html__('Product grid 4','fattoria')      => 'style6',
            esc_html__('Product Deals of the day','fattoria')      => 'style8',
            esc_html__('Product with label','fattoria')      => 'style9',
            esc_html__('Product with gallery','fattoria')      => 'style10',
            ));
        if($style != 'element'){
            $temp = array();
            foreach ($list as $key => $value) {
                $temp[] =   array(
                                'value' => $value,
                                'label' => $key,
                            );
            }
            $list = $temp;
        }
        return $list;
    }
}
if(!function_exists('s7upf_get_product_thumb_animation')){
    function s7upf_get_product_thumb_animation($style = 'element'){
        $list = apply_filters('s7upf_product_item_style',array(
            esc_html__('None','fattoria')        => '',
            esc_html__('Zoom','fattoria')        => 'zoom-thumb',
            esc_html__('Rotate','fattoria')      => 'rotate-thumb',
            esc_html__('Zoom Out','fattoria')    => 'zoomout-thumb',
            esc_html__('Translate','fattoria')   => 'translate-thumb',
            ));
        if($style != 'element'){
            $temp = array();
            foreach ($list as $key => $value) {
                $temp[] =   array(
                                'value' => $value,
                                'label' => $key,
                            );
            }
            $list = $temp;
        }
        return $list;
    }
}
//Share calculate
add_action( 'wp_ajax_update_share', 's7upf_update_share' );
add_action( 'wp_ajax_nopriv_update_share', 's7upf_update_share' );
if(!function_exists('s7upf_update_share')){
    function s7upf_update_share() {
        $social = $_POST['social'];
        $id = $_POST['id'];
        $number = (int)get_post_meta($id,'total_share_'.$social,true);
        $total = (int)get_post_meta($id,'total_share',true);
        $number++;
        $total++;
        update_post_meta($id,'total_share_'.$social,$number);
        update_post_meta($id,'total_share',$total);
        die();
    }
}
if(!function_exists('s7upf_filter_price')){
    function s7upf_filter_price($min,$max,$filtered_posts = array()){
        global $wpdb;
        $matched_products = array( 0 );
        $matched_products_query = apply_filters( 'woocommerce_price_filter_results', $wpdb->get_results( $wpdb->prepare("
            SELECT DISTINCT ID, post_parent, post_type FROM $wpdb->posts
            INNER JOIN $wpdb->postmeta ON ID = post_id
            WHERE post_type IN ( 'product', 'product_variation' ) AND post_status = 'publish' AND meta_key = %s AND meta_value BETWEEN %d AND %d
        ", '_price', $min, $max ), OBJECT_K ), $min, $max );

        if ( $matched_products_query ) {
            foreach ( $matched_products_query as $product ) {
                if ( $product->post_type == 'product' )
                    $matched_products[] = $product->ID;
                if ( $product->post_parent > 0 && ! in_array( $product->post_parent, $matched_products ) )
                    $matched_products[] = $product->post_parent;
            }
        }

        // Filter the id's
        if ( sizeof( $filtered_posts ) == 0) {
            $filtered_posts = $matched_products;
        } else {
            $filtered_posts = array_intersect( $filtered_posts, $matched_products );
        }
        return $filtered_posts;
    }
}
if(!function_exists('s7upf_size_random')){
    function s7upf_size_random($size){
        if(is_array($size) && count($size) > 2){
			foreach ($size as $key => $value) {
				$i = $key + 1;
				if($i % 2 == 1 && isset($size[$i])) $sizes[] = array($value,$size[$i]);
			}
            $k = array_rand($sizes);
            $size = $sizes[$k];
        }
        return $size;
    }
}
if(!function_exists('s7upf_get_list_taxonomy')){
    function s7upf_get_list_taxonomy($taxonomy = 'product_cat') {    
        $result = array();
        $tags = get_terms($taxonomy);
        if(is_array($tags) && !empty($tags)){
            foreach ($tags as $tag) {
                $list[$tag->name] = $tag->slug;
                $result[] = array(
                    'value' => $tag->slug,
                    'label' => $tag->name,
                );
            }
        }
        return $result;
    }
}
if(!function_exists('s7upf_get_attr_content')){
    function s7upf_get_attr_content($content,$default = array(),$list = array('vc_tta_section')) {

        $result = array();        
        $tab_info = array();
        foreach ($list as $shortcode) {            
            preg_match_all( '/'.$shortcode.'([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
            if(isset($matches[1])) $tab_info = array_merge($tab_info,$matches[1]);
        }
        $item_content = explode('[/vc_tta_section]', $content);
        if(is_array($tab_info) && !empty($tab_info)){
            foreach ($tab_info as $key => $value) {
                $string = $value[0];
                $string = str_replace('=" ', '="', $string);
                $data = explode('" ', $string);
                foreach ($data as $item) {
                    $item_data = explode('=', $item);
                    if(isset($item_data[0]) && isset($item_data[1])){
                        $item_key = trim(str_replace('"', '', $item_data[0]));
                        $item_val = trim(str_replace('"', '', $item_data[1]));
                        $result[$key][$item_key] = $item_val;
                        $result[$key]['tab_content'] = $item_content[$key];
                    }
                }
                $result[$key] = array_merge($default,$result[$key]);
            }
        }
        return $result;
    }
}
if(!function_exists('s7upf_add_attr_content')){
    function s7upf_add_attr_content($content,$attr = '',$list = array('vc_tta_section')) {
        foreach ($list as $shortcode) {

            $content = str_replace('['.$shortcode, '['.$shortcode.' '.$attr, $content);
        }
        return $content;
    }
}
//Get all page
if(!function_exists('s7upf_list_all_page')){
    function s7upf_list_all_page($complete = false){
        global $post;
        if(!$complete){
            $page_list = array(
                esc_html__('-- Choose One --','fattoria') => '',
                );
        }
        else $page_list = array();
        $pages = get_pages();
        foreach ($pages as $page) {
            if(!$complete) $page_list[$page->post_title] = $page->ID;
            else{
                $page_list[] = array(
                    'value' => $page->ID,
                    'label' => $page->post_title,
                );
            }
        }
        return $page_list;
    }
}
if(!function_exists('s7upf_get_sidebar_list')){
    function s7upf_get_sidebar_list(){
        global $wp_registered_sidebars;
        $sidebars = array(
            esc_html__('--Select--','fattoria') => ''
            );
        foreach( $wp_registered_sidebars as $id=>$sidebar ) {
          $sidebars[ $sidebar[ 'name' ] ] = $id;
        }
        return $sidebars;
    }
}
if(!function_exists('s7upf_preload')){
    function s7upf_preload(){
        $preload = s7upf_get_option('show_preload');
        if($preload == 'on'):
            $preload_style = s7upf_get_option('preload_style');
            $preload_bg = s7upf_get_option('preload_bg');
            $preload_img = s7upf_get_option('preload_img');
        ?>
        <div id="loading" class="preload-loading preload-style-<?php echo esc_attr($preload_style)?>">
            <div id="loading-center">
                <?php
                switch ($preload_style) {
                    case 'style2':
                        ?>
                        <div id="loading-center-absolute">
                            <div id="object<?php echo esc_attr($preload_style)?>"></div>
                        </div>
                        <?php
                        break;

                    case 'style3':
                        ?>
                        <div id="loading-center-absolute<?php echo esc_attr($preload_style)?>">
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_one<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_two<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_three<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_four<?php echo esc_attr($preload_style)?>"></div>
                        </div>
                        <?php
                        break;

                    case 'style4':
                        ?>
                        <div id="loading-center-absolute<?php echo esc_attr($preload_style)?>">
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_one<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_two<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_three<?php echo esc_attr($preload_style)?>"></div>
                        </div>
                        <?php
                        break;

                    case 'style5':
                        ?>
                        <div id="loading-center-absolute<?php echo esc_attr($preload_style)?>">
                            <div class="object<?php echo esc_attr($preload_style)?>" id="first_object<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="second_object<?php echo esc_attr($preload_style)?>"></div>
                        </div>
                        <?php
                        break;

                    case 'style6':
                        ?>
                        <div id="loading-center-absolute<?php echo esc_attr($preload_style)?>">
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_one<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_two<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_three<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_four<?php echo esc_attr($preload_style)?>"></div>
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_five<?php echo esc_attr($preload_style)?>"></div>
                        </div>
                        <?php
                        break;

                    case 'style7':
                        ?>
                        <div id="loading-center-absolute<?php echo esc_attr($preload_style)?>">
                            <div class="object<?php echo esc_attr($preload_style)?>" id="object_one<?php echo esc_attr($preload_style)?>"></div>
                        </div>
                        <?php
                        break;

                    case 'custom-image':
                        ?>
                        <div id="loading-center-absolute-image">
                            <img src="<?php echo esc_url($preload_img)?>" alt="<?php esc_attr_e("preload-image","fattoria");?>"/>
                        </div>
                        <?php
                        break;
                    
                    default:
                        ?>
                        <div id="loading-center-absolute">
                            <div class="object" id="object_four"></div>
                            <div class="object" id="object_three"></div>
                            <div class="object" id="object_two"></div>
                            <div class="object" id="object_one"></div>
                        </div>
                        <?php
                        break;
                }
                ?> 
            </div>
        </div>
        <?php endif;
    }
}
//Compare URL
if(!function_exists('s7upf_compare_url')){
    function s7upf_compare_url($icon='',$id = false,$text = '',$class='silver'){
        $html = '';
        if(empty($text)) $text = esc_html__("Compare","fattoria");
        if(empty($icon)) $icon = '<i aria-hidden="true" class="fa fa-refresh"></i>';
        if(class_exists('YITH_Woocompare')){
            if(!$id) $id = get_the_ID();
            $cp_link = str_replace('&', '&amp;',add_query_arg( array('action' => 'yith-woocompare-add-product','id' => $id )));
            $html = '<a href="'.esc_url($cp_link).'" class="product-compare compare compare-link '.esc_attr($class).'" data-product_id="'.get_the_ID().'">'.$icon.'<span>'.$text.'</span></a>';
        }
        return $html;
    }
}
if(!function_exists('s7upf_wishlist_url')){
    function s7upf_wishlist_url($icon='',$text='',$class='silver'){
        $html = '';
        if(empty($text)) $text = esc_html__("Wishlist","fattoria");
        if(empty($icon)) $icon = '<i class="fa fa-heart" aria-hidden="true"></i>';
        if(class_exists('YITH_WCWL_Init')) $html = '<a href="'.esc_url(str_replace('&', '&amp;',add_query_arg( 'add_to_wishlist', get_the_ID() ))).'" class="add_to_wishlist wishlist-link '.esc_attr($class).'" rel="nofollow" data-product-id="'.get_the_ID().'" data-product-title="'.esc_attr(get_the_title()).'">'.$icon.'<span>'.$text.'</span></a>';
        return $html;
    }
}
if(!function_exists('s7upf_default_icon_lib')){
    function s7upf_default_icon_lib(){
        $lib = s7upf_get_option('s7upf_icon_lib','fontawesome');
        return $lib;
    }
}
if(!function_exists('s7upf_get_size_crop')){
    function s7upf_get_size_crop($size='',$default=''){
        if(!empty($size) && strpos($size, 'x')){
            $size = str_replace('|', 'x', $size);
            $size = str_replace(',', 'x', $size);
            $size = explode('x', $size);
        }
        if(empty($size) && !empty($default)) $size = $default;
        return $size;
    }
}

if(!function_exists('s7upf_get_terms_filter')){
    function s7upf_get_terms_filter($taxonomy){
        $get_terms_args = array( 'hide_empty' => '1' );

        $orderby = wc_attribute_orderby( $taxonomy );

        switch ( $orderby ) {
            case 'name' :
                $get_terms_args['orderby']    = 'name';
                $get_terms_args['menu_order'] = false;
            break;
            case 'id' :
                $get_terms_args['orderby']    = 'id';
                $get_terms_args['order']      = 'ASC';
                $get_terms_args['menu_order'] = false;
            break;
            case 'menu_order' :
                $get_terms_args['menu_order'] = 'ASC';
            break;
        }

        $terms = get_terms( $taxonomy, $get_terms_args );

        if ( 0 === count( $terms ) ) {
            return;
        }

        switch ( $orderby ) {
            case 'name_num' :
                usort( $terms, '_wc_get_product_terms_name_num_usort_callback' );
            break;
            case 'parent' :
                usort( $terms, '_wc_get_product_terms_parent_usort_callback' );
            break;
        }
        return $terms;
    }
}
if(!function_exists('s7upf_get_list_attribute')){
    function s7upf_get_list_attribute() { 
        $result = array();
        $attributes = wc_get_attribute_taxonomies();
        if(!empty($attributes)){
            foreach ($attributes as $attribute) {
                $result[$attribute->attribute_label] = $attribute->attribute_name;
            }
        }
        return $result;
    }
}
//get roles wp
if(!function_exists('s7upf_get_list_role')){
    function s7upf_get_list_role(){ 
        global $wp_roles;
        $roles = array();
        if(isset($wp_roles->roles)){
            $roles_data = $wp_roles->roles;
            if(is_array($roles_data)){
                foreach ($roles_data as $key => $value) {
                    $roles[$value['name']] = $key;
                }
            }
        }
        return $roles;
    }
}
if(!function_exists('s7upf_is_vendor_page')){   
    function s7upf_is_vendor_page(){
        $check  = false;
        $array_page = array(
            'wcvendors_vendor_dashboard_page_id',
            'wcvendors_shop_settings_page_id',
            'wcvendors_product_orders_page_id',
            'wcvendors_vendors_page_id',
            'wcvendors_vendor_terms_page_id',
        );
        $page_ids = [];
        foreach ($array_page as $value) {
            $page_ids[] = (int)get_option($value);
        }
        $id = s7upf_get_current_id();
        if(in_array($id, $page_ids)) $check = true;
        return $check;
    }
}
if(!function_exists('s7upf_login_form')){   
    function s7upf_login_form($redirect_to = ''){
        if(empty($redirect_to)) $redirect_to =  apply_filters( 'login_redirect',home_url('/'));
        ?>
        <div class="login-form popup-form active">
            <div class="form-header">
                <h2><?php esc_html_e( 'Log In','fattoria' ); ?></h2>
                <div class="desc"><?php esc_html_e( 'Become a part of our community!','fattoria' ); ?></div>
                <div class="message ms-done ms-default"><?php esc_html_e( 'Registration complete. Please check your email.','fattoria' ); ?></div>
            </div>
            <form name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
                <?php do_action( 'woocommerce_login_form_start' ); ?>
                <div class="form-field">
                    <input type="text" name="log" id="user_login" class="input" size="20" autocomplete="off"/>
                    <label for="user_login"><?php esc_html_e( 'Username or Email Address','fattoria' ); ?></label>
                    <div class="input-focus-line"></div>
                </div>
                <div class="form-field">
                    <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" autocomplete="off"/>
                    <label for="user_pass"><?php esc_html_e( 'Password','fattoria' ); ?></label>
                    <div class="input-focus-line"></div>
                </div>
                <div class="extra-field">
                    <?php 
                        if(class_exists("woocommerce")) do_action( 'woocommerce_login_form' );
                        else do_action( 'login_form' );
                    ?>
                </div>
                <div class="forgetmenot">
                    <input name="rememberme" type="checkbox" id="remembermep" value="forever" />
                    <label class="rememberme" for="remembermep"><?php esc_html_e( 'Remember Me','fattoria' ); ?></label>
                </div>
                <div class="submit">
                    <input type="submit" name="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Log In','fattoria'); ?>" />
                    <input type="hidden" name="redirect_to1" value="<?php echo esc_attr($redirect_to); ?>" />
                </div>
                <?php do_action( 'woocommerce_login_form_end' ); ?>
            </form>
            <div class="nav-form">
                <?php if ( get_option( 'users_can_register' ) ) :
                    echo '<a href="#registerform" class="popup-redirect register-link">'.esc_html__("Register","fattoria").'</a>';
                endif;
                echo '<a href="#lostpasswordform" class="popup-redirect lostpass-link">'.esc_html__("Lost your password?","fattoria").'</a>';
                ?>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_register_form')){   
    function s7upf_register_form($redirect_to = ''){
        if(empty($redirect_to)) $redirect_to = apply_filters( 'registration_redirect', wp_login_url() );
        ?>
        <div class="register-form popup-form">
            <div class="form-header">
                <h2><?php esc_html_e( 'Create an account','fattoria' ); ?></h2>
                <div class="desc"><?php esc_html_e( 'Welcome! Register for an account','fattoria' ); ?></div>
                <div class="message login_error ms-error ms-default"><?php esc_html_e( 'The user name or email address is not correct.','fattoria' ); ?></div>
                
            </div>
            <form name="registerform" id="registerform" action="<?php echo esc_url( site_url( 'wp-login.php?action=register', 'login_post' ) ); ?>" method="post" novalidate="novalidate">
                <?php do_action( 'woocommerce_register_form_start' ); ?>
                <div class="form-field">
                    <input type="text" name="user_login" id="user_loginr" class="input" value="" size="20" autocomplete="off"/>
                    <label for="user_login"><?php esc_html_e('Username','fattoria') ?></label>
                    <div class="input-focus-line"></div>
                </div>
                <div class="form-field">
                    <input type="email" name="user_email" id="user_email" class="input" value="" size="25" autocomplete="off"/>
                    <label for="user_email"><?php esc_html_e('Email','fattoria') ?></label>
                    <div class="input-focus-line"></div>
                </div>
                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ){ ?>
                    <div class="form-field">
                        <input type="password" name="password" id="reg_passwordp" autocomplete="new-password" />
                        <label for="reg_passwordp"><?php esc_html_e( 'Password', 'fattoria' ); ?></label>
                        <div class="input-focus-line"></div>
                    </div>
                <?php }?>
                <div class="extra-field">
                    <?php 
                        if(class_exists("woocommerce")) do_action( 'woocommerce_register_form' );
                        else do_action( 'register_form' );
                    ?>
                    <input type="hidden" name="redirect_to1" value="<?php echo esc_attr( $redirect_to ); ?>" />
                </div>                
                <?php if ( 'no' != get_option( 'woocommerce_registration_generate_password' ) ){ ?>
                    <div id="reg_passmail">
                        <?php esc_html_e( 'Registration confirmation will be emailed to you.','fattoria' ); ?>
                    </div>
                <?php }?>
                <div class="submit"><input type="submit" name="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Register',"fattoria"); ?>" /></div>
                <?php do_action( 'woocommerce_register_form_end' ); ?>
            </form>

            <div class="nav-form">
                <a href="#loginform" class="popup-redirect login-link"><?php esc_html_e( 'Log in','fattoria' ); ?></a>
                <a href="#lostpasswordform" class="popup-redirect lostpass-link"><?php esc_html_e( 'Lost your password?','fattoria' ); ?></a>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_lostpass_form')){   
    function s7upf_lostpass_form($redirect_to = ''){
        if(empty($redirect_to)) $redirect_to =  apply_filters( 'login_redirect',home_url('/'));
        ?>
        <div class="lostpass-form popup-form">
            <div class="form-header">
                <h2><?php esc_html_e( 'Reset password','fattoria' ); ?></h2>
                <div class="desc"><?php esc_html_e( 'Recover your password','fattoria' ); ?></div>
                <div class="message ms-default ms-done"><?php esc_html_e( 'Password reset email has been sent.','fattoria' ); ?></div>
                <div class="message login_error ms-error ms-default"><?php esc_html_e( 'The email could not be sent.
Possible reason: your host may have disabled the mail function.','fattoria' ); ?></div>
            </div>
            <form name="lostpasswordform" id="lostpasswordform" action="<?php echo esc_url( network_site_url( 'wp-login.php?action=lostpassword', 'login_post' ) ); ?>" method="post">
                <div class="form-field">
                    <input type="text" name="user_login" id="user_loginlp" class="input" value="" size="20" autocomplete="off"/>
                    <label for="user_login" ><?php esc_html_e( 'Username or Email Address','fattoria' ); ?></label>
                    <div class="input-focus-line"></div>
                </div>
                <div class="extra-field">
                    <?php do_action( 'lostpassword_form' ); ?>
                    <input type="hidden" name="redirect_to1" value="<?php echo esc_attr( $redirect_to ); ?>" />
                </div>
                <div class="submit"><input type="submit" name="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Get New Password','fattoria'); ?>" /></div>
                <div class="desc note"><?php esc_html_e( 'A password will be e-mailed to you.','fattoria' ); ?></div>
            </form>

            <div class="nav-form">
                <a href="#loginform" class="popup-redirect login-link"><?php esc_html_e('Log in',"fattoria") ?></a>
                <?php
                if ( get_option( 'users_can_register' ) ) :
                    echo '<a href="#registerform" class="popup-redirect register-link">'.esc_html__("Register","fattoria").'</a>';
                endif;
                ?>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_content_form_popup')){   
    function s7upf_content_form_popup(){
        if(!is_user_logged_in()):
        ?>
            <div class="login-popup-content-wrap">
                <div class="login-popup-content">
                    <?php
                    s7upf_login_form();
                    s7upf_register_form();
                    s7upf_lostpass_form();
                    ?>
                    <a href="#" class="close-login-form"><i class="la la-close"></i></a>
                </div>
                <div class="popup-overlay"></div>
            </div>
        <?php
        endif;
    }
}
if(!function_exists('s7upf_add_html_attr')){   
    function s7upf_add_html_attr($value,$echo = false,$attr='style'){
        $output = '';
        if(!empty($attr)){
            $output = $attr.'="'.$value.'"';
        }
        if($echo) echo apply_filters('s7upf_output_content',$output);
        else return $output;
    }
}
if(!function_exists('s7upf_add_style_tag')){   
    function s7upf_add_style_tag($value,$echo = false,$tag='style'){
        $output = '';
        if(!empty($tag)){
            $output = '<'.$tag.'>'.$value.'</style>';
        }
        if($echo) echo apply_filters('s7upf_output_content',$output);
        else return $output;
    }
}
if(!function_exists('s7upf_get_responsive_default_atts')){
    function s7upf_get_responsive_default_atts(){
        $default = array(
            'bb_tab_container' =>  '',
            's7upf_x_large_css' =>  '',
            's7upf_x_large_csstypo' =>  '',
            's7upf_x_large_cssshow_hide' =>  'yes',
            's7upf_large_css' =>  '',
            's7upf_large_csstypo' =>  '',
            's7upf_large_cssshow_hide' =>  'yes',
            's7upf_medium_css' =>  '',
            's7upf_medium_csstypo' =>  '',
            's7upf_medium_cssshow_hide' =>  'yes',
            's7upf_small_css' =>  '',
            's7upf_small_csstypo' =>  '',
            's7upf_small_cssshow_hide' =>  'yes',
            's7upf_s_small_css' =>  '',
            's7upf_s_small_csstypo' =>  '',
            's7upf_s_small_cssshow_hide' =>  'yes',
        );
        return apply_filters('s7upf_responsive_default_atts',$default);
    }
}
if(!function_exists('s7upf_product_sold')){
	function s7upf_product_sold(){
		$units_sold = get_post_meta( get_the_ID(), 'total_sales', true );
		?>
		<span class="sold-product"><?php echo esc_html__('Sold:','fattoria')?> <?php echo esc_html($units_sold)  ?></span>
		<?php
	}
}
if(!function_exists('var_dumpx')){
	function var_dumpx($value){
		?>
		<pre><?php var_dump($value) ?></pre>
		<?php
	}
}
if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ){
    function yith_wcwl_ajax_update_count(){
        wp_send_json( array(
            'count' => yith_wcwl_count_all_products()
        ) );
    }
    add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

if(!function_exists('s7upf_cate_link')){
	function s7upf_cate_link($post_type=''){
		if($post_type=='post'){
			$categories = get_the_category();
			if(!empty($categories)):?>
				<a href="<?php echo esc_url(get_category_link($categories[0]->term_id)) ?>" class="color has-border-right">
					<?php 
						if ( ! empty( $categories ) ) {
							echo esc_html( $categories[0]->name );   
						}
					?>
				</a>
			<?php endif;
		}else{
			$terms = get_the_terms( get_the_ID(), 'product_cat' );
			if(!empty($terms)):
			$link_cat = get_term_link( $terms[0]->term_id, 'product_cat' );
			?>
			<a href="<?php echo esc_url($link_cat)?>" class="color title12">
				<?php
					if( ! empty($terms)){
						echo esc_html($terms[0]->name);
					}
				?>
			</a>
			<?php endif;
		}
	}
} 
/***************************************END Core Function***************************************/


/***************************************Add Theme Function***************************************/



/***************************************END Theme Function***************************************/