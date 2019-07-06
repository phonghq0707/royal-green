<?php 
if(!empty($icon)) $icon = '<i class="'.esc_attr($icon).'"></i>';?>
<div class="item-service text-center <?php echo esc_attr($el_class);?>">
	<div class="wrap-item-service">
		<div class="service-icon">
			<a href="<?php echo esc_url($link);?>" class="wobble-horizontal title60 color"><?php echo apply_filters('s7upf_output_content',$icon);?></a>
		</div>
		<div class="service-text">
			<p class="desc"><?php echo esc_html($desc);?></p>
			<h3 class="title18 font-bold title-has-border"><a href="<?php echo esc_url($link);?>" rel="wobble-horizontal" class="dark"><?php echo esc_html($title);?></a></h3>
		</div>
	</div>
</div>	