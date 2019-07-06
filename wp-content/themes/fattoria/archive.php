<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package 7up-framework
 */

get_header();
?>
<?php do_action('s7upf_before_main_content')?>
<div id="main-content" class="main-page-default">
    <div class="container">
        <div class="row">
            <?php s7upf_output_sidebar('left')?>
            <div class="<?php echo esc_attr(s7upf_get_main_class()); ?>">
                <?php 
                $style          = s7upf_get_option('blog_default_style','list');
                $grid_type      = s7upf_get_option('post_grid_type');
                $item_style     = s7upf_get_option('post_grid_item_style');
                $item_style_list= s7upf_get_option('post_list_item_style');
                $excerpt        = s7upf_get_option('post_grid_excerpt',80);
                $blog_style     = s7upf_get_option('blog_style');
                $column         = s7upf_get_option('post_grid_column');
                $size           = s7upf_get_option('post_grid_size');
                $size_list      = s7upf_get_option('post_list_size');
                $number         = get_option('posts_per_page');
                $check_number   = s7upf_get_option('blog_number_filter');
                $check_type     = s7upf_get_option('blog_type_filter');
                if(isset($_GET['number'])) $number = $_GET['number'];
                if(isset($_GET['type'])) $style = $_GET['type'];
                $size = s7upf_get_size_crop($size);
                $size_list = s7upf_get_size_crop($size_list);
                $slug = $item_style;
                if($style == 'list') $slug = $item_style_list;
                $attr = array(
                    'style'         => $style,
                    'item_style'    => $item_style,
                    'excerpt'       => $excerpt,
                    'column'        => $column,
                    'size'          => $size,
                    'size_list'     => $size_list,
                    'number'        => $number,
                    );
                $max_page = $GLOBALS['wp_query']->max_num_pages;
                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => $number,
                    'order'             => 'DESC',
                    'paged'             => $paged,
                );
                $curent_query = $GLOBALS['wp_query']->query;
                if(is_array($curent_query)) $args = array_merge($args,$curent_query);
                s7upf_get_template('top-filter','',array('style'=>$style,'number'=>$number,'check_number'=>$check_number,'check_type'=>$check_type),true);
                ?>

                <div class="js-content-wrap blog-<?php echo esc_attr($style.'-view '.$grid_type)?>">
                    <?php if(have_posts()):?>
                        <div class="js-content-main list-post-wrap row">
                        
                            <?php while (have_posts()) :the_post();?>

                                <?php s7upf_get_template_post($style.'/'.$style,$slug,$attr,true);?>

                            <?php endwhile;?>

                        </div>
                        
                        <?php 
                        if($blog_style == 'load-more' && $max_page > 1){
                            $data_load = array(
                                "args"        => $args,
                                "attr"        => $attr,
                                );
                            $data_loadjs = json_encode($data_load);
                            echo    '<div class="btn-loadmore">
                                        <a href="#" class="blog-loadmore loadmore shop-button color2" 
                                            data-load="'.esc_attr($data_loadjs).'" data-paged="1" 
                                            data-maxpage="'.esc_attr($max_page).'">
                                            '.esc_html__("Load more","fattoria").'
                                        </a>
                                    </div>';
                        }
                        else s7upf_paging_nav(); 
                        ?>

                    <?php else : ?>

                        <?php echo s7upf_get_template_post( 'content' , 'none' ); ?>

                    <?php endif;?>

                </div>
            </div>
        <?php s7upf_output_sidebar('right')?>
        </div>
    </div>
</div>
<?php do_action('s7upf_after_main_content')?>
<?php get_footer(); ?>
