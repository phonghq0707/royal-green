<?php
if(empty($size)) $size = array(420,280);
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post item-post-default item-post-style6 table">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
    </div>
	<div class="post-info">
		<?php s7upf_cate_link();?>
        <h3 class="title18 post-title font-bold black"><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php the_title()?></a></h3>
		<?php if($excerpt) echo '<p class="desc">'.s7upf_substr(get_the_excerpt(),0,(int)$excerpt).'</p>';?>
		<ul class="list-inline-block box-author">
			<li class="title12 silver"><?php echo esc_html__('By:','fattoria')?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="silver"><?php echo get_the_author(); ?></a></li>
			<li>
				<a href="#" class="comment">
					<i class="la la-comments-o"></i>
					<span class="silver title12"><?php echo get_comments_number() ?></span>
				</a>
			</li>
		</ul>
	</div>
</div>
<?php if(isset($column)):?></div><?php endif;?>