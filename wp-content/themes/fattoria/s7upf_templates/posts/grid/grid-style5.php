<?php
if(empty($size)) $size = 'full';
?>
<?php if(isset($column)):?><div class="list-col-item list-<?php echo esc_attr($column)?>-item"><?php endif;?>
<div class="item-post item-post-default item-post-style5">
    <div class="post-thumb banner-advs zoom-image overlay-image">
        <a href="<?php echo esc_url(get_the_permalink()) ?>" class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),$size);?>
        </a>
    </div>
	<div class="post-info">
		<?php s7upf_cate_link('post');?>
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
		<?php 
		$tags = get_the_tag_list(' ',' ',' ');
		if(!empty($tags)):
		?>
		<div class="post-list-tags">
			<span class="color"><i class="la la-tag"></i></span>
			<?php 
				if($tags):?>
					<?php $tags = get_the_tag_list(' ',' ',' ');?>
					<?php if($tags) echo apply_filters('s7upf_output_content',$tags); else esc_html_e("No Tag",'fattoria');?>
			<?php endif;?>
		</div>
		<?php endif;?>
		<div class="social-post-box">
			<ul class="list-inline-block">
				<li><a href="<?php echo esc_url('https://plus.google.com/share?url='.get_the_permalink())?>"><i class="la la-google-plus"></i></a></li>
				<li><a href="<?php echo esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.wp_get_attachment_url(get_post_thumbnail_id()))?>"><i class="la la-pinterest"></i></a></li>
				<li><a href="<?php echo esc_url('http://www.twitter.com/share?url='.get_the_permalink()) ?>"><i class="la la-twitter-square"></i></a></li>
				<li><a href="<?php echo esc_url('http://www.instagram.com/share?url='.get_the_permalink())?>"><i class="la la-instagram"></i></a></li>
			</ul>
		</div>
		 <a href="<?php echo esc_url(get_the_permalink()); ?>" class="shop-button bg-color2 black"><?php esc_html_e("Read more","fattoria")?></a>
	</div>
</div>
<?php if(isset($column)):?></div><?php endif;?>