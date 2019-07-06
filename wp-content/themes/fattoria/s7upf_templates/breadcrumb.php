<?php
$size = array(60,60);
if(!isset($breadcrumb)) $breadcrumb = s7upf_get_value_by_id('s7upf_show_breadrumb');
if(!isset($el_class)) $el_class = '';

$check_sb_class = "";
$check_sidebar = s7upf_check_sidebar();
if(function_exists('is_shop')) $is_shop = is_shop();else $is_shop = false;
if(function_exists('is_product')) $is_product = is_product();else $is_product = false;
if(function_exists('woocommerce_page_title')) $woocommerce_page_title = woocommerce_page_title(false);else $woocommerce_page_title = false;
if(s7upf_is_woocommerce_page()) $title = $woocommerce_page_title;
if (is_single() && !$is_product) {
	if($check_sidebar == false) $check_sb_class = "inner-single-content";
}
if($breadcrumb == 'on'):
	$b_class = '';
	$b_class = s7upf_fill_css_background(s7upf_get_value_by_id('s7upf_bg_breadcrumb'));
	$step = '<i class="la la-long-arrow-right"></i>';
	
?>
<div class="wrap-bread-crumb <?php echo esc_attr($el_class)?> <?php echo esc_attr($b_class)?>">
	<div class="bread-crumb">
		<div class="container <?php echo esc_attr($check_sb_class);?>">
			<h2 class="title60 lemonada-font font-bold white">
				<?php 
					if($is_shop) {
						echo esc_html__('Shop','fattoria');
					} elseif ($is_product) {
						echo esc_html__('Product','fattoria');
					} elseif (is_single()) {
						echo esc_html__('Blog','fattoria');
					} elseif (is_cart() || is_checkout() || is_account_page()) {
						the_title( '', '', true );
					} elseif (is_404() || s7upf_get_value_by_id('s7upf_404_page')) {
						echo esc_html__('404','fattoria');
					}elseif (is_search()) {
						echo esc_html__('Search Result','fattoria');
					}elseif (s7upf_is_woocommerce_page()) {
						echo esc_html(woocommerce_page_title(false));
					}else {
						wp_title( '', true, '' );
					}
				?>
			</h2>
        </div>
	</div>
</div>
<div class="bread-crumb-wrap text-center fixed-detail-info">
	<?php
		if(!s7upf_is_woocommerce_page()){
			if(function_exists('bcn_display')) bcn_display();
			else s7upf_breadcrumb($step);
		}
		else {
			if(function_exists('woocommerce_breadcrumb')){
				woocommerce_breadcrumb(array(
				'delimiter'		=> $step,
				'wrap_before'	=> '',
				'wrap_after'	=> '',
				'before'      	=> '',
				'after'       	=> '',
				));
			}
		}
	?>
	<?php if(in_array('7up-core/7up-core.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_product()): ?>
		<div class="product-nav detail-float">
			<ul class="list-none">
				<li class="prev"><?php $prev_post = get_adjacent_post(false, '', true);
				if(!empty($prev_post)) {
				echo	'<a href="' . get_permalink($prev_post->ID) . '" rel="prev" title="'.esc_attr__( 'Previous Product', 'fattoria' ).'">
							'.get_the_post_thumbnail($prev_post->ID,$size).'
							<span class="product-nav-title">'. esc_html($prev_post->post_title).'</span>
						</a>'; } ?></li>

				<li class="next"><?php $next_post = get_adjacent_post(false, '', false);
				if(!empty($next_post)) {
				echo 	'<a href="' . get_permalink($next_post->ID) . '" rel="next" title="'.esc_attr__( 'Next Product', 'fattoria' ).' ">
							<span class="product-nav-title">'. esc_html($next_post->post_title).'</span>
							'.get_the_post_thumbnail($next_post->ID,$size).'
						</a>'; }?></li>
			</ul>
		</div>
	<?php endif; ?>
</div>

<?php endif;?>