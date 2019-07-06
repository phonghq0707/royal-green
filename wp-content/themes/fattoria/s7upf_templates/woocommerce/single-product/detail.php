<?php
s7upf_set_post_view();
$thumb_class = 'col-md-7 col-sm-12 col-xs-12';
$info_class = 'col-md-5 col-sm-12 col-xs-12';
$zoom_style = s7upf_get_value_by_id('product_image_zoom');
$style_detail = get_post_meta(get_the_ID(),'style_product_detail',true);
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
$custom_gallery='';
if (count($attachment_ids) < 2){
	$custom_gallery='custom-gallery';
}
$has_sidebar='';
if(s7upf_check_sidebar(true)){
	$has_sidebar='has-sidebar';
}
?>
<div class="product-detail detail-<?php echo esc_attr($style_detail) ?> <?php echo esc_attr($has_sidebar)?>">
    <div class="row">
        <div class="<?php echo esc_attr($thumb_class)?>">
            <div class="detail-gallery">
                <div class="wrap-detail-gallery images <?php echo esc_attr($zoom_style)?> <?php echo esc_attr($custom_gallery)?>">
                    <div class="mid woocommerce-product-gallery__image image-lightbox" data-gallery="<?php echo esc_attr($gallerys)?>">
                        <?php 
                        $html = get_the_post_thumbnail(get_the_ID(),'shop_single',array('class'=> 'wp-post-image'));
                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( get_the_ID() ) );
                        ?>
						<a href="#" class="icon-mid"><i class="la la-arrows"></i></a>
					</div>
                    <?php                    
                    if ( $attachment_ids && has_post_thumbnail() && count($attachment_ids) > 1) {
                    ?>
                    <div class="gallery-control">
                        <div class="carousel" data-visible="5" data-vertical="true">
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
						<a href="#" class="prev"><i class="la la-long-arrow-down"></i></a>
                        <a href="#" class="next"><i class="la la-long-arrow-up"></i></a>
                    </div>
                    <?php
                        do_action( 'woocommerce_product_thumbnails' );
                    }
                    ?>
                </div>
                <?php s7upf_get_template( 'share','',false,true );?>
            </div>
        </div>
        <div class="<?php echo esc_attr($info_class)?>">
            <div class="summary entry-summary detail-info">
				<?php s7upf_cate_link();?>
                <h2 class="product-title title24"><?php the_title()?></h2>
                <?php
                    do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>
        </div>
    </div>
</div>