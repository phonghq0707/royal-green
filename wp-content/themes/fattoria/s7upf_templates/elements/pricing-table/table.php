<div class="item-price-table text-center <?php echo esc_attr($el_class);?>">
	<div class="price-table-header">
		<?php if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase dark">'.esc_html($title).'</h3>';?>
		<?php if(!empty($des)) echo '<span class="silver start">'.esc_html($des).'</span>';?>
		<?php 
			if(!empty($price)){
				echo '<ul class="list-none list-price-month">';
				echo '<li><strong class="title30 font-bold color"><sup>'.esc_html($unit).'</sup>'.esc_html($price).'</strong></li>';
				if(!empty($duration)) echo '<li><span class="silver">'.esc_html($duration).'</span></li>';
				echo '</ul>';
			}
		?>
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
            echo '<a href="'.esc_url($link['url']).'" class="btn-purchase">'.$link['title'].'</a>';
        }
    }
	?>
</div>