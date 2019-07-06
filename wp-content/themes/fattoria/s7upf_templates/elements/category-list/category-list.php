<div class="product-catelist <?php echo esc_attr($el_class)?>">
	<?php if(!empty($heading_title)):?><h3 class="title14 text-uppercase flex-middle"><?php echo esc_html($heading_title)?></h3><?php endif;?>
	<div class="list-product-wrap">
        <div class="wrap-item smart-slider owl-carousel owl-theme js-content-main clearfix" 
            data-item="<?php echo esc_attr($item_cat)?>" data-speed="" 
            data-itemres="<?php echo esc_attr($itemres_cat)?>" 
            data-prev="" data-next="" 
            data-pagination="" data-navigation="true">
	<?php
	    if(is_array($data)) :
	        foreach ($data as $key => $value) :
	        	$value = array_merge($default_val,$value); 
        		$term = get_term_by( 'slug',$value['cats'], 'product_cat' );
                $term_link = $term_title = $term_count = '';
                if(!empty($term) && is_object($term)){
                    $term_link = get_term_link( $term->term_id, 'product_cat' );
                    $term_title = $term->name;
					$term_count = $term->count;
					$thumb_id = get_term_meta ($term->term_id, 'thumbnail_id',true );
					$img_cat = wp_get_attachment_url( $thumb_id ); 
                }
                if(!empty($value['link'])) $term_link = $value['link'];
                if(!empty($value['title'])) $term_title = $value['title'];
				?>
				<div class="item-category <?php if (!empty($value['add_mega'])) echo "has-mega";?> <?php if(!empty($value['style'])) echo esc_attr($value['style'])?>">
					<?php if(!empty($term_title) && !empty($term_link)): ?>
							<div class="category-img">
								<div class="thumb-cat">
									<a href="<?php echo esc_url($term_link)?>" >
										<img src="<?php echo esc_attr($img_cat) ?>"/>
										<?php
											if(!empty($value['image'])) echo wp_get_attachment_image($value['image'],'full')
										?>
									</a>
									<div class="view-cat">
										<a href="<?php echo esc_url($term_link)?>" ><i class="la la-search"></i></a>
									</div>
								</div>
								<a href="<?php echo esc_url($term_link)?>" class="name-cat font-bold"><?php echo esc_html($term_title);?><span class="number-cate"><?php echo esc_html($term_count)?></span></a>
							</div>
					<?php endif;?>
				</div>
	        <?php endforeach;
	    endif;?>
	</div>
	</div>
</div>