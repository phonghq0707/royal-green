<div class="banner-advs <?php echo esc_attr($el_class);?>">
	<?php if(!empty($link)) echo '<a href="'.esc_url($link).'" class="adv-thumb-link">';?>
    <?php 
	    echo wp_get_attachment_image($image,$size);
	    echo wp_get_attachment_image($image2,$size);
    ?>
	<?php if(!empty($link)) echo '</a>';?>
	<a href="<?php echo wp_get_attachment_url($image)?>" class="various bg-color1 icon-gallery fancybox" ><i class="la la-eye"></i></a>
	<?php if(!empty($content)):?>
	    <div class="banner-info <?php echo esc_attr($el_class2);?>">
	    	<?php echo wpb_js_remove_wpautop($content, true);?>
	    </div>
	<?php endif;?>
</div>