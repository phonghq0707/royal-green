<?php 
if(!empty($src_video)):
?>
<div class="show-video-popup text-center <?php echo esc_attr($el_class);?>">
	<div class="intro-video-popup"><a href="<?php echo esc_url($link);?>"><?php echo wp_get_attachment_image($image,'full');?></a></div>
	<a href="<?php echo esc_url($src_video);?>" class="title48 bg-white btn-play-video fancybox fancybox-media"><i class="color font-bold la la-play"></i></a>
</div>
<?php endif;	