<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_List_Posts_Widget'))
{
    class S7upf_List_Posts_Widget extends WP_Widget {


        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            if(function_exists('s7upf_reg_widget')) s7upf_reg_widget( 'S7upf_List_Posts_Widget' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('7UP Posts','fattoria'),
                        array( 
                            'description' => esc_html__( 'Get posts widget', 'fattoria' ),
                            'classname'   => 'widget-post',
                        )
                    );

            $this->default=array(
                'title'             =>esc_html__('List Posts','fattoria'),
                'style'             => '',
                'posts_per_page'    =>5,
                'category_name'      =>'',
                'order'             =>'desc',
                'order_by'          =>'date',
                'post__in'          => '',
                'post__not_in'      => '',
                'el_class'          => '',
            );
        }



        function widget( $args, $instance ) {
            // Widget output
           echo balancetags($args['before_widget']);
            if ( ! empty( $instance['title'] ) ) {
               echo balancetags($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
            }

            $instance=wp_parse_args($instance,$this->default);
            extract($instance);
            $args_post = array(
                'post_type'         => 'post',
                'posts_per_page'    => $posts_per_page,
                'orderby'           => $order_by,
                'order'             => $order,
            );
            if($order_by == 'post_views'){
                $args_post['orderby'] = 'meta_value_num';
                $args_post['meta_key'] = 'post_views';
            }   
            if(!empty($category_name)){
                $args_post['category_name'] = $category_name;
            }
            $html = '';
            $post_query = new WP_Query($args_post);

            switch ($style) {
                case 'slider':
                    $html .= '<div class="widget-content wrap-item smart-slider '.esc_attr($el_class).'" data-item="1" data-speed="" data-itemres="" data-prev="" data-next="" data-pagination="" data-navigation="navi-nav-style">';
                    if($post_query->have_posts()) {
                        while($post_query->have_posts()) {
                            $post_query->the_post();
                            $html .=    '<div class="item">
                                            <div class="post-thumb banner-advs overlay-image">
                                                <a href="'.esc_url(get_the_permalink()).'" class="adv-thumb-link">
                                                    '.get_the_post_thumbnail(get_the_ID(),array(100,80)).'
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h3 class="post-title title14 text-center"><a href="'.esc_url(get_the_permalink()).'" title="'.esc_attr(get_the_title()).'">'.get_the_title().'</a></h3>
                                                <ul class="post-date-comment text-center">
                                                    <li class="post-date"><span>'.get_the_date().'</span></li>
                                                    <li class="post-comment"><i class="fa fa-comment-o" aria-hidden="true"></i><a href="'.esc_url( get_comments_link() ).'">'.get_comments_number().' '.esc_html__("Comments","fattoria").' </a></li>
                                                </ul>
                                            </div>
                                        </div>';
                        }
                    }
                    $html .= '</div>';


                    break;
                
                default:
                    $html .=    '<div class="widget-content '.esc_attr($el_class).'">
                                <ul class="list-none flex">';
                    if($post_query->have_posts()) {
                        while($post_query->have_posts()) {
                            $post_query->the_post();
                            $html .=    '<li>
                                            <div class="post-thumb banner-advs zoom-image overlay-image">
                                                <a href="'.esc_url(get_the_permalink()).'" class="adv-thumb-link">
                                                    '.get_the_post_thumbnail(get_the_ID(),array(100,80)).'
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <div class="title12 font-medium"><a class="silver" href="'.get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')).'">'.get_the_date().'</a></div>
                                                <h3 class="post-title title14 font-bold noto-font"><a class="black" href="'.esc_url(get_the_permalink()).'" title="'.esc_attr(get_the_title()).'">'.get_the_title().'</a></h3>
                                            </div>
                                        </li>';
                        }
                    }
                    $html .=        '</ul>
                                </div>';
                    break;
                }

            
            wp_reset_postdata();
            echo balancetags($html);
            echo balancetags($args['after_widget']);
        }

        function update( $new_instance, $old_instance ) {

            // Save widget options
            $instance=array();
            $instance=wp_parse_args($instance,$this->default);
            $new_instance=wp_parse_args($new_instance,$instance);

            return $new_instance;
        }

        function form( $instance ) {
            // Output admin widget options form

            $instance=wp_parse_args($instance,$this->default);

            extract($instance);

            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php esc_html_e( 'Style:' ,'fattoria'); ?></label>

                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>">
                    <option <?php selected('',$style) ?> value="list-brand"><?php esc_html_e("List","fattoria")?></option>
                    <option <?php selected('slider',$style) ?> value="slider"><?php esc_html_e("Slider","fattoria")?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'el_class' )); ?>"><?php esc_html_e( 'Class:' ,'fattoria'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'el_class' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'el_class' )); ?>" type="text" value="<?php echo esc_attr( $el_class ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ,'fattoria'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>"><?php esc_html_e( 'Post Number:' ,'fattoria'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_per_page' )); ?>" type="text" value="<?php echo esc_attr( $posts_per_page ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>"><?php esc_html_e( 'Order By:' ,'fattoria'); ?></label>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_by' )); ?>">
                    <option <?php selected('none',$order_by) ?> value="none"><?php esc_html_e("None","fattoria")?>
                    <option <?php selected('ID',$order_by) ?> value="ID"><?php esc_html_e("ID","fattoria")?>
                    <option <?php selected('author',$order_by) ?> value="author"><?php esc_html_e("Author","fattoria")?>
                    <option <?php selected('title',$order_by) ?> value="title"><?php esc_html_e("Title","fattoria")?>
                    <option <?php selected('name',$order_by) ?> value="name"><?php esc_html_e("Name","fattoria")?>
                    <option <?php selected('date',$order_by) ?> value="date"><?php esc_html_e("Date","fattoria")?>
                    <option <?php selected('modified',$order_by) ?> value="modified"><?php esc_html_e("Last Modified Date","fattoria")?>
                    <option <?php selected('parent',$order_by) ?> value="parent"><?php esc_html_e("Post Parent","fattoria")?>
                    <option <?php selected('post_views',$order_by) ?> value="post_views"><?php esc_html_e("Post Views","fattoria")?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order' )); ?>"><?php esc_html_e( 'Order:' ,'fattoria'); ?></label>

                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order' )); ?>">
                    <option <?php selected('desc',$order) ?> value="desc"><?php esc_html_e("DESC","fattoria")?>
                    </option><option <?php selected('asc',$order) ?> value="asc"><?php esc_html_e("ASC","fattoria")?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'category_name' )); ?>"><?php esc_html_e( 'Category:' ,'fattoria'); ?></label>

                <select id="<?php echo esc_attr($this->get_field_id('category_name')); ?>" name="<?php echo esc_attr($this->get_field_name('category_name')); ?>" class="widefat">
                    <option value="0" selected><?php echo esc_html( 'Select' ); ?></option>
                    <?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>
                    <option <?php selected( $instance['category_name'], $term->slug ); ?> value="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></option>
                    <?php } ?>      
                </select>
            </p>



        <?php
        }
    }

    S7upf_List_Posts_Widget::_init();

}
