<?php
    if(empty($itemres)) $itemres = '0:1,480:3,768:4,990:5';
?>
<div class="block-element instagram-slider follow-instagram <?php echo esc_attr($el_class);?>">
<?php
    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
?>
    <div class="wrap-item smart-slider owl-carousel owl-theme group-navi" 
        data-item="" data-speed="<?php echo esc_attr($speed);?>" 
        data-itemres="<?php echo esc_attr($itemres)?>" 
        data-prev="" data-next="" 
        data-pagination="" data-navigation="true">
    <?php
        if(!empty($data)){
            foreach ($data as $value) {
                echo '<a href="'. esc_url( $value['link'] ) .'">
                        <img src="'. esc_url($value['image_url']) .'" alt="'.esc_attr__("instagram-image","fattoria").'">
                        <span class="instagram-text-follow"><i class="fa fa-instagram"></i> '.esc_html__("Follow Us","fattoria").'</span>
                    </a>';
            }              
        }
    ?>
    </div>
</div>