<?php
if(empty($size_list)) $size_list = 'full';
global $post;
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="item-post item-post-large item-default">
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php if(has_post_thumbnail()):?>
					<div class="post-thumb banner-advs zoom-image overlay-image">
						<a href="<?php echo esc_url(get_the_permalink())?>" class="adv-thumb-link">
							<?php echo get_the_post_thumbnail(get_the_ID(),$size_list)?>
						</a>
					</div>
				<?php endif;?>
				<div class="list-info-title">
					<?php
						$post_title=get_the_title();
						if(!empty($post_title)):
						?>
						<h3 class="title36 post-title">
							<a href="<?php echo esc_url(get_the_permalink()); ?>">
								<?php echo esc_html($post_title); ?>
								<?php echo (is_sticky()) ? '<i class="fa fa-star"></i>':''?>
							</a>
						</h3>
						<?php
						endif;
					?>
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
				</div>
			</div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="post-info">
                    <?php if(has_excerpt() || !empty($post->post_content)):?><p class="desc"><?php echo get_the_excerpt();?></p><?php endif;?>
                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="shop-button color2"><?php esc_html_e("Read more","fattoria")?></a>
                </div>
            </div>
        </div>
    </div>
</div>