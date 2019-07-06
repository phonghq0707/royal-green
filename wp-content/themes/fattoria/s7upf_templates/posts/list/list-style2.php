<?php
if(empty($size_list)) $size_list = array(400,400);
$c_class = 'col-md-6 col-sm-6 col-xs-12';
if(!has_post_thumbnail()) $c_class = 'col-md-12 col-sm-12 col-xs-12';
global $post;
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="item-post item-post-list item-style2">
        <div class="row">
            <?php if(has_post_thumbnail()):?>
                <div class="<?php echo esc_attr($c_class)?>">
                    <div class="post-thumb banner-advs zoom-image overlay-image">
                        <a href="<?php echo esc_url(get_the_permalink())?>" class="adv-thumb-link">
                            <?php echo get_the_post_thumbnail(get_the_ID(),$size_list)?>
                        </a>
                    </div>
                </div>
            <?php endif;?>
            <div class="<?php echo esc_attr($c_class)?>">
                <div class="post-info">
                    <h3 class="title36 post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title()?></a></h3>
                    <?php if(has_excerpt() || !empty($post->post_content)):?><p class="desc"><?php echo get_the_excerpt();?></p><?php endif;?>
                    <?php s7upf_display_metabox();?>
                    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="readmore"><?php esc_html_e("Read more","fattoria")?></a>
                </div>
            </div>
        </div>
    </div>
</div>