<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(600,600);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
$date_time="";
$check_show_time='true';
$current_time= current_time('timestamp');
$sales_price_to = get_post_meta(get_the_ID(), '_sale_price_dates_to', true);
if($current_time > $sales_price_to) $check_show_time='false';
if($sales_price_to != '') $date_time=$sales_price_to;
$date_meta_box = get_post_meta(get_the_ID(), 'product_date', true);
if($current_time > strtotime($date_meta_box)) $check_show_time='false';
if($date_meta_box != '') $date_time=$date_meta_box;
$data_text= '["'.esc_html__('Day','fattoria').'","'.esc_html__('HRS','fattoria').'","'.esc_html__('MIN','fattoria').'","'.esc_html__('SEC','fattoria').'"]';
$show_label = s7upf_get_option('shop_label');	
$show_rate = s7upf_get_option('shop_rate');
?>	
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-grid item-has-time">
		<?php 
			if($date_time !='' && $check_show_time='true'){
				if($date_meta_box =='') $date_time = date_i18n("d/m/Y", $date_time);
				echo '<div class="countdown-style-default time-countdowns hidden-canvas" data-date="'.$date_time.'" data-text='."'".$data_text."'".'></div>';
			}
		?>
		<?php do_action( 'woocommerce_before_shop_loop_item' );?>
		<div class="product-thumb">
			<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
			<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
			<div class="link-thumb">
				<?php s7upf_product_quickview()?>
				<div class="product-extra-link">
					<?php s7upf_addtocart_link(true,'cart-icon');?>
				</div>
			</div>
			<?php 
				if($show_label != 'off'): 
					s7upf_product_label();
				endif; 
			?>
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
		</div>
		<div class="product-info text-center">
			<?php s7upf_cate_link();?>
			<h3 class="title14 product-title">
				<a title="<?php echo esc_attr(the_title_attribute(array('echo'=>false)))?>" href="<?php the_permalink()?>" ><?php the_title()?></a>
			</h3>
			<?php do_action( 'woocommerce_shop_loop_item_title' );?>
			<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
			<?php 
				if($show_rate != 'off'): 
					s7upf_get_rating_html();
				endif; 
			?>
			<?php s7upf_get_price_html()?>
		</div>		
		<?php do_action( 'woocommerce_after_shop_loop_item' );?>
	</div>
</div>