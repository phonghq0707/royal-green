<div class="banner-advs item-page-view <?php echo esc_attr($el_class);?>">
	<div class="page-view-thumb adv-thumb-link">
		<?php 
		    echo wp_get_attachment_image($image,$size);
		    echo wp_get_attachment_image($image2,$size);
	    ?>
		<?php if(!empty($link)) echo '<a href="'.esc_url($link).'" class="page-view-link title30"><i class="fa fa-chain"></i></a>';?>
	</div>
    <div class="page-view-info <?php echo esc_attr($el_class2);?>">
    	<?php echo wpb_js_remove_wpautop($content, true);?>
    </div>
</div>