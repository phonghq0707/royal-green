<?php
$attr = array(
	'size'		=> $size,
	'column'	=> $column,
	'excerpt'	=> $excerpt,
    'item_style'=> $item_style,
    'style'     => 'grid',
    'item_style_list'       => '',
	);

?>
<div class="block-element <?php echo esc_attr($el_class);?> js-content-wrap" data-column="<?php echo esc_attr($column)?>">
    <?php 
    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
    ?>
    <div class="js-content-main list-post-wrap row">
    	<?php 
    	if($post_query->have_posts()) {
            while($post_query->have_posts()) {
                $post_query->the_post();
    			s7upf_get_template_post('grid/grid',$item_style,$attr,true);
    		}
    	}
    	?>
	</div>
	<?php
	if($pagination == 'load-more' && $max_page > 1){
        $data_load = array(
            "args"        => $args,
            "attr"        => $attr,
            );
        $data_loadjs = json_encode($data_load);
        echo    '<div class="btn-loadmore">
                    <a href="#" class="blog-loadmore loadmore shop-button color2" 
                        data-load="'.esc_attr($data_loadjs).'" data-paged="1" 
                        data-maxpage="'.esc_attr($max_page).'">
                        '.esc_html__("Load more","fattoria").'
                    </a>
                </div>';
    }
    if($pagination == 'pagination') s7upf_paging_nav($post_query,'',true);
	?>
</div>