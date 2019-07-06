<?php
if(empty($item)) $item = '4';
if(empty($item) && empty($item_res)) $item_res = '0:1,480:2,767:3,990:4';
$attr = array(
    'size'      => $size,
    'excerpt'   => $excerpt,
    );
?>
<div class="block-element <?php echo esc_attr($el_class);?> js-content-wrap">
    <?php    
        if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
        if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
    ?>
    <div class="list-post-wrap row">
        <div class="wrap-item smart-slider owl-carousel owl-theme <?php echo esc_attr($slider_navi)?> <?php echo esc_attr($slider_pagi)?>" 
            data-item="<?php echo esc_attr($item)?>" data-speed="<?php echo esc_attr($speed);?>" 
            data-itemres="<?php echo esc_attr($item_res)?>" 
            data-prev="" data-next="" 
            data-pagination="<?php echo esc_attr($slider_pagi)?>" data-navigation="<?php echo esc_attr($slider_navi)?>">
            <?php 
                if($post_query->have_posts()) {
                    while($post_query->have_posts()) {
                        $post_query->the_post();
                        if($count % (int)$row_number == 1 || (int)$row_number == 1) echo '<div class="item">';
                        s7upf_get_template_post('grid/grid',$item_style,$attr,true);
                        if($count % (int)$row_number == 0 || (int)$row_number == 1 || $count == $count_query) echo '</div>';
                        $count++;
                    }
                }
            ?>
        </div>
    </div>
</div>