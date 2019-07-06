<?php 
if(!empty($color)): 
$class_color = S7upf_Assets::build_css('color:'.$color);
?>
<div class="item-statistic item-statistic5 text-center <?php echo esc_attr($el_class);?>">
	<div class="wrap-percent-circle inline-block">
		<div id="<?php echo uniqid();?>" class="percentage" data-color="<?php echo esc_attr($color);?>" data-value="<?php echo esc_attr($percent);?>" data-radius="<?php echo esc_attr($radius);?>"></div>
		<div class="wrap-percent absolute"><span class="percent-text  title36 lemonada-font black font-bold numscroller" data-min='1' data-max='<?php echo esc_html($percent);?>' data-delay='5' data-increment='10'><?php echo esc_attr($percent);?></span><span class="title36 lemonada-font black font-bold"><?php echo esc_html__('%','fattoria')?></span></div>
	</div>
	<?php if(!empty($title)):?>
	<h3 class="title18 font-bold text-uppercase"><?php echo esc_html($title);?></h3>
	<?php endif;?>
	<?php if(!empty($desc)):?>
	<p class="desc"><?php echo esc_html($desc);?></p>
	<?php endif;?>
</div>
<?php endif;