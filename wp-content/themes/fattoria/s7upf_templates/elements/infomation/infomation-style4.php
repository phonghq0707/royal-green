<?php 
if(!empty($icon)) $icon = '<i class="'.esc_attr($icon).'"></i>';?>
<div class="item-info <?php echo esc_attr($el_class);?>">
	<div class="wrap-item-info">
		<div class="info-icon">
			<a href="<?php echo esc_url($link);?>" class="wobble-horizontal title60"><?php echo apply_filters('s7upf_output_content',$icon);?></a>
		</div>
		<div class="info-text">
			<h3 class="title18"><a href="<?php echo esc_url($link);?>" rel="wobble-horizontal" class="dark"><?php echo esc_html($title);?></a></h3>
			<p class="desc"><?php echo esc_html($desc);?></p>
		</div>
	</div>
</div>	