<?php
if(empty($size)) $size = array(420,280);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post item-post-default item-post-style3">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
    </div>
	<div class="post-info">
		<?php s7upf_cate_link();?>
        <h3 class="title18 post-title font-bold black"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
		<?php if($excerpt) echo '<p class="desc">'.s7upf_substr(get_the_excerpt(),0,60).'</p>';?>
		 <a href="<?php echo esc_url(get_the_permalink()); ?>" class="shop-button color2"><?php esc_html_e("Read more","fattoria")?></a>
	</div>
</div>
<?php if(isset($column)):?></div><?php endif;?>