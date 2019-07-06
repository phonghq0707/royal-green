<?php    
$id = get_the_ID();
if(is_front_page() && is_home()) $id = (int)get_option( 'page_on_front' );
if(!is_front_page() && is_home()) $id = (int)get_option( 'page_for_posts' );
if($id) $title  = get_the_title($id);
else $title = esc_html__("Blog","fattoria");
if(is_archive()) $title = get_the_archive_title();
if(is_search()) $title = esc_html__("Search Result","fattoria");
if(s7upf_is_woocommerce_page() && function_exists('woocommerce_page_title')) $title = woocommerce_page_title(false);
$show_title = s7upf_get_value_by_id('show_title_page');
if($show_title == 'on' || $check_type == 'on' || $check_number == 'on'){
?>
<div class="title-page clearfix">
	<?php if($show_title != 'off'):?>
    <h2 class="title18 font-bold text-uppercase pull-left"><?php echo apply_filters('s7upf_output_content',$title)?></h2>
    <?php endif; ?>
	<?php if($check_type == 'on' || $check_number == 'on'):?>
        <ul class="sort-pagi-bar list-inline-block">
            <?php
                global $post,$wp_query;
                if(!isset($check_order)) $check_order = false;
                if(function_exists('is_shop')) if(is_shop()) $check_order = true;
                if(isset($post->post_content)) if(strpos($post->post_content, '[sv_shop')) $check_order = true;
                if($check_order == true) $add_class = 'load-shop-ajax';
                else $add_class = '';
                $orderby = apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
                if(isset($_GET['orderby'])) $orderby = $_GET['orderby'];
                
            ?>
            <?php if($check_number == 'on'):
                $source = 'blog';
                if(s7upf_is_woocommerce_page()) $source = 'shop';
                $list   = s7upf_get_option($source.'_number_filter_list');
                if(empty($list)){
                    $list = array(12,16,20,24);
                }
                else{
                    $temp = array();
                    foreach ($list as $value) {
                        $temp[] = (int)$value['number'];
                    }
                    $list = $temp;
                }
                $number_df = get_option( 'posts_per_page' );
                if(!in_array((int)$number_df, $list)) $list = array_merge(array((int)$number_df),$list);
                if(!in_array((int)$number, $list)) $list = array_merge(array((int)$number),$list);
                if(isset($wp_query->query_vars['posts_per_page'])) $number = $wp_query->query_vars['posts_per_page'];
                if(isset($_GET['number'])) $number = $_GET['number'];
            ?>
            <li>
                <div class="dropdown-box show-by box-per-page">
                    <span class="gray"><?php esc_html_e("Show:","fattoria")?></span>
                    <ul class="dropdown-list list-inline-block">
                        <?php
                        if(is_array($list)){
                            foreach ($list as $value) {
                                if($value == $number) $active = ' active';
                                else $active = '';
                                echo '<li><a data-number="'.esc_attr($value).'" class="'.esc_attr($add_class.$active).'" href="'.esc_url(s7upf_get_key_url('number',$value)).'">'.$value.'</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </li>
            <?php endif;?>
			<?php
				if($check_order):?>
                    <li>
                        <div class="sort-by">
                            <span class="gray"><?php esc_html_e("Sort by:","fattoria");?></span>
                            <div class="select-box inline-block">
                                <?php s7upf_catalog_ordering($wp_query,$orderby,true,$add_class);?>
                            </div>
                        </div>
                    </li>
                <?php endif;
			?>
            <?php if($check_type == 'on'):?>
            <li>
                <div class="view-type">
                    <span class="gray"><?php esc_html_e("View As:","fattoria")?></span>
                    <a data-type="grid" href="<?php echo esc_url(s7upf_get_key_url('type','grid'))?>" class="grid-view <?php echo esc_attr($add_class)?> <?php if($style == 'grid') echo 'active'?>"><i class="fa fa-th-large"></i></a>
                    <a data-type="list" href="<?php echo esc_url(s7upf_get_key_url('type','list'))?>" class="list-view <?php echo esc_attr($add_class)?> <?php if($style == 'list') echo 'active'?>"><i class="fa fa-reorder"></i></a>
                </div>
            </li>
            <?php endif;?>
        </ul>
    <?php endif;?>
</div>
<?php }