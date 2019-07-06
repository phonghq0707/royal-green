<?php
$color_class = '';
if(!empty($color)){
	$color_class = 's7upf_'.uniqid();
	S7upf_Assets::add_css('
		.price-table-color.'.$color_class.' .btn-purchase{background-color:'.$color.';border-color:'.$color.'}
		.price-table-color.'.$color_class.' .list-price-month{background-color:'.$color.'}
		.price-table-color.'.$color_class.' .list-price-support li .fa{color:'.$color.'}
		');
	$el_class .= ' '.$color_class;
}
?>
<div class="item-price-table price-table-color blue text-center <?php echo esc_attr($el_class);?>">
	<?php if(!empty($title)) echo '<h3 class="title18 font-bold text-uppercase dark">'.esc_html($title).'</h3>';?>
	<?php if(!empty($des)) echo '<span class="silver start">'.esc_html($des).'</span>';?>
	<?php 
		if(!empty($price)){
			echo '<ul class="list-none list-price-month">';
			echo '<li><strong class="title30 font-bold white"><sup>'.esc_html($unit).'</sup>'.esc_html($price).'</strong></li>';
			if(!empty($duration)) echo '<li><span class="white">'.esc_html($duration).'</span></li>';
			echo '</ul>';
		}
	?>
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