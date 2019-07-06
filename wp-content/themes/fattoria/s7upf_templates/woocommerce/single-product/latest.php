<?php
global $product;
extract(s7upf_show_single_product_data());
if($show_latest == 'on'):?>  
    <div class="latest-product">
		<div class="wrap-title-general">
			<div class="title-general">
			<div class="icon-title">
				<span class="before-title">&nbsp;</span>
				<i class="la la-foursquare"></i>
				<span class="after-title">&nbsp;</span>
			</div>
			<h3 class="title30 font-bold lemonada-font"><?php esc_html_e("Latest products","fattoria")?></h3>
			</div>
		</div>
        <div class="product-slider">
            <?php echo '<div class="wrap-item group-navi smart-slider owl-carousel owl-theme" data-item="" data-speed="" data-itemres="'.esc_attr($item_res).'" data-prev="" data-next="" data-pagination="" data-navigation="true">';?>
                <?php
                    $args = array(
                        'post_type'           => 'product',
                        'ignore_sticky_posts' => 1,
                        'posts_per_page'      => $number,
                        'post__not_in'        => array( $product->get_id() ),
                        'orderby'             => 'date'
                    );
                    $products = new WP_Query( $args );
                    if ( $products->have_posts() ) :
                        while ( $products->have_posts() ) : 
                            $products->the_post();                                  
                            s7upf_get_template_woocommerce('loop/grid/grid',$item_style,array('size'=>$size),true);
                        endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
<?php endif;?>