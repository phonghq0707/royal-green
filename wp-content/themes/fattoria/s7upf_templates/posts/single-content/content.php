<?php
$data = '';
global $post;
if(empty($size)) $size = 'full';
$s7upf_image_blog = get_post_meta(get_the_ID(), 'format_image', true);
if($check_thumb == 'on'){
    if(!empty($s7upf_image_blog)){
        $data .='<div class="single-post-thumb banner-advs">
                    <img alt="'.esc_attr($post->post_name).'" title="'.esc_attr($post->post_name).'" src="' . esc_url($s7upf_image_blog) . '"/>
                </div>';
    }
    else{
        if (has_post_thumbnail()) {
            $data .= '<div class="single-post-thumb banner-advs">
                        '.get_the_post_thumbnail(get_the_ID(),$size).'                
                    </div>';
        }
    }
}
?>
<div class="content-single-blog <?php echo (is_sticky()) ? 'sticky':''?>">
    <?php if(!empty($data)) echo apply_filters('s7upf_output_content',$data);?>
    <div class="content-post-default">
        <h2 class="title36 font-bold black">
            <?php the_title()?>
            <?php echo (is_sticky()) ? '<i class="fa fa-star"></i>':''?>
        </h2>
		<ul class="list-inline-block box-author">
			<li class="title12 silver">By: <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="silver"><?php echo get_the_author(); ?></a></li>
			<li>
				<a href="<?php echo esc_url( get_comments_link() ); ?>" class="comment">
					<i class="la la-comments-o"></i>
					<span class="silver title12"><?php echo get_comments_number(); ?></span>
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
        <div class="detail-content-wrap clearfix"><?php the_content(); ?></div>
    </div>
</div>