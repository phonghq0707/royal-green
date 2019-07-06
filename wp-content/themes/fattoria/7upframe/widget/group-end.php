<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 24/12/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_Group_End'))
{
    class S7upf_Group_End extends WP_Widget {


        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            if(function_exists('s7upf_reg_widget')) s7upf_reg_widget( 'S7upf_Group_End' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('Group end','fattoria'),
                array( 'description' => esc_html__( 'End a Group', 'fattoria' ), ));

            $this->default=array();
        }



        function widget( $args, $instance ) {
            // Widget output
            echo '</div>';
        }

        function update( $new_instance, $old_instance ) {}

        function form( $instance ) {}
    }

    S7upf_Group_End::_init();

}
