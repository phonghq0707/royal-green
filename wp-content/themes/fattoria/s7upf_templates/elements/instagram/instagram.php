<div class="block-element <?php echo esc_attr($el_class);?>">
<?php
    if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase">'.esc_html($title).'</h3>';
    if(!empty($des)) echo '<p class="desc-block">'.esc_html($des).'</p>';
?>
    <ul class="list-inline-block follow-instagram">
    <?php
        if(!empty($data)){
            foreach ($data as $value) {
                echo    '<li>
                            <a href="'. esc_url( $value['link'] ) .'">
                                <img src="'. esc_url($value['image_url']) .'" alt="'.esc_attr__("Instagram image","fattoria").'">
                                <span class="instagram-text-follow"><i class="la la-instagram"></i></span>
                            </a>
                        </li>';
            }              
        }
    ?>
    </ul>
</div>