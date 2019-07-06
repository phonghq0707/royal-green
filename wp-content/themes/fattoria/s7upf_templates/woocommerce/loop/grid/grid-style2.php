<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(270,270);
$size = s7upf_size_random($size);
if(isset($column)) $col_class = "list-col-item list-".esc_attr($column)."-item";
else $col_class = '';
$show_label = s7upf_get_option('shop_label');
$show_rate = s7upf_get_option('shop_rate');
?>	
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-grid icon">
		<?php do_action( 'woocommerce_before_shop_loop_item' );?>
		<div class="product-thumb">
			<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
			<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
			<?php s7upf_product_quickview()?>
			<?php if($show_label != 'off'): ?>
			<?php s7upf_product_label();?>
			<?php endif; ?>
			<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
		</div>
		<div class="product-info">
			<h3 class="title14 product-title">
				<a title="<?php echo esc_attr(the_title_attribute(array('echo'=>false)))?>" href="<?php the_permalink()?>"><?php the_title()?></a>
			</h3>
			<?php do_action( 'woocommerce_shop_loop_item_title' );?>
			<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
			<?php s7upf_get_price_html()?>
			<?php 
				if($show_rate != 'off'): 
					s7upf_get_rating_html();
				endif; 
			?>
			<div class="product-extra-link">
				<?php s7upf_addtocart_link();?>
				<?php echo s7upf_compare_url();?>
				<?php echo s7upf_wishlist_url();?>
			</div>
		</div>		
		<?php do_action( 'woocommerce_after_shop_loop_item' );?>
	</div>
</div>