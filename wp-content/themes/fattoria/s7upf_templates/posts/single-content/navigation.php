<?php
$check_navigation   = s7upf_get_option('post_single_navigation','on');
if($check_navigation == 'on'):
	$previous_post = get_previous_post();
	$next_post = get_next_post();
	$post = get_post();
	
?>
<div class="post-control">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-6">
			<?php if(!empty( $previous_post )):
			$custom_thumb = '';
			if(!has_post_thumbnail($previous_post->ID)) $custom_thumb='custom_thumb';
			?>
            <h3 class="title14 text-left">
				<a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>" class="prev-post <?php echo esc_attr($custom_thumb)?>">
					<?php
					echo get_the_post_thumbnail($previous_post->ID);
					?>
					<span class="color"><?php echo esc_html($previous_post->post_title)?></span>
					<span class="nav-text nav-text-prev"><i class="fa fa-angle-left"></i>Previous Post</span>
				</a>
			</h3>
            <?php endif;?>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<?php if(!empty( $next_post )):
				$custom_thumb = '';
				if(!has_post_thumbnail($next_post->ID)) $custom_thumb='custom_thumb';
			?>
            <h3 class="title14 text-right">
				<a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>" class="next-post <?php echo esc_attr($custom_thumb)?>"> 
					<span class="color"><?php echo esc_html($next_post->post_title)?></span>
					<span class="nav-text nav-text-next">Next Post<i class="fa fa-angle-right"></i></span>
					<?php
						echo get_the_post_thumbnail($next_post->ID);
					?>
				</a>
			</h3>
            <?php endif;?>
		</div>
	</div>
</div>
<?php endif;?>