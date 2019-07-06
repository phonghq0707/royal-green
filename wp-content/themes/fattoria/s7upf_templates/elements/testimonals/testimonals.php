<div class="item-testimo <?php echo esc_attr($el_class)?>">

	<?php switch ($style) {
		case 'style2': ?>
			<?php if (!empty($image)): ?>
				<div class="wrap-thumb">
					<div class="thumb">
						<a href="<?php echo esc_url($link)?>"><?php echo wp_get_attachment_image($image,array(80, 80),0,array('class'=>'round'))?></a>
					</div>
				</div>
				<?php endif ?>
			<div class="testimo-info">
				<?php if(!empty($content)):?>
			        <div class="content-info"><?php echo wpb_js_remove_wpautop($content, true);?></div>
				<?php endif; ?>
				<ul class="list-inline-block">
					<li><?php if(!empty($name)):?><h3 class="title18 font-bold"><a href="<?php echo esc_url($link)?>"><?php echo esc_html($name)?></a></h3><?php endif;?></li>
					<li><?php if(!empty($pos)):?><span class="title14 pos font-italic"><?php echo esc_html($pos)?></span><?php endif;?></li>
				</ul>
			</div>
		<?php break;

		default: ?>
			<?php if(!empty($content)):?>
		        <div class="content-info"><?php echo wpb_js_remove_wpautop($content, true);?></div>
			<?php endif; ?>
			<div class="testimo-info">
				<?php if (!empty($image)): ?>
					<div class="thumb">
						<a href="<?php echo esc_url($link)?>"><?php echo wp_get_attachment_image($image,array(90, 90),0,array('class'=>'round'))?></a>
					</div>
				<?php endif ?>
				<?php if(!empty($name)):?><h3 class="title20 noto-font font-italic"><a href="<?php echo esc_url($link)?>"><?php echo esc_html($name)?></a></h3><?php endif;?>
				<?php if(!empty($pos)):?><span class="pos"><?php echo esc_html($pos)?> </span><?php endif;?>
			</div>
		<?php break;
	} ?>
	
</div>