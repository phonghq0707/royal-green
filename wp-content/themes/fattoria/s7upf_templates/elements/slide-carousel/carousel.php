<div class="banner-slider <?php echo esc_attr($el_class)?>">
    <div class="wrap-item sv-slider owl-carousel owl-theme <?php echo esc_attr($navigation.' '.$pagination)?>" 
        data-item="<?php echo esc_attr($item)?>" 
        data-speed="<?php echo esc_attr($speed)?>" 
        data-itemres="<?php echo esc_attr($itemres)?>"
        data-navigation="<?php echo esc_attr($navigation)?>" 
        data-pagination="<?php echo esc_attr($pagination)?>" 
        data-prev="<?php echo esc_attr($nav_prev)?>" 
        data-next="<?php echo esc_attr($nav_next)?>"
        data-margin="<?php echo esc_attr($margin)?>" 
        data-stage_padding="<?php echo esc_attr($stage_padding)?>"
        data-start_position="<?php echo esc_attr($start_position)?>" 
        data-loop="<?php echo esc_attr($loop)?>"
        data-animation_out="<?php echo esc_attr($animation_out)?>"
        data-animation_in="<?php echo esc_attr($animation_in)?>"
        data-mousewheel="<?php echo esc_attr($mousewheel)?>">

		<?php echo wpb_js_remove_wpautop($content, false);?>
		
    </div>
</div>