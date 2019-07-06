<?php
$attr = array(
	'size'		   => $size,
	'animation'	   => $animation,
    'column'            => $column,
	'item_style'      => $item_style,
	'style'		      => 'grid',
    'item_style_list'       => '',
	'pagination'		=> $pagination,
	);
?>
<div class="block-element <?php echo esc_attr($el_class);?> js-content-wrap clearfix">
    <?php 
    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
    ?>
    <?php 
    if($filter_show == 'yes'){
        $data_filter = array(
            'args'          => $args,
            'attr'          => $attr,
            'filter_style'  => $filter_style,
            'filter_column' => $filter_column,
            'filter_cats'   => $filter_cats,
            'filter_price'  => $filter_price,
            'filter_attr'   => $filter_attr,
            'filter_pos'    => $filter_pos,
        );
        s7upf_get_template_woocommerce('loop/filter-product','',$data_filter,true);
    }
    ?>
    <div class="products-wrap">
        <div class="products row list-product-wrap js-content-main">
        	<?php
        	if($product_query->have_posts()) {
                while($product_query->have_posts()) {
                    $product_query->the_post();
                    $attr['count'] = $count;
        			s7upf_get_template_woocommerce('loop/grid/grid',$item_style,$attr,true);
                    $count++;
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
                        <a href="#" class="product-loadmore loadmore shop-button color2" 
                            data-load="'.esc_attr($data_loadjs).'" data-paged="1" 
                            data-maxpage="'.esc_attr($max_page).'">
                            '.esc_html__("Load more","fattoria").'
                        </a>
                    </div>';
        }
        if($pagination == 'pagination') s7upf_get_template_woocommerce('loop/pagination','',array('wp_query'=>$product_query),true);
    	?>
    </div>
</div>