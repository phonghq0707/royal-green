<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 24/12/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_Category_List') && class_exists("woocommerce"))
{
    class S7upf_Category_List extends WP_Widget {

        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            if(function_exists('s7upf_reg_widget')) s7upf_reg_widget( 'S7upf_Category_List' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('7UP List of Categories','fattoria'),
                array( 'description' => esc_html__( 'Display Custom Taxonomy Terms', 'fattoria' ), ));

            $this->default=array(
                'title'         => '',
                'taxonomy'      => 'category',
                'orderby'       => 'name',
                'order'         => 'asc',
                'show_count'    => '',
                'hierarchical'  => '',
                'hide_empty'    => '',
                'orderby'       => '',
            );
        }

        function widget( $args, $instance ) {
            // Widget output
                echo apply_filters('s7upf_output_content',$args['before_widget']);
                if ( ! empty( $instance['title'] ) ) {
                   echo apply_filters('s7upf_output_content',$args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                }

                $instance=wp_parse_args($instance,$this->default);
                extract($instance);

                $show_count = $instance[ 'show_count' ] ? '1' : '0';
                $hide_empty = $instance[ 'hide_empty' ] ? '0' : '1';

                $wp_list_categories = array(
                  'taxonomy'     => $taxonomy,
                  'show_count'   => $show_count,
                  'hierarchical' => $instance[ 'hierarchical' ],
                  'hide_empty'   => $hide_empty,
                  'orderby'      => $orderby,
                  'order'        => $order, 
                  'title_li'     => esc_html('')
                );
                echo  '<ul class="list-none">';    
                wp_list_categories($wp_list_categories);
                echo  '</ul>';    
                echo apply_filters('s7upf_output_content',$args['after_widget']);
        }

        function update( $new_instance, $old_instance ) {

            $instance[ 'show_count' ] = $new_instance[ 'show_count' ];
            $instance[ 'hierarchical' ] = $new_instance[ 'hierarchical' ];
            $instance[ 'hide_empty' ] = $new_instance[ 'hide_empty' ];

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
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ,'fattoria'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'taxonomy' )); ?>"><?php esc_html_e( 'Select taxonony to display' ,'fattoria'); ?></label>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'taxonomy' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'taxonomy' )); ?>">
                    <option <?php selected('category',$taxonomy) ?> value="category"><?php esc_html_e("Taxonomy of Post","fattoria")?></option>
                    <option <?php selected('product_cat',$taxonomy) ?> value="product_cat"><?php esc_html_e("Taxonomy of Product","fattoria")?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order' )); ?>"><?php esc_html_e( 'Order:' ,'fattoria'); ?></label>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order' )); ?>">
                    <option <?php selected('asc',$order) ?> value="asc"><?php esc_html_e("Ascending","fattoria")?></option>
                    <option <?php selected('desc',$order) ?> value="desc"><?php esc_html_e("Descending","fattoria")?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php esc_html_e( 'Order By:' ,'fattoria'); ?></label>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>">
                    <option <?php selected('id',$orderby) ?> value="id"><?php esc_html_e("ID","fattoria")?></option>
                    <option <?php selected('name',$orderby) ?> value="name"><?php esc_html_e("Name","fattoria")?></option>
                    <option <?php selected('slug',$orderby) ?> value="slug"><?php esc_html_e("Slug","fattoria")?></option>
                    <option <?php selected('count',$orderby) ?> value="count"><?php esc_html_e("Count","fattoria")?></option>
                    <option <?php selected('term_group',$orderby) ?> value="term_group"><?php esc_html_e("Term group","fattoria")?></option>
                </select>
            </p>
            <p>

                <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_count' ], 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_count' )); ?>" /> 
                <label for="<?php echo esc_attr($this->get_field_id( 'show_count' )); ?>"><?php esc_html_e( 'Show post counts ?' ,'fattoria'); ?></label>
            <br>
                <input class="checkbox" type="checkbox" <?php checked( $instance[ 'hierarchical' ], 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'hierarchical' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'hierarchical' )); ?>" /> 
                <label for="<?php echo esc_attr($this->get_field_id( 'hierarchical' )); ?>"><?php esc_html_e( 'Show hierarchy ?' ,'fattoria'); ?></label>
            <br>
                <input class="checkbox" type="checkbox" <?php checked( $instance[ 'hide_empty' ], 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'hide_empty' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'hide_empty' )); ?>" /> 
                <label for="<?php echo esc_attr($this->get_field_id( 'hide_empty' )); ?>"><?php esc_html_e( 'Show empty terms ?' ,'fattoria'); ?></label>
            </p>             
        <?php
        }
    }

    S7upf_Category_List::_init();

}
