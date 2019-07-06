<?php
if(empty($itemres)) $itemres = '0:2,768:3,1024:4,1200:5';
?>
<div class="images-slider <?php echo esc_attr($el_class);?>">
    <?php    
        if(!empty($title)) echo '<h3 class="block-title">'.esc_html($title).'</h3>';
        if(!empty($des)) echo '<p class="desc">'.esc_html($des).'</p>';
    ?>
    <div class="wrap-item smart-slider owl-carousel owl-theme" 
        data-item="" data-speed="<?php echo esc_attr($speed);?>" 
        data-itemres="<?php echo esc_attr($itemres)?>" 
        data-prev="" data-next="" 
        data-pagination="" data-navigation="true">
    <?php
        if(is_array($data)){
            foreach ($data as $key => $value) {
                $value = array_merge($default_val,$value);
                $attr_item = array(
                            'title' => $value['title'],
                            'alt' => $value['des'],
                            );
                ?>
                    <div class="item-image-list">
                        <div class="banner-advs box-shadow">
                            <?php if(!empty($value['link'])):?>
                                <a href="<?php echo esc_url($value['link']);?>" title="<?php echo esc_attr($value['title']);?>" class="adv-thumb-link">
                            <?php endif;?>

                            <?php echo wp_get_attachment_image($value['image'],$size,false,$attr_item);?>
                            
                            <?php if(!empty($value['link'])):?>
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
            <?php }
        }?>
    </div>
</div>