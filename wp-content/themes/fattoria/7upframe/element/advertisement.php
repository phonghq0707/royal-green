<?php
/**
 * Created by Sublime text 2.
 * User: thanhhiep992
 * Date: 26/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_advertisement'))
{
    function s7upf_vc_advertisement($attr,$content = false)
    {
        $html = $css_class = $css_class2 = '';
        $data_array = array_merge(array(
            'style'         => '',
            'image'         => '',
            'image2'        => '',
            'link'          => '',
            'animation'     => '',
            'el_class'      => '',
            'el_class2'     => '',
            'custom_css'    => '',
            'custom_css2'   => '',
            'size'          => '',
            'content'       => $content,
        ),s7upf_get_responsive_default_atts());
        $attr = shortcode_atts($data_array,$attr);
        extract($attr);
        $css_classes = vc_shortcode_custom_css_class( $custom_css );
        $css_class = preg_replace( '/\s+/', ' ', apply_filters( 'vc_shortcodes_css_class', $css_classes, '', $attr ) );
        
        // Variable process vc_shortcodes_css_class
        if(!empty($css_class)) $el_class .= ' '.$css_class;
        
        $el_class .= ' '.$style.' '.$animation;
        if(!empty($custom_css2)) $el_class2 .= ' '.vc_shortcode_custom_css_class( $custom_css2 );
        if(!empty($size)) $size = explode('x', $size);
        else $size = 'full';
        $attr = array_merge($attr,array(
            'el_class'  => $el_class,
            'el_class2' => $el_class2,
            'size'      => $size,
            ));

        $html = s7upf_get_template_element('advertisement/advertisement',$style,$attr);

        return $html;
    }
}

stp_reg_shortcode('s7upf_advertisement','s7upf_vc_advertisement');

vc_map( array(
    "name"          => esc_html__("Advertisement", 'fattoria'),
    "base"          => "s7upf_advertisement",
    "icon"          => "icon-st",
    "category"      => esc_html__("7UP-Elements", 'fattoria'),
    "description"   => esc_html__( 'Display a advertisement', 'fattoria' ),
    "params"        => array(        
        array(
            "type"          => "textarea_html",
            "holder"        => "div",
            "heading"       => esc_html__("Content Info",'fattoria'),
            "param_name"    => "content",
            "description"   => esc_html__( 'Enter info content of element.', 'fattoria' )
        ),
        array(
            "type"          => "dropdown",
            "admin_label"   => true,
            "heading"       => esc_html__("Style",'fattoria'),
            "param_name"    => "style",
            "value"         => array(
                esc_html__("Default",'fattoria')   => '',
                esc_html__("About",'fattoria')   => 'about',
                esc_html__("Gallery",'fattoria')   => 'gallery',
                esc_html__("Organic",'fattoria')   => 'organic',
            ),
            "description"   => esc_html__( 'Choose menu style to display.', 'fattoria' )
        ),
        array(
            "type"          => "attach_image",
            "admin_label"   => true,
            "heading"       => esc_html__("Image",'fattoria'),
            "param_name"    => "image",
            "description"   => esc_html__( 'Select image from media library.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Link",'fattoria'),
            "param_name"    => "link",
            "description"   => esc_html__( 'Enter URL redirect when click to image.', 'fattoria' )
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Animation",'fattoria'),
            "param_name"    => "animation",
            "value"         => array(
                esc_html__("Default",'fattoria')                    => '',
                esc_html__("Zoom",'fattoria')                       => 'zoom-image',
                esc_html__("Zoom out",'fattoria')                   => 'zoom-out',
                esc_html__("Zoom out Overlay",'fattoria')           => 'zoom-out overlay-image',
                esc_html__("Fade out-in",'fattoria')                => 'fade-out-in',
                esc_html__("Zoom Fade out-in",'fattoria')           => 'zoom-image fade-out-in',
                esc_html__("Fade in-out",'fattoria')                => 'fade-in-out',
                esc_html__("Zoom rotate",'fattoria')                => 'zoom-rotate',
                esc_html__("Zoom rotate Fade out-in",'fattoria')    => 'zoom-rotate fade-out-in',
                esc_html__("Overlay",'fattoria')                    => 'overlay-image',
                esc_html__("Overlay Zoom",'fattoria')               => 'overlay-image zoom-image',
                esc_html__("Zoom image line",'fattoria')            => 'zoom-image line-scale',
                esc_html__("Gray image",'fattoria')                 => 'gray-image',
                esc_html__("Gray image line",'fattoria')            => 'gray-image line-scale',
                esc_html__("Pull curtain",'fattoria')               => 'pull-curtain',
                esc_html__("Pull curtain gray image",'fattoria')    => 'pull-curtain gray-image',
                esc_html__("Pull curtain zoom image",'fattoria')    => 'pull-curtain zoom-image',
            ),
            "description"   => esc_html__( 'Select type of animation for image.', 'fattoria' )
        ),
        array(
            "type"          => "attach_image",
            "heading"       => esc_html__("Image fade",'fattoria'),
            "param_name"    => "image2",
            "dependency"    => array(
                "element"       => "animation",
                "value"     => array("zoom-out","zoom-out overlay-image"),
            ),
            "description"   => esc_html__( 'Select image from media library.', 'fattoria' )
        ),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Image custom size",'fattoria'),
            "param_name"    => "size",
            'description'   => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'fattoria' ),
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
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Extra class name",'fattoria'),
            "param_name"    => "el_class2",
            'group'         => esc_html__('Design Info Box','fattoria'),
            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'fattoria' )
        ),
        array(
            "type"          => "css_editor",
            "heading"       => esc_html__("CSS box",'fattoria'),
            "param_name"    => "custom_css2",
            'group'         => esc_html__('Design Info Box','fattoria')
        ),
    )
));