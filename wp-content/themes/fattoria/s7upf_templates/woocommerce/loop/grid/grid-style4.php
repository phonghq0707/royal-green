<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(345,315);
if($count==3 || $count==4){
	$size=array(345,630);
}
$size = s7upf_size_random($size);
$show_label = s7upf_get_option('shop_label');
$show_rate = s7upf_get_option('shop_rate');
?>	
<div class="item-product item-product-grid item-product-featured">
	<?php do_action( 'woocommerce_before_shop_loop_item' );?>
	<div class="product-thumb">
		<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
		<?php s7upf_woocommerce_thumbnail_loop($size,$animation);?>
		<?php 
			if($show_label != 'off'): 
				s7upf_product_label();
			endif; 
		?>
		<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
	</div>
	<div class="product-info text-center">
		<h3 class="title14 product-title " >
			<a title="<?php echo esc_attr(the_title_attribute(array('echo'=>false)))?>" href="<?php the_permalink()?>" class="white"><?php the_title()?></a>
		</h3>
		<?php do_action( 'woocommerce_shop_loop_item_title' );?>
		<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
		<?php s7upf_get_price_html()?>
		<?php 
			if($show_rate != 'off'): 
				s7upf_get_rating_html();
			endif; 
		?>
		<div class="link-info">
			<?php s7upf_product_quickview()?>
			<div class="product-extra-link">
				<?php s7upf_addtocart_link(true,'cart-icon');?>
			</div>
		</div>
	</div>		
	<?php do_action( 'woocommerce_after_shop_loop_item' );?>
</div>