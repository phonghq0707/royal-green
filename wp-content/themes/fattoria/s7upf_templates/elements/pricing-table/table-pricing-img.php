<div class="item-price-table text-center <?php echo esc_attr($el_class);?>">
	<div class="price-table-header">
		<div class="thumb-box"><?php if(!empty($img)) echo wp_get_attachment_image($img,array(300, 200),0)?></div>
		<div class="info-box">
			<?php if(!empty($title)) echo '<h3 class="title24 font-bold text-capitalize white lemonada-font">'.esc_html($title).'</h3>';?>
			<?php if(!empty($des)) echo '<span class="silver start">'.esc_html($des).'</span>';?>
			<?php 
				if(!empty($price)){
					echo '<ul class="list-none list-price-month">';
					echo '<li><span class="title18 white">'.esc_html($unit). esc_html($price).'</span></li>';
					if(!empty($duration)) echo '<li><span class="silver">'.esc_html($duration).'</span></li>';
					echo '</ul>';
				}
			?>
		</div>
	</div>
	<?php if(!empty($content)):?>
		<div class="list-price-support">
			<?php echo wpb_js_remove_wpautop($content, true);?>
		</div>
	<?php endif;?>
	<?php
	if(!empty($link)){
		$link = vc_build_link( $link );
        if(!empty($link['url']) && !empty($link['title'])){
            echo '<a href="'.esc_url($link['url']).'" class="shop-button color2">'.$link['title'].'</a>';
        }
    }
	?>
</div>