<?php
$check_related = s7upf_get_option('post_single_related','off');
if($check_related == 'on'):
    $categories = get_the_category(get_the_ID());
    $category_ids = array();
    foreach($categories as $individual_category){
        $category_ids[] = $individual_category->term_id;
    }
    $title_df   = esc_html__("YOU MIGHT ALSO LIKE","fattoria");
    $title 		= s7upf_get_option('post_single_related_title',$title_df);
    $number 	= s7upf_get_option('post_single_related_number','6');
    $size 		= s7upf_get_option('post_single_related_size','270x180');
    $itemres 	= s7upf_get_option('post_single_related_item','0:1,480:2,990:3');
    $itemstyle 	= s7upf_get_option('post_single_related_item_style');
    $speed      = '';
    $size = s7upf_get_size_crop($size);
    $attr = array(
        'size'      => $size,
        'excerpt'   => 100,
        );
    $args=array(
        'category__in' 		=> $category_ids,
        'post__not_in' 		=> array(get_the_ID()),
        'posts_per_page'	=> (int)$number,
        'meta_query' 		=> array(array('key' => '_thumbnail_id')) 
        );
    $query = new wp_query($args);
    if($query->post_count > 0):
    ?>
    <div class="single-related-post">
    	<h2 class="title18 font-bold text-uppercase title-single-related-post black">
    		<?php echo esc_html($title)?> 
    		<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php esc_html_e("More From Author","fattoria")?></a>
    	</h2>
    	<div class="related-post-slider">
    		<div class="wrap-item smart-slider owl-carousel owl-theme" 
            data-item="" data-speed="<?php echo esc_attr($speed);?>" 
            data-itemres="<?php echo esc_attr($itemres)?>" 
            data-prev="" data-next="" 
            data-pagination="" data-navigation="true">
            <?php 
            if($query->have_posts()) {
                while($query->have_posts()) {
                    $query->the_post();
                    s7upf_get_template_post('grid/grid',$itemstyle,$attr,true);
                }
            }
            ?>
    		</div>
    	</div>
    </div>
    <?php 
    endif;
    wp_reset_postdata();
    ?>
<?php endif?>