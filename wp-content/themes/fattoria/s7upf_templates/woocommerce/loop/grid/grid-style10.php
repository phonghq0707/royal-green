<?php
if(!isset($animation)) $animation = s7upf_get_option('shop_thumb_animation');
if(empty($size)) $size = array(350,350);
$size = s7upf_size_random($size);
$show_label = s7upf_get_option('shop_label');
$show_rate = s7upf_get_option('shop_rate');
global $product;
$thumb_id = array(get_post_thumbnail_id());
$attachment_ids = $product->get_gallery_image_ids();
$attachment_ids = array_merge($thumb_id,$attachment_ids);
$gallerys = ''; $i = 1;
foreach ( $attachment_ids as $attachment_id ) {
    $image_link = wp_get_attachment_url( $attachment_id );
    if($i == 1) $gallerys .= $image_link;
    else $gallerys .= ','.$image_link;
    $i++;
}
?>	
<div class="item-product item-product-grid">
	<?php do_action( 'woocommerce_before_shop_loop_item' );?>
	<div class="detail-gallery ">
		<div class="wrap-detail-gallery images">
			<div class="product-thumb mid woocommerce-product-gallery__image image-lightbox" data-gallery="<?php echo esc_attr($gallerys)?>">
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
			<?php                    
			if ( $attachment_ids && has_post_thumbnail() && count($attachment_ids) > 1) {
			?>
			<div class="gallery-control">
				<div class="carousel" data-visible="5" data-vertical="false">
					<ul class="list-none">
						<?php
						$i = 1;
						foreach ( $attachment_ids as $attachment_id ) {
							if($i == 1) $active = 'active';
							else $active = '';
							$attributes      = array(
								'data-src'      => wp_get_attachment_image_url( $attachment_id, 'woocommerce_single' ),
								'data-srcset'   => wp_get_attachment_image_srcset( $attachment_id, 'woocommerce_single' ),
								'data-srcfull'  => wp_get_attachment_image_url( $attachment_id, 'full' ),
								);
							$html = wp_get_attachment_image($attachment_id,'shop_thumbnail',false,$attributes );
							echo   '<li data-number="'.esc_attr($i).'">
										<a title="'.esc_attr( get_the_title( $attachment_id ) ).'" class="'.esc_attr($active).'" href="#">
											'.apply_filters( 'woocommerce_single_product_image_thumbnail_html',$html,$attachment_id).'
										</a>
									</li>';
							$i++;
						}
						?>
					</ul>
				</div>
			</div>
			<?php
				do_action( 'woocommerce_product_thumbnails' );
			}
			?>
		</div>
	</div>
	<div class="product-info text-center">
		<h3 class="title24 product-title">
			<a title="<?php echo esc_attr(the_title_attribute(array('echo'=>false)))?>" href="<?php the_permalink()?>"><?php the_title()?></a>
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