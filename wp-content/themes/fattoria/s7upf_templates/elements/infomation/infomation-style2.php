<?php 
if(!empty($icon)) $icon = '<i class="'.esc_attr($icon).'"></i>';?>
<div class="item-service-style2 text-center <?php echo esc_attr($el_class);?>">
	<div class="wrap-item-service2 bg-white">
		<div class="service-icon">
			<a href="<?php echo esc_url($link);?>" class="wobble-horizontal title60 color"><?php echo apply_filters('s7upf_output_content',$icon);?></a>
		</div>
		<div class="service-text">
			<h3 class="title18 font-bold "><a href="<?php echo esc_url($link);?>" rel="wobble-horizontal" class="color"><?php echo esc_html($title);?></a></h3>
			<p class="desc"><?php echo esc_html($desc) ?></p>
			<a href="#" class="btn-service"><i class="la la-angle-double-down"></i></a>
		</div>
	</div>
</div>	