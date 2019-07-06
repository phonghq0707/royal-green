<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */

add_action('admin_init', 's7upf_custom_meta_boxes');
if(!function_exists('s7upf_custom_meta_boxes')){
    function s7upf_custom_meta_boxes(){
        //Format content
        $format_metabox = array(
            'id'        => 'block_format_content',
            'title'     => esc_html__('Format Settings', 'fattoria'),
            'desc'      => '',
            'pages'     => array('post'),
            'context'   => 'normal',
            'priority'  => 'high',
            'fields'    => array(                
                array(
                    'id'        => 'format_image',
                    'label'     => esc_html__('Upload Image', 'fattoria'),
                    'type'      => 'upload',
                    'desc'      => esc_html__('Choose image from media.','fattoria'),
                ),
                array(
                    'id'        => 'format_gallery',
                    'label'     => esc_html__('Add Gallery', 'fattoria'),
                    'type'      => 'Gallery',
                    'desc'      => esc_html__('Choose images from media.','fattoria'),
                ),
                array(
                    'id'        => 'format_media',
                    'label'     => esc_html__('Link Media', 'fattoria'),
                    'type'      => 'text',
                    'desc'      => esc_html__('Enter media url(Youtube, Vimeo, SoundCloud ...).','fattoria'),
                )
            ),
        );
        // SideBar
        $page_settings = array(
            'id'        => 's7upf_sidebar_option',
            'title'     => esc_html__('Page Settings','fattoria'),
            'pages'     => array( 'page','post','product'),
            'context'   => 'normal',
            'priority'  => 'low',
            'fields'    => array(
                // General tab
                array(
                    'id'        => 'page_general',
                    'type'      => 'tab',
                    'label'     => esc_html__('General Settings','fattoria')
                ),
                array(
                    'id'        => 's7upf_header_page',
                    'label'     => esc_html__('Choose page header','fattoria'),
                    'type'      => 'select',
                    'choices'   => s7upf_list_post_type('s7upf_header'),
                    'desc'      => esc_html__('Include Header content. Go to Header page in admin menu to edit/create header content. Default is value of Theme Option.','fattoria'),
                ),
                array(
                    'id'         => 's7upf_footer_page',
                    'label'      => esc_html__('Choose page footer','fattoria'),
                    'type'       => 'select',
                    'choices'    => s7upf_list_post_type('s7upf_footer'),
                    'desc'       => esc_html__('Include Footer content. Go to Footer page in admin menu to edit/create footer content. Default is value of Theme Option.','fattoria'),
                ),
                array(
                    'id'         => 's7upf_sidebar_position',
                    'label'      => esc_html__('Sidebar position ','fattoria'),
                    'type'       => 'select',
                    'choices'    => array(
                        array(
                            'label' => esc_html__('--Select--','fattoria'),
                            'value' => '',
                        ),
                        array(
                            'label' => esc_html__('No Sidebar','fattoria'),
                            'value' => 'no'
                        ),
                        array(
                            'label' => esc_html__('Left sidebar','fattoria'),
                            'value' => 'left'
                        ),
                        array(
                            'label' => esc_html__('Right sidebar','fattoria'),
                            'value' => 'right'
                        ),
                    ),
                    'desc'      => esc_html__('Choose sidebar position for current page/post(Left,Right or No Sidebar).','fattoria'),
                ),
                array(
                    'id'        => 's7upf_select_sidebar',
                    'label'     => esc_html__('Selects sidebar','fattoria'),
                    'type'      => 'sidebar-select',
                    'condition' => 's7upf_sidebar_position:not(no),s7upf_sidebar_position:not()',
                    'desc'      => esc_html__('Choose a sidebar to display.','fattoria'),
                ),
                array(
                    'id'          => 'before_append',
                    'label'       => esc_html__('Append content before','fattoria'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','fattoria'),
                ),
                array(
                    'id'          => 'after_append',
                    'label'       => esc_html__('Append content after','fattoria'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','fattoria'),
                ),
                array(
                    'id'          => 'show_title_page',
                    'label'       => esc_html__('Show title', 'fattoria'),
                    'type'        => 'on-off',
                    'std'         => 'on',
                    'desc'        => esc_html__('Show/hide title of page.','fattoria'),
                ),
                array(
                    'id'        => 's7upf_show_breadrumb',
                    'label'     => esc_html__('Show BreadCrumb', 'fattoria'),
                    'desc'      => esc_html__('This allow you to show or hide BreadCrumb', 'fattoria'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'on'
                ),
                array(
                    'id'          => 's7upf_bg_breadcrumb',
                    'label'       => esc_html__('Background Breadcrumb','fattoria'),
                    'type'        => 'background',
                    'desc'        => esc_html__( 'Custom background for breadcrumb.', 'fattoria' ),
                ),
                array(
                    'id' => 'post_single_page_share',
                    'label' => esc_html__('Show Share Box', 'fattoria'),
                    'type' => 'select',
                    'std'   => '',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('--Theme Option--','fattoria'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','fattoria'),
                            'value'=>'on'
                        ),
                        array(
                            'label'=>esc_html__('Off','fattoria'),
                            'value'=>'off'
                        ),
                    ),
                    'desc'        => esc_html__( 'You can show/hide share box independent on this page. ', 'fattoria' ),
                ),
                // End general tab
                // Custom color
                array(
                    'id'        => 'page_color',
                    'type'      => 'tab',
                    'label'     => esc_html__('Custom color','fattoria')
                ),
                array(
                    'id'          => 'body_bg',
                    'label'       => esc_html__('Body Background','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'desc'        => esc_html__( 'Change body background of page.', 'fattoria' ),
                ),
                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'desc'        => esc_html__( 'Change main color of this page.', 'fattoria' ),
                ),
                array(
                    'id'          => 'main_color2',
                    'label'       => esc_html__('Main color 2','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'desc'        => esc_html__( 'Change main color 2 of this page.', 'fattoria' ),
                ),
                // End Custom color
                // Display & Style tab
                array(
                    'id'        => 'page_layout',
                    'type'      => 'tab',
                    'label'     => esc_html__('Display & Style','fattoria')
                ),
                array(
                    'id'          => 's7upf_page_style',
                    'label'       => esc_html__('Page Style','fattoria'),
                    'type'        => 'select',
                    'std'         => '',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Default','fattoria'),
                            'value' =>  '',
                        ),
                        array(
                            'label' =>  esc_html__('Page boxed','fattoria'),
                            'value' =>  'page-content-box'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for page.', 'fattoria' ),
                ),
                array(
                    'id'          => 'container_width',
                    'label'       => esc_html__('Custom container width(px)','fattoria'),
                    'type'        => 'text',
                    'desc'        => esc_html__( 'You can custom width of page container. Default is 1200px.', 'fattoria' ),
                ),                
                
                // End Display & Style tab               
            )
        );
        
        $product_settings = array(
            'id' => 'block_product_settings',
            'title' => esc_html__('Product Settings', 'fattoria'),
            'desc' => '',
            'pages' => array('product'),
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(    
                // Begin Product Settings
                array(
                    'id'        => 'block_product_custom_tab',
                    'type'      => 'tab',
                    'label'     => esc_html__('General Settings','fattoria')
                ),             
                array(
                    'id'          => 'before_append_tab',
                    'label'       => esc_html__('Append content before product tab','fattoria'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','fattoria'),
                ),
                array(
                    'id'          => 'after_append_tab',
                    'label'       => esc_html__('Append content after product tab','fattoria'),
                    'type'        => 'select',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','fattoria'),
                ),
				array(
                    'id'          => 'style_product_detail',
                    'label'       => esc_html__('Product Detail Style','fattoria'),
                    'type'        => 'select',
                    'desc'        => esc_html__('Choose a style to display product detail','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=> '',
                            'label'=> esc_html__("Default", 'fattoria'),
                        ),
                        array(
                            'value'=> 'style2',
                            'label'=> esc_html__("Style 2", 'fattoria'),
                        ),
						array(
                            'value'=> 'style3',
                            'label'=> esc_html__("Style 3", 'fattoria'),
                        ),
						
                    )
                ),
                array(
                    'id'          => 'product_tab_detail',
                    'label'       => esc_html__('Product Tab Style','fattoria'),
                    'type'        => 'select',
                    'choices'     => array(                                                    
                        array(
                            'value'=> '',
                            'label'=> esc_html__("Normal", 'fattoria'),
                        ),
                        array(
                            'value'=> 'tab-style2',
                            'label'=> esc_html__("Tab style 2", 'fattoria'),
                        ),
                    )
                ),
				array(
                    'id'          => 'product_image_zoom',
                    'label'       => esc_html__('Image zoom','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('None','fattoria'),
                        ),
                        array(
                            'value'=>'zoom-style1',
                            'label'=>esc_html__('Zoom 1','fattoria'),
                        ),
                        array(
                            'value'=>'zoom-style2',
                            'label'=>esc_html__('Zoom 2','fattoria'),
                        ),
                        array(
                            'value'=>'zoom-style3',
                            'label'=>esc_html__('Zoom 3','fattoria'),
                        ),
                        array(
                            'value'=>'zoom-style4',
                            'label'=>esc_html__('Zoom 4','fattoria'),
                        )
                    )
                ),
				array(
                    'id'          => 'product_date',
                    'label'       => esc_html__('Date Countdown','fattoria'),
                    'type'        => 'text',
					'desc'		  => esc_html__('Enter the desired date of the form yyyy/ mm / dd.','fattoria'),
                ),
                array(
                    'id'          => 's7upf_product_tab_data',
                    'label'       => esc_html__('Add Custom Tab','fattoria'),
                    'type'        => 'list-item',
                    'settings'    => array(
                        array(
                            'id' => 'tab_content',
                            'label' => esc_html__('Content', 'fattoria'),
                            'type' => 'textarea',
                        ),
                        array(
                            'id'            => 'priority',
                            'label'         => esc_html__('Priority (Default 40)', 'fattoria'),
                            'type'          => 'numeric-slider',
                            'min_max_step'  => '1,50,1',
                            'std'           => '40',
                            'desc'          => esc_html__('Choose priority value to re-order custom tab position.','fattoria'),
                        ),
                    )
                ),
            ),
        );
        $product_type = array(
            'id' => 'product_trendding',
            'title' => esc_html__('Product Type', 'fattoria'),
            'desc' => '',
            'pages' => array('product'),
            'context' => 'side',
            'priority' => 'low',
            'fields' => array(                
                array(
                    'id'    => 'trending_product',
                    'label' => esc_html__('Product Trending', 'fattoria'),
                    'type'        => 'on-off',
                    'std'         => 'off',
                    'desc'        => esc_html__( 'Set trending for current product.', 'fattoria' ),
                ),
                array(
                    'id'    => 'product_thumb_hover',
                    'label' => esc_html__('Product hover image', 'fattoria'),
                    'type'  => 'upload',
                    'desc'        => esc_html__( 'Product thumbnail 2. Some hover animation of thumbnail show back image. Default return main product thumbnail.', 'fattoria' ),
                ),
            ),
        );
        if (function_exists('ot_register_meta_box')){
            ot_register_meta_box($format_metabox);
            ot_register_meta_box($page_settings);
            ot_register_meta_box($product_settings);
            ot_register_meta_box($product_type);
        }
    }
}
?>