<?php
global $post;
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size_list)) $size_list = array(370,370);
$col_class = 'col-md-12 col-sm-12 col-xs-12';
$show_label = s7upf_get_option('shop_label');
$show_rate = s7upf_get_option('shop_rate');
?>
<div <?php post_class($col_class)?>>
	<div class="item-product item-product-list">
		<div class="row">
			<?php do_action( 'woocommerce_before_shop_loop_item' );?>
			<div class="col-md-4 col-sm-5 col-xs-5">
				<div class="product-thumb">
					<!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
					<?php s7upf_woocommerce_thumbnail_loop($size_list,$animation);?>
					<?php s7upf_product_quickview()?>
					<?php 
						if($show_label != 'off'): 
							s7upf_product_label();
						endif; 
					?>
					<?php do_action( 'woocommerce_before_shop_loop_item_title' );?>
				</div>
			</div>
			<div class="col-md-8 col-sm-7 col-xs-7">
				<div class="product-info">
					<?php s7upf_cate_link();?>
					<h3 class="title24 product-title">
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
					<div class="desc"><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?></div>
					<div class="product-extra-link">
						<?php s7upf_addtocart_link()?>
						<?php echo s7upf_compare_url();?>
						<?php echo s7upf_wishlist_url();?>
					</div>
				</div>
			</div>
			<?php do_action( 'woocommerce_after_shop_loop_item' );?>
		</div>
	</div>
</div>