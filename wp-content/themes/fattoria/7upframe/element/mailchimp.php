<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/12/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_mailchimp') && class_exists('MC4WP_MailChimp')){
    function s7upf_vc_mailchimp($attr){
        $html = '';
        $data_array = array_merge(array(
            'style'         => '',
            'title'         => '',
            'des'           => '',
            'image'         => '',
            'placeholder'   => '',
            'submit'        => '',
            'form_id'       => '',
            'el_class'      => '',
            'custom_css'    => '',
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;        

        // Variable process
        $el_class .= ' '.$style;
        $form_html = apply_filters('s7upf_mailchimp_form',do_shortcode('[mc4wp_form id="'.$form_id.'"]'));

        // Add variable to data
        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
            'form_html' => $form_html,
            ));

        // Call function get template
        $html = s7upf_get_template_element('mailchimp/mailchimp',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_mailchimp','s7upf_vc_mailchimp');

vc_map( array(
    "name"          => esc_html__("MailChimp", 'fattoria'),
    "base"          => "s7upf_mailchimp",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'fattoria'),
    "description"   => esc_html__( 'Display mailchimp form', 'fattoria' ),
    "params"        => array(
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'fattoria'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'fattoria')         => '',
                esc_html__("Popup",'fattoria')         => 'popup',
            ),
            "description"   => esc_html__( 'Choose a style to display.', 'fattoria' )
        ),
        array(
            "type"          => "attach_image",
            "heading"       => esc_html__("Image",'fattoria'),
            "param_name"    => "image",
            "dependency"    =>  array(
                "element"       => "style",
                "value"         => "popup",
            ),
            "description"   => esc_html__( 'Choose a image from media.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Form ID",'fattoria'),
            "param_name"    => "form_id",
            "description"   => esc_html__( 'Enter mailchimp form ID.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "admin_label"   => true,
            "heading"       => esc_html__("Title",'fattoria'),
            "param_name"    => "title",
            "description"   => esc_html__( 'Enter title of element.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Description",'fattoria'),
            "param_name"    => "des",
            "description"   => esc_html__( 'Enter description of element.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Placeholder Input",'fattoria'),
            "param_name"    => "placeholder",
            "description"   => esc_html__( 'Enter placeholder of input email. Default is value of mailchimp form.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Submit Label",'fattoria'),
            "param_name"    => "submit",
            "description"   => esc_html__( 'Enter label for submit button. Default is value of mailchimp form.', 'fattoria' )
        ),        
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Extra class name",'fattoria'),
            "param_name"    => "el_class",
            'group'         => esc_html__('Design Options','fattoria'),
            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fattoria' )
        ),
        array(
            "type"          => "css_editor",
            "heading"       => esc_html__("CSS box",'fattoria'),
            "param_name"    => "custom_css",
            'group'         => esc_html__('Design Options','fattoria')
        ),
    )
));