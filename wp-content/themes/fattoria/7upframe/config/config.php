<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!function_exists('s7upf_set_theme_config')){
    function s7upf_set_theme_config(){
        global $s7upf_dir,$s7upf_config;
        /**************************************** BEGIN ****************************************/
        $s7upf_dir = get_template_directory_uri() . '/7upframe';
        $s7upf_config = array();
        $s7upf_config['dir'] = $s7upf_dir;
        $s7upf_config['css_url'] = $s7upf_dir . '/assets/css/';
        $s7upf_config['js_url'] = $s7upf_dir . '/assets/js/';
        $s7upf_config['bootstrap_ver'] = '3';
        $s7upf_config['nav_menu'] = array(
            'primary' => esc_html__( 'Primary Navigation', 'fattoria' ),
        );
        $s7upf_config['mega_menu'] = '1';
        $s7upf_config['sidebars']=array(
            array(
                'name'              => esc_html__( 'Blog Sidebar', 'fattoria' ),
                'id'                => 'blog-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all blog page.', 'fattoria'),
                'before_title'      => '<h3 class="widget-title">',
                'after_title'       => '</h3>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            )
        );
        if(class_exists("woocommerce")){
            $s7upf_config['sidebars'][] = array(
                'name'              => esc_html__( 'Woocommerce Sidebar', 'fattoria' ),
                'id'                => 'woocommerce-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all woocommerce page.', 'fattoria'),
                'before_title'      => '<h3 class="widget-title">',
                'after_title'       => '</h3>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            );
        }
        $s7upf_config['import_config'] = array(
                'demo_url'                  => 'https://fattoria.7uptheme.net',
                'homepage_default'          => 'Home',
                'blogpage_default'          => 'Blog',
                'menu_replace'              => 'Main Menu',
                'menu_locations'            => array("Main Menu" => "primary"),
                'set_woocommerce_page'      => 1
            );
        $s7upf_config['import_theme_option'] = 'YToxMTE6e3M6MTc6InM3dXBmX2hlYWRlcl9wYWdlIjtzOjM6Ijk3OCI7czoxNzoiczd1cGZfZm9vdGVyX3BhZ2UiO3M6NDoiMTAxMyI7czoxNDoiczd1cGZfNDA0X3BhZ2UiO3M6MDoiIjtzOjIwOiJzN3VwZl80MDRfcGFnZV9zdHlsZSI7czowOiIiO3M6MTg6ImJlZm9yZV9hcHBlbmRfcGFnZSI7czowOiIiO3M6MTc6ImFmdGVyX2FwcGVuZF9wYWdlIjtzOjA6IiI7czoyMDoiczd1cGZfc2hvd19icmVhZHJ1bWIiO3M6Mjoib24iO3M6MTk6InM3dXBmX2JnX2JyZWFkY3J1bWIiO2E6Njp7czoxNjoiYmFja2dyb3VuZC1jb2xvciI7czowOiIiO3M6MTc6ImJhY2tncm91bmQtcmVwZWF0IjtzOjA6IiI7czoyMToiYmFja2dyb3VuZC1hdHRhY2htZW50IjtzOjA6IiI7czoxOToiYmFja2dyb3VuZC1wb3NpdGlvbiI7czowOiIiO3M6MTU6ImJhY2tncm91bmQtc2l6ZSI7czowOiIiO3M6MTY6ImJhY2tncm91bmQtaW1hZ2UiO3M6ODg6Imh0dHA6Ly83dXB0aGVtZS5jb20vd29yZHByZXNzL2ZhdHRvcmlhL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE5LzAyL2ZhdHRvcmlhLWJhbm5lci0xMS5qcGciO31zOjE1OiJicmVhZGNydW1iX3RleHQiO3M6MDoiIjtzOjIxOiJicmVhZGNydW1iX3RleHRfaG92ZXIiO3M6MDoiIjtzOjEyOiJzaG93X3ByZWxvYWQiO3M6Mzoib2ZmIjtzOjEwOiJwcmVsb2FkX2JnIjtzOjA6IiI7czoxMzoicHJlbG9hZF9zdHlsZSI7czo2OiJzdHlsZTMiO3M6MTE6InByZWxvYWRfaW1nIjtzOjcxOiJodHRwOi8vbG9jYWxob3N0L2ZyYW1ld29yay93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMS9Sb2NrZXQtM0QtMDAxLmdpZiI7czoxNDoiczd1cGZfaWNvbl9saWIiO3M6MTE6ImxpbmVhd2Vzb21lIjtzOjE1OiJzaG93X3Njcm9sbF90b3AiO3M6Mjoib24iO3M6MjY6InNob3dfd2lzaGxpc3Rfbm90aWZpY2F0aW9uIjtzOjI6Im9uIjtzOjE0OiJzaG93X3Rvb19wYW5lbCI7czozOiJvZmYiO3M6MTU6InRvb2xfcGFuZWxfcGFnZSI7czowOiIiO3M6MTI6InNlc3Npb25fcGFnZSI7czoyOiJvbiI7czo3OiJib2R5X2JnIjtzOjA6IiI7czoxMDoibWFpbl9jb2xvciI7czowOiIiO3M6MTE6Im1haW5fY29sb3IyIjtzOjA6IiI7czoxNjoiczd1cGZfcGFnZV9zdHlsZSI7czowOiIiO3M6MTU6ImNvbnRhaW5lcl93aWR0aCI7czowOiIiO3M6MTE6Im1hcF9hcGlfa2V5IjtzOjM5OiJBSXphU3lBSHNsQml3YTBiMnVMeWdtNjJKdl9mb1hQcWRyYUk2dDQiO3M6MTc6InBvc3Rfc2luZ2xlX3NoYXJlIjthOjI6e2k6MDtzOjQ6InBvc3QiO2k6MjtzOjc6InByb2R1Y3QiO31zOjIyOiJwb3N0X3NpbmdsZV9zaGFyZV9saXN0IjthOjQ6e2k6MTthOjM6e3M6NToidGl0bGUiO3M6MTE6Imdvb2dsZSBwbHVzIjtzOjY6InNvY2lhbCI7czo2OiJnb29nbGUiO3M6NjoibnVtYmVyIjtzOjM6Im9mZiI7fWk6MjthOjM6e3M6NToidGl0bGUiO3M6OToicGludGVyZXN0IjtzOjY6InNvY2lhbCI7czo5OiJwaW50ZXJlc3QiO3M6NjoibnVtYmVyIjtzOjM6Im9mZiI7fWk6MzthOjM6e3M6NToidGl0bGUiO3M6NzoidHdpdHRlciI7czo2OiJzb2NpYWwiO3M6NzoidHdpdHRlciI7czo2OiJudW1iZXIiO3M6Mzoib2ZmIjt9aTo0O2E6Mzp7czo1OiJ0aXRsZSI7czo4OiJmYWNlYm9vayI7czo2OiJzb2NpYWwiO3M6ODoiZmFjZWJvb2siO3M6NjoibnVtYmVyIjtzOjM6Im9mZiI7fX1zOjIxOiJkaXNhYmxlX3ZlcmlmeV9ub3RpY2UiO3M6Mzoib2ZmIjtzOjEzOiJzdl9tZW51X2NvbG9yIjtzOjA6IiI7czoxOToic3ZfbWVudV9jb2xvcl9ob3ZlciI7czowOiIiO3M6MjA6InN2X21lbnVfY29sb3JfYWN0aXZlIjtzOjA6IiI7czoxNDoic3ZfbWVudV9jb2xvcjIiO3M6MDoiIjtzOjIwOiJzdl9tZW51X2NvbG9yX2hvdmVyMiI7czowOiIiO3M6MjE6InN2X21lbnVfY29sb3JfYWN0aXZlMiI7czowOiIiO3M6MTg6ImJlZm9yZV9hcHBlbmRfcG9zdCI7czowOiIiO3M6MTc6ImFmdGVyX2FwcGVuZF9wb3N0IjtzOjA6IiI7czoyNzoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9ibG9nIjtzOjU6InJpZ2h0IjtzOjE4OiJzN3VwZl9zaWRlYmFyX2Jsb2ciO3M6MTI6ImJsb2ctc2lkZWJhciI7czoxODoiYmxvZ19kZWZhdWx0X3N0eWxlIjtzOjQ6Imxpc3QiO3M6MTA6ImJsb2dfc3R5bGUiO3M6MDoiIjtzOjE4OiJibG9nX251bWJlcl9maWx0ZXIiO3M6Mzoib2ZmIjtzOjE2OiJibG9nX3R5cGVfZmlsdGVyIjtzOjM6Im9mZiI7czoxNDoicG9zdF9saXN0X3NpemUiO3M6MDoiIjtzOjIwOiJwb3N0X2xpc3RfaXRlbV9zdHlsZSI7czowOiIiO3M6MTY6InBvc3RfZ3JpZF9jb2x1bW4iO3M6MToiMyI7czoxNDoicG9zdF9ncmlkX3NpemUiO3M6MDoiIjtzOjE3OiJwb3N0X2dyaWRfZXhjZXJwdCI7czoyOiI4MCI7czoyMDoicG9zdF9ncmlkX2l0ZW1fc3R5bGUiO3M6MDoiIjtzOjE0OiJwb3N0X2dyaWRfdHlwZSI7czowOiIiO3M6Mjc6InM3dXBmX3NpZGViYXJfcG9zaXRpb25fcG9zdCI7czoyOiJubyI7czoxODoiczd1cGZfc2lkZWJhcl9wb3N0IjtzOjA6IiI7czoyMToicG9zdF9zaW5nbGVfdGh1bWJuYWlsIjtzOjI6Im9uIjtzOjE2OiJwb3N0X3NpbmdsZV9zaXplIjtzOjA6IiI7czoxNjoicG9zdF9zaW5nbGVfbWV0YSI7czoyOiJvbiI7czoxODoicG9zdF9zaW5nbGVfYXV0aG9yIjtzOjI6Im9uIjtzOjIyOiJwb3N0X3NpbmdsZV9uYXZpZ2F0aW9uIjtzOjI6Im9uIjtzOjE5OiJwb3N0X3NpbmdsZV9yZWxhdGVkIjtzOjM6Im9mZiI7czoyNToicG9zdF9zaW5nbGVfcmVsYXRlZF90aXRsZSI7czowOiIiO3M6MjY6InBvc3Rfc2luZ2xlX3JlbGF0ZWRfbnVtYmVyIjtzOjA6IiI7czoyNDoicG9zdF9zaW5nbGVfcmVsYXRlZF9pdGVtIjtzOjA6IiI7czozMDoicG9zdF9zaW5nbGVfcmVsYXRlZF9pdGVtX3N0eWxlIjtzOjY6InN0eWxlMyI7czoyNzoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9wYWdlIjtzOjI6Im5vIjtzOjE4OiJzN3VwZl9zaWRlYmFyX3BhZ2UiO3M6MDoiIjtzOjM1OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3BhZ2VfYXJjaGl2ZSI7czo1OiJyaWdodCI7czoyNjoiczd1cGZfc2lkZWJhcl9wYWdlX2FyY2hpdmUiO3M6MTI6ImJsb2ctc2lkZWJhciI7czozNDoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9wYWdlX3NlYXJjaCI7czo1OiJyaWdodCI7czoyNToiczd1cGZfc2lkZWJhcl9wYWdlX3NlYXJjaCI7czoxMjoiYmxvZy1zaWRlYmFyIjtzOjE3OiJzN3VwZl9hZGRfc2lkZWJhciI7YToxOntpOjA7YToyOntzOjU6InRpdGxlIjtzOjE5OiJXb29jb21tZXJjZSBTaWRlYmFyIjtzOjIwOiJ3aWRnZXRfdGl0bGVfaGVhZGluZyI7czoyOiJoMyI7fX1zOjEyOiJnb29nbGVfZm9udHMiO2E6Mzp7aTowO2E6Mjp7czo2OiJmYW1pbHkiO3M6NzoiYmlyeWFuaSI7czo4OiJ2YXJpYW50cyI7YTozOntpOjA7czo3OiJyZWd1bGFyIjtpOjE7czozOiI2MDAiO2k6MjtzOjM6IjcwMCI7fX1pOjE7YToyOntzOjY6ImZhbWlseSI7czo4OiJsZW1vbmFkYSI7czo4OiJ2YXJpYW50cyI7YTozOntpOjA7czo3OiJyZWd1bGFyIjtpOjE7czozOiI2MDAiO2k6MjtzOjM6IjcwMCI7fX1pOjI7YToyOntzOjY6ImZhbWlseSI7czoyMjoiZmlyYXNhbnNleHRyYWNvbmRlbnNlZCI7czo4OiJ2YXJpYW50cyI7YTozOntpOjA7czo3OiJyZWd1bGFyIjtpOjE7czozOiI2MDAiO2k6MjtzOjM6IjcwMCI7fX19czoyNjoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl93b28iO3M6NToicmlnaHQiO3M6MTc6InM3dXBmX3NpZGViYXJfd29vIjtzOjE5OiJ3b29jb21tZXJjZS1zaWRlYmFyIjtzOjE4OiJzaG9wX2RlZmF1bHRfc3R5bGUiO3M6NDoiZ3JpZCI7czoxNjoic2hvcF9nYXBfcHJvZHVjdCI7czowOiIiO3M6MTU6Indvb19zaG9wX251bWJlciI7czoyOiIxMiI7czoxNToic3Zfc2V0X3RpbWVfd29vIjtzOjA6IiI7czoxMDoic2hvcF9zdHlsZSI7czowOiIiO3M6OToic2hvcF9hamF4IjtzOjM6Im9mZiI7czoyMDoic2hvcF90aHVtYl9hbmltYXRpb24iO3M6MDoiIjtzOjE4OiJzaG9wX251bWJlcl9maWx0ZXIiO3M6Mjoib24iO3M6MTY6InNob3BfdHlwZV9maWx0ZXIiO3M6Mzoib2ZmIjtzOjEwOiJzaG9wX2xhYmVsIjtzOjM6Im9mZiI7czo5OiJzaG9wX3JhdGUiO3M6Mzoib2ZmIjtzOjE0OiJzaG9wX2xpc3Rfc2l6ZSI7czowOiIiO3M6MjA6InNob3BfbGlzdF9pdGVtX3N0eWxlIjtzOjA6IiI7czoxNjoic2hvcF9ncmlkX2NvbHVtbiI7czoxOiIzIjtzOjE0OiJzaG9wX2dyaWRfc2l6ZSI7czowOiIiO3M6MjA6InNob3BfZ3JpZF9pdGVtX3N0eWxlIjtzOjA6IiI7czoxNDoic2hvcF9ncmlkX3R5cGUiO3M6MDoiIjtzOjE1OiJjYXJ0X3BhZ2Vfc3R5bGUiO3M6Njoic3R5bGUyIjtzOjE5OiJjaGVja291dF9wYWdlX3N0eWxlIjtzOjY6InN0eWxlMiI7czoyMToiczd1cGZfaGVhZGVyX3BhZ2Vfd29vIjtzOjA6IiI7czoyMToiczd1cGZfZm9vdGVyX3BhZ2Vfd29vIjtzOjA6IiI7czoxNzoiYmVmb3JlX2FwcGVuZF93b28iO3M6MDoiIjtzOjE2OiJhZnRlcl9hcHBlbmRfd29vIjtzOjA6IiI7czozMDoic3Zfc2lkZWJhcl9wb3NpdGlvbl93b29fc2luZ2xlIjtzOjI6Im5vIjtzOjIxOiJzdl9zaWRlYmFyX3dvb19zaW5nbGUiO3M6MTk6Indvb2NvbW1lcmNlLXNpZGViYXIiO3M6MTg6InByb2R1Y3RfaW1hZ2Vfem9vbSI7czoxMToiem9vbS1zdHlsZTEiO3M6MTg6InByb2R1Y3RfdGFiX2RldGFpbCI7czowOiIiO3M6MTI6InNob3dfZXhjZXJwdCI7czoyOiJvbiI7czoxMToic2hvd19sYXRlc3QiO3M6Mjoib24iO3M6MTE6InNob3dfdXBzZWxsIjtzOjM6Im9mZiI7czoxMjoic2hvd19yZWxhdGVkIjtzOjM6Im9mZiI7czoxODoic2hvd19zaW5nbGVfbnVtYmVyIjtzOjE6IjYiO3M6MTY6InNob3dfc2luZ2xlX3NpemUiO3M6MDoiIjtzOjE5OiJzaG93X3NpbmdsZV9pdGVtcmVzIjtzOjA6IiI7czoyMjoic2hvd19zaW5nbGVfaXRlbV9zdHlsZSI7czowOiIiO3M6MjQ6ImJlZm9yZV9hcHBlbmRfd29vX3NpbmdsZSI7czowOiIiO3M6MTc6ImJlZm9yZV9hcHBlbmRfdGFiIjtzOjA6IiI7czoxNjoiYWZ0ZXJfYXBwZW5kX3RhYiI7czowOiIiO3M6MjM6ImFmdGVyX2FwcGVuZF93b29fc2luZ2xlIjtzOjA6IiI7fQ==';
        $s7upf_config['import_widget'] = '{"blog-sidebar":{"search-3":{"title":""},"s7upf_category_list-6":{"title":"Categories","taxonomy":"category","orderby":"id","order":"asc","show_count":"on","hierarchical":"","hide_empty":""},"s7upf_list_posts_widget-6":{"title":"Latest Posts","style":"list-brand","posts_per_page":"3","category_name":"0","order":"desc","order_by":"date","post__in":"","post__not_in":"","el_class":""},"tag_cloud-3":{"title":"popular tags","count":0,"taxonomy":"post_tag"}},"woocommerce-sidebar":{"s7upf_category_fillter-2":{"title":"Categories","category":["uncategorized","food-drink","fresh-fruit","fruit-cp","health","organic-fruit","vegetable"]},"woocommerce_price_filter-1":{"title":"Filter by price"},"s7upf_attribute_filter-3":{"title":"Manufactures","attribute":"manufacturers"},"s7upf_list_products-2":{"style":"list","title":"Best Seller","number":"4","product_type":"trending"}}}';
        $s7upf_config['import_category'] = '';

        /**************************************** PLUGINS ****************************************/

        $s7upf_config['require-plugin-begin'] = array(
            array(
                'name'      => esc_html__( '7up Core', 'fattoria'),
                'slug'      => '7up-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/7up-core.zip',
                'version'   => '1.2',
            ),
        );

        $s7upf_config['require-plugin'] = array(
            array(
                'name'      => esc_html__( '7up Core', 'fattoria'),
                'slug'      => '7up-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/7up-core.zip',
                'version'   => '1.2',
            ),
			array(
                'name'      => esc_html__( '7up Together', 'fattoria'),
                'slug'      => '7up-together',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/7up-together.zip',
                'version'   => '1.0',
            ),
            array(
                'name'      => esc_html__( 'WpBakery Page Builder', 'fattoria'),
                'slug'      => 'js_composer',
                'required'  => true,
                'source'    => get_template_directory().'/plugins/js_composer.zip',
                'version'   => '6.0',
            ),
            array(
                'name'      => esc_html__( 'WooCommerce', 'fattoria'),
                'slug'      => 'woocommerce',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'Contact Form 7', 'fattoria'),
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('MailChimp for WordPress Lite','fattoria'),
                'slug'      => 'mailchimp-for-wp',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Compare','fattoria'),
                'slug'      => 'yith-woocommerce-compare',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Wishlist','fattoria'),
                'slug'      => 'yith-woocommerce-wishlist',
                'required'  => false,
            )
        );

    /**************************************** PLUGINS ****************************************/
        $s7upf_config['theme-option'] = array(
            'sections' => array(
                array(
                    'id'    => 'option_basic',
                    'title' => '<i class="fa fa-cog"></i>'.esc_html__(' Basic Settings', 'fattoria')
                ),
                array(
                    'id'    => 'option_menu',
                    'title' => '<i class="fa fa-align-justify"></i>'.esc_html__(' Menu Settings', 'fattoria')
                ),
                array(
                    'id'    => 'blog_post',
                    'title' => '<i class="fa fa-bold"></i>'.esc_html__(' Blog & Post', 'fattoria')
                ),
                array(
                    'id'    => 'option_layout',
                    'title' => '<i class="fa fa-columns"></i>'.esc_html__(' Layout Settings', 'fattoria')
                ),
                array(
                    'id'    => 'option_typography',
                    'title' => '<i class="fa fa-font"></i>'.esc_html__(' Typography', 'fattoria')
                )
            ),
            'settings' => array(
                 /*----------------Begin Basic --------------------*/
                array(
                    'id'          => 'tab_general_theme',
                    'type'        => 'tab',
                    'section'     => 'option_basic',
                    'label'       => esc_html__('General','fattoria')
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'fattoria' ),
                    'desc'        => esc_html__( 'Include Header content. Go to Header in admin menu to edit/create header content. Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific header for it', 'fattoria' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_header')
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'fattoria' ),
                    'desc'        => esc_html__( 'Include Footer content. Go to Footer in admin menu to edit/create footer content.  Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific footer for it', 'fattoria' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_footer')
                ),
                array(
                    'id'          => 's7upf_404_page',
                    'label'       => esc_html__( '404 Page', 'fattoria' ),
                    'desc'        => esc_html__( 'Include page to 404 page', 'fattoria' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item')
                ),
                array(
                    'id'          => 's7upf_404_page_style',
                    'label'       => esc_html__( '404 Style', 'fattoria' ),
                    'desc'        => esc_html__( 'Choose a style to display.', 'fattoria' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'value' => '',
                            'label' => esc_html__('Default','fattoria'),
                        ),
                        array(
                            'value' => 'full-width',
                            'label' => esc_html__('FullWidth','fattoria'),
                        ),
                    ),
                    'condition'   => 's7upf_404_page:not()',
                ),                                
                array(
                    'id'          => 'before_append_page',
                    'label'       => esc_html__('Append content before page(default)','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page with template default.','fattoria'),
                ),
                array(
                    'id'          => 'after_append_page',
                    'label'       => esc_html__('Append content after page(default)','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page with template default.','fattoria'),
                ),
                array(
                    'id'        => 'tab_breadcrumb',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Breadcumb','fattoria')
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
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom background for breadcrumb.', 'fattoria' ),
                ),
                array(
                    'id'          => 'breadcrumb_text',
                    'label'       => esc_html__('Breadcrumb text','fattoria'),
                    'type'        => 'typography',
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom font in breadcrumb.', 'fattoria' ),
                ),
                array(
                    'id'          => 'breadcrumb_text_hover',
                    'label'       => esc_html__('Breadcrumb text hover','fattoria'),
                    'type'        => 'typography',
                    'section'     => 'option_basic',
                    'condition'   => 's7upf_show_breadrumb:is(on)',
                    'desc'        => esc_html__( 'Custom font when you hover in text of breadcrumb.', 'fattoria' ),
                ),
                array(
                    'id'        => 'tab_preload',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Preload','fattoria')
                ),
                array(
                    'id'        => 'show_preload',
                    'label'     => esc_html__('Show Preload', 'fattoria'),
                    'desc'      => esc_html__('This allow you to show or hide preload', 'fattoria'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'preload_bg',
                    'label'       => esc_html__('Background','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change default body background.', 'fattoria' ),
                    'condition'   => 'show_preload:is(on)',
                ),
                array(
                    'id'          => 'preload_style',
                    'label'       => esc_html__('Preload Style','fattoria'),
                    'type'        => 'select',
                    'std'         => '',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Style 1','fattoria'),
                            'value' =>  '',
                        ),
                        array(
                            'label' =>  esc_html__('Style 2','fattoria'),
                            'value' =>  'style2'
                        ),
                        array(
                            'label' =>  esc_html__('Style 3','fattoria'),
                            'value' =>  'style3'
                        ),
                        array(
                            'label' =>  esc_html__('Style 4','fattoria'),
                            'value' =>  'style4'
                        ),
                        array(
                            'label' =>  esc_html__('Style 5','fattoria'),
                            'value' =>  'style5'
                        ),
                        array(
                            'label' =>  esc_html__('Style 6','fattoria'),
                            'value' =>  'style6'
                        ),
                        array(
                            'label' =>  esc_html__('Style 7','fattoria'),
                            'value' =>  'style7'
                        ),
                        array(
                            'label' =>  esc_html__('Custom image','fattoria'),
                            'value' =>  'custom-image'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for your site.', 'fattoria' ),
                    'condition'   => 'show_preload:is(on)',
                ),
                array(
                    'id'          => 'preload_img',
                    'label'       => esc_html__('Preload Image','fattoria'),
                    'type'        => 'upload',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Choose a image to display as preload.', 'fattoria' ),
                    'condition'   => 'show_preload:is(on),preload_style:is(custom-image)',
                ),
                array(
                    'id'        => 'tab_other',
                    'type'      => 'tab',
                    'section'   => 'option_basic',
                    'label'     => esc_html__('Other','fattoria')
                ),
                array(
                    'id'          => 's7upf_icon_lib',
                    'label'       => esc_html__('Default icon','fattoria'),
                    'type'        => 'select',
                    'std'         => 'fontawesome',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Font Awesome','fattoria'),
                            'value' =>  'fontawesome',
                        ),
						array(
                            'label' =>  esc_html__('Line Awesome','fattoria'),
                            'value' =>  'lineawesome',
                        ),
                        array(
                            'label' =>  esc_html__('Open Iconic','fattoria'),
                            'value' =>  'openiconic'
                        ),
                        array(
                            'label' =>  esc_html__('Typicons','fattoria'),
                            'value' =>  'typicons'
                        ),
                        array(
                            'label' =>  esc_html__('Entypo','fattoria'),
                            'value' =>  'entypo'
                        ),
                        array(
                            'label' =>  esc_html__('Linecons','fattoria'),
                            'value' =>  'linecons'
                        ),
                        array(
                            'label' =>  esc_html__('Mono Social','fattoria'),
                            'value' =>  'monosocial'
                        ),
                        array(
                            'label' =>  esc_html__('Material','fattoria'),
                            'value' =>  'material'
                        ),
                        array(
                            'label' =>  esc_html__('Ion Icon','fattoria'),
                            'value' =>  'ionicon'
                        ),
                    ),
                    'desc'        => esc_html__( 'Choose default style for pages.', 'fattoria' ),
                ),
                array(
                    'id'        => 'show_scroll_top',
                    'label'     => esc_html__('Show scroll top button', 'fattoria'),
                    'desc'      => esc_html__('This allow you to show or hide scroll top button', 'fattoria'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'        => 'show_wishlist_notification',
                    'label'     => esc_html__('Show wishlist notification', 'fattoria'),
                    'desc'      => esc_html__('This allow you to show or hide wishlist notification when add to wishlist.', 'fattoria'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'        => 'show_too_panel',
                    'label'     => esc_html__('Show tool panel', 'fattoria'),
                    'desc'      => esc_html__('This allow you to show or hide tool panel.', 'fattoria'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'tool_panel_page',
                    'label'       => esc_html__( 'Choose tool panel page', 'fattoria' ),
                    'desc'        => esc_html__( 'Choose a mega page to display.', 'fattoria' ),
                    'type'        => 'select',
                    'section'     => 'option_basic',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'condition'   => 'show_too_panel:is(on)',
                ),
                array(
                    'id'        => 'session_page',
                    'label'     => esc_html__('Session page', 'fattoria'),
                    'desc'      => esc_html__('Enable session page to auto load header,footer,main color in other pages.', 'fattoria'),
                    'type'      => 'on-off',
                    'section'   => 'option_basic',
                    'std'       => 'off'
                ),
                array(
                    'id'          => 'body_bg',
                    'label'       => esc_html__('Body Background','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change default body background.', 'fattoria' ),
                ),
                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change main color of your site.', 'fattoria' ),
                ),
                array(
                    'id'          => 'main_color2',
                    'label'       => esc_html__('Main color 2','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'Change main color 2 of your site.', 'fattoria' ),
                ),
                array(
                    'id'          => 's7upf_page_style',
                    'label'       => esc_html__('Page Style','fattoria'),
                    'type'        => 'select',
                    'std'         => '',
                    'section'     => 'option_basic',
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
                    'desc'        => esc_html__( 'Choose default style for pages.', 'fattoria' ),
                ),
                array(
                    'id'          => 'container_width',
                    'label'       => esc_html__('Custom container width(px)','fattoria'),
                    'type'        => 'text',
                    'section'     => 'option_basic',
                    'desc'        => esc_html__( 'You can custom width of container on your site. Default is 1200px.', 'fattoria' ),
                ), 
                array(
                    'id'          => 'map_api_key',
                    'label'       => esc_html__('Map API key','fattoria'),
                    'type'        => 'text',
                    'section'     => 'option_basic',
                    'std'         => '',// ex: AIzaSyBX2IiEBg-0lQKQQ6wk6sWRGQnWI7iogf0
                    'desc'        => esc_html__( 'Enter your Map API key to display your location on google maps element.', 'fattoria' ).' </br><a target="_blank" href="//developers.google.com/maps/documentation/javascript/get-api-key">Get API</a>',
                ),
                array(
                    'id'          => 'post_single_share',
                    'label'       => esc_html__('Show share box','fattoria'),
                    'type'        => 'checkbox',
                    'section'     => 'option_basic',
                    'choices'     => array(
                        array(
                            'label' =>  esc_html__('Post','fattoria'),
                            'value' =>  'post',
                        ),
                        array(
                            'label' =>  esc_html__('Page','fattoria'),
                            'value' =>  'page',
                        ),
                        array(
                            'label' =>  esc_html__('Product','fattoria'),
                            'value' =>  'product'
                        ),
                    ),
                    'desc'        => esc_html__( 'You can show/hide share box on post, page, product pages. ', 'fattoria' ),
                ),
                array(
                    'id'          => 'post_single_share_list',
                    'label'       => esc_html__('Add custom share box','fattoria'),
                    'type'        => 'list-item',
                    'section'     => 'option_basic',
                    'std'         => '',
                    'settings'    => array( 
                        array(
                            'id'          => 'social',
                            'label'       => esc_html__('Social','fattoria'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'total',
                                    'label'=>esc_html__('Total share','fattoria'),
                                ),
                                array(
                                    'value'=>'facebook',
                                    'label'=>esc_html__('Facebook','fattoria'),
                                ),
                                array(
                                    'value'=>'twitter',
                                    'label'=>esc_html__('Twitter','fattoria'),
                                ),
                                array(
                                    'value'=>'google',
                                    'label'=>esc_html__('Google plus','fattoria'),
                                ),
                                array(
                                    'value'=>'pinterest',
                                    'label'=>esc_html__('Pinterest','fattoria'),
                                ),
                                array(
                                    'value'=>'linkedin',
                                    'label'=>esc_html__('Linkedin','fattoria'),
                                ),
                                array(
                                    'value'=>'tumblr',
                                    'label'=>esc_html__('Tumblr','fattoria'),
                                ),
                                array(
                                    'value'=>'envelope',
                                    'label'=>esc_html__('Mail','fattoria'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'number',
                            'label'       => esc_html__('Show number','fattoria'),
                            'type'        => 'on-off',
                            'std'         => 'on',                            
                        ),
                    ),
                ),
                array(
                    'id'          => 'disable_verify_notice',
                    'label'       => esc_html__('Disable Verify Menu','fattoria'),
                    'type'        => 'on-off',
                    'std'         => 'off',
                    'section'     => 'option_basic',
                ),
                /*----------------End Basic ----------------------*/

                /*----------------Begin Menu --------------------*/
                array(
                    'id'          => 'sv_menu_color',
                    'label'       => esc_html__('Menu style','fattoria'),
                    'type'        => 'typography',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_hover',
                    'label'       => esc_html__('Hover color','fattoria'),
                    'desc'        => esc_html__('Choose color','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_active',
                    'label'       => esc_html__('Background Hover color','fattoria'),
                    'desc'        => esc_html__('Choose color','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color2',
                    'label'       => esc_html__('Menu Sub style','fattoria'),
                    'type'        => 'typography',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_hover2',
                    'label'       => esc_html__('Hover Sub color','fattoria'),
                    'desc'        => esc_html__('Choose color','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_active2',
                    'label'       => esc_html__('Background Sub Hover color','fattoria'),
                    'desc'        => esc_html__('Choose color','fattoria'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                /*----------------End Menu ----------------------*/
                
                /*----------------Begin Blog + Post --------------------*/
                array(
                    'id'        => 'tab_blog_general',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('General','fattoria')
                ),                
                array(
                    'id'          => 'before_append_post',
                    'label'       => esc_html__('Append content before post/blog/archive page','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of post/blog/archive page.','fattoria'),
                ),
                array(
                    'id'          => 'after_append_post',
                    'label'       => esc_html__('Append content after post/blog/archive page','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of post/blog/archive page.','fattoria'),
                ),
                array(
                    'id'          => 's7upf_sidebar_position_blog',
                    'label'       => esc_html__('Sidebar Blog','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'=>esc_html__('Set sidebar position for your blog page. Left, Right, or No sidebar.','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fattoria'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fattoria'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_blog',
                    'label'       => esc_html__('Sidebar select display in blog','fattoria'),
                    'type'        => 'sidebar-select',
                    'section'     => 'blog_post',
                    'condition'   => 's7upf_sidebar_position_blog:not(no)',
                    'desc'        => esc_html__('Choose a sidebar to display.','fattoria'),
                ),
                array(
                    'id'          => 'blog_default_style',
                    'label'       => esc_html__('Default style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'list',
                            'label'=>esc_html__('List','fattoria'),
                        ),
                        array(
                            'value'=>'grid',
                            'label'=>esc_html__('Grid','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 'blog_style',
                    'label'       => esc_html__('Blog pagination','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','fattoria'),
                        ),
                        array(
                            'value'=>'load-more',
                            'label'=>esc_html__('Load more','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 'blog_number_filter',
                    'label'       => esc_html__('Show number filter','fattoria'),
                    'desc'        => 'Show/hide number filter on blog page.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'blog_number_filter_list',
                    'label'       => esc_html__('Add list number filter','fattoria'),
                    'type'        => 'list-item',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Add custom list number to filter on the blog page.','fattoria'),
                    'settings'    => array( 
                        array(
                            'id'          => 'number',
                            'label'       => esc_html__('Number','fattoria'),
                            'type'        => 'text',                            
                        ),
                    ),
                    'condition'   => 'blog_number_filter:not(off)',
                ),
                array(
                    'id'          => 'blog_type_filter',
                    'label'       => esc_html__('Show type filter','fattoria'),
                    'desc'        => 'Show/hide type filter(list/grid) on blog page.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                 //Tab list
                array(
                    'id'        => 'tab_blog_list',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('List Settings','fattoria')
                ),
                array(
                    'id'          => 'post_list_size',
                    'label'       => esc_html__('Custom list thumbnail size','fattoria'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','fattoria')
                ),
                array(
                    'id'          => 'post_list_item_style',
                    'label'       => esc_html__('List item style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'=>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => s7upf_get_post_list_style('option')
                ),
                //Tab grid
                array(
                    'id'        => 'tab_blog_grid',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('Grid Settings','fattoria')
                ),
                array(
                    'id'          => 'post_grid_column',
                    'label'       => esc_html__('Grid column','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'std'         => '3',
                    'desc'=>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'2',
                            'label'=>esc_html__('2 column','fattoria'),
                        ),
                        array(
                            'value'=>'3',
                            'label'=>esc_html__('3 column','fattoria'),
                        ),
                        array(
                            'value'=>'4',
                            'label'=>esc_html__('4 column','fattoria'),
                        ),
                        array(
                            'value'=>'5',
                            'label'=>esc_html__('5 column','fattoria'),
                        ),
                        array(
                            'value'=>'6',
                            'label'=>esc_html__('6 column','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 'post_grid_size',
                    'label'       => esc_html__('Custom grid thumbnail size','fattoria'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','fattoria')
                ),
                array(
                    'id'          => 'post_grid_excerpt',
                    'label'       => esc_html__('Grid Sub string excerpt','fattoria'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'std'         => '80',
                    'desc'        => esc_html__('Enter number of character want to get from excerpt content. Default is 0(hidden). Example is 80. Note: This value only apply for items style can be show excerpt.','fattoria')
                ),
                array(
                    'id'          => 'post_grid_item_style',
                    'label'       => esc_html__('Grid item style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => s7upf_get_post_style('option')
                ),
                array(
                    'id'          => 'post_grid_type',
                    'label'       => esc_html__('Grid display','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','fattoria'),
                        ),
                        array(
                            'value'=>'list-masonry',
                            'label'=>esc_html__('Masonry','fattoria'),
                        )
                    )
                ),
                //Post detail
                array(
                    'id'        => 'tab_blog_post_detail',
                    'type'      => 'tab',
                    'section'   => 'blog_post',
                    'label'     => esc_html__('Post detail Settings','fattoria')
                ),
                array(
                    'id'          => 's7upf_sidebar_position_post',
                    'label'       => esc_html__('Sidebar Single Post','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Set sidebar position for your post detail page. Left, Right, or No sidebar.','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fattoria'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fattoria'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_post',
                    'label'       => esc_html__('Sidebar select display in single post','fattoria'),
                    'type'        => 'sidebar-select',
                    'section'     => 'blog_post',
                    'condition'   => 's7upf_sidebar_position_post:not(no)',                    
                    'desc'        => esc_html__('Choose a sidebar to display.','fattoria'),
                ),
                array(
                    'id'          => 'post_single_thumbnail',
                    'label'       => esc_html__('Show thumbnail/media','fattoria'),
                    'desc'        => 'Show/hide thumbnail image, gallery, media on post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),                
                array(
                    'id'          => 'post_single_size',
                    'label'       => esc_html__('Custom single image size','fattoria'),
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','fattoria'),
                    'condition'   => 'post_single_thumbnail:is(on)',
                ),
                array(
                    'id'          => 'post_single_meta',
                    'label'       => esc_html__('Show meta data','fattoria'),
                    'desc'        => 'Show/hide meta data(author, date, comments, categories, tags) on post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'post_single_author',
                    'label'       => esc_html__('Show author box','fattoria'),
                    'desc'        => 'Show/hide author box on post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'post_single_navigation',
                    'label'       => esc_html__('Show navigation post','fattoria'),
                    'desc'        => 'Show/hide navigation to next post or previous post on the post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                // Related section
                array(
                    'id'          => 'post_single_related',
                    'label'       => esc_html__('Show related post','fattoria'),
                    'desc'        => 'Show/hide related post on the post detail.',
                    'type'        => 'on-off',
                    'section'     => 'blog_post',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'post_single_related_title',
                    'label'       => esc_html__('Related title','fattoria'),
                    'desc'        => 'Enter title of related section.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_number',
                    'label'       => esc_html__('Related number post','fattoria'),
                    'desc'        => 'Enter number of related post to display.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_item',
                    'label'       => esc_html__('Related custom number item responsive','fattoria'),
                    'desc'        => 'Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.',
                    'type'        => 'text',
                    'section'     => 'blog_post',
                    'condition'   => 'post_single_related:is(on)',
                ),
                array(
                    'id'          => 'post_single_related_item_style',
                    'label'       => esc_html__('Related item style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'blog_post',
                    'desc'        =>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => s7upf_get_post_style('option'),
                    'condition'   => 'post_single_related:is(on)',
                ),
                // End related

                /*----------------End Blog + Post ----------------------*/

                /*----------------Begin Layout --------------------*/
                array(
                    'id'          => 's7upf_sidebar_position_page',
                    'label'       => esc_html__('Sidebar Page','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'        => esc_html__('Set sidebar position for your default page. Left, Right, or No sidebar.','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fattoria'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fattoria'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page',
                    'label'       => esc_html__('Sidebar select display in page','fattoria'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page:not(no)',                    
                    'desc'        => esc_html__('Choose a sidebar to display.','fattoria'),
                ),
                /****end page****/
                array(
                    'id'          => 's7upf_sidebar_position_page_archive',
                    'label'       => esc_html__('Sidebar Position on Page Archives:','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'        => esc_html__('Set sidebar position for your archives page(category/tag/author page...). Left, Right, or No sidebar.','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fattoria'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fattoria'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page_archive',
                    'label'       => esc_html__('Sidebar select display in page Archives','fattoria'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page_archive:not(no)',
                    'desc'        => esc_html__('Choose a sidebar to display.','fattoria'),
                ),
                array(
                    'id'          => 's7upf_sidebar_position_page_search',
                    'label'       => esc_html__('Sidebar Position on search page:','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'        => esc_html__('Set sidebar position for your search page. Left, Right, or No sidebar.','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fattoria'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fattoria'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page_search',
                    'label'       => esc_html__('Sidebar select display in page Archives','fattoria'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page_search:not(no)',
                    'desc'        => esc_html__('Choose a sidebar to display.','fattoria'),
                ),
                // END                
                array(
                    'id'          => 's7upf_add_sidebar',
                    'label'       => esc_html__('Add SideBar','fattoria'),
                    'type'        => 'list-item',
                    'section'     => 'option_layout',
                    'std'         => '',
                    'settings'    => array( 
                        array(
                            'id'          => 'widget_title_heading',
                            'label'       => esc_html__('Choose heading title widget','fattoria'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','fattoria'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','fattoria'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','fattoria'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','fattoria'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','fattoria'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','fattoria'),
                                ),
                            )
                        ),
                    ),
                ),
                /*----------------End Layout ----------------------*/

                /*----------------Begin Blog ----------------------*/       
                

                /*----------------End BLOG----------------------*/

                /*----------------Begin Typography ----------------------*/
                array(
                    'id'          => 's7upf_custom_typography',
                    'label'       => esc_html__('Add Settings','fattoria'),
                    'type'        => 'list-item',
                    'section'     => 'option_typography',
                    'std'         => '',
                    'settings'    => array(
                        array(
                            'id'          => 'typo_area',
                            'label'       => esc_html__('Choose Area to style','fattoria'),
                            'type'        => 'select',
                            'std'        => 'main',
                            'choices'     => array(
                                array(
                                    'value'=>'body',
                                    'label'=>esc_html__('Body','fattoria'),
                                ),
                                array(
                                    'value'=>'header',
                                    'label'=>esc_html__('Header','fattoria'),
                                ),
                                array(
                                    'value'=>'main',
                                    'label'=>esc_html__('Main Content','fattoria'),
                                ),
                                array(
                                    'value'=>'widget',
                                    'label'=>esc_html__('Widget','fattoria'),
                                ),
                                array(
                                    'value'=>'footer',
                                    'label'=>esc_html__('Footer','fattoria'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typo_heading',
                            'label'       => esc_html__('Choose heading Area','fattoria'),
                            'type'        => 'select',
                            'std'        => '',
                            'choices'     => array(
                                array(
                                    'value'=>'',
                                    'label'=>esc_html__('All','fattoria'),
                                ),
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','fattoria'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','fattoria'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','fattoria'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','fattoria'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','fattoria'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','fattoria'),
                                ),
                                array(
                                    'value'=>'a',
                                    'label'=>esc_html__('a','fattoria'),
                                ),
                                array(
                                    'value'=>'p',
                                    'label'=>esc_html__('p','fattoria'),
                                ),
                                array(
                                    'value'=>'span',
                                    'label'=>esc_html__('span','fattoria'),
                                ),
                                array(
                                    'value'=>'i',
                                    'label'=>esc_html__('i','fattoria'),
                                ),
                                array(
                                    'value'=>'quote',
                                    'label'=>esc_html__('quote','fattoria'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typography_style',
                            'label'       => esc_html__('Add Style','fattoria'),
                            'type'        => 'typography',
                            'section'     => 'option_typography',
                        ),
                    ),
                ),        
                array(
                    'id'          => 'google_fonts',
                    'label'       => esc_html__('Add Google Fonts','fattoria'),
                    'type'        => 'google-fonts',
                    'section'     => 'option_typography',
                ),
                /*----------------End Typography ----------------------*/
            )
        );
        if(class_exists( 'WooCommerce' )){
            // Add woo sections
            $woo_sections = array(
                array(
                    'id' => 'option_woo',
                    'title' => '<i class="fa fa-shopping-cart"></i>'.esc_html__(' Shop Settings', 'fattoria')
                ),
                array(
                    'id' => 'option_product',
                    'title' => '<i class="fa fa-th-large"></i>'.esc_html__(' Product Settings', 'fattoria')
                )
            );
            $s7upf_config['theme-option']['sections'] = array_merge($s7upf_config['theme-option']['sections'],$woo_sections);
            // End add sections

            // Add woo setting
            $woo_settings = array(                
                array(
                    'id'        => 'tab_shop_general',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('General','fattoria')
                ),
                array(
                    'id'          => 's7upf_sidebar_position_woo',
                    'label'       => esc_html__('Sidebar Position WooCommerce page','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Set sidebar position for your woocommerce page(Shop, Checkout, Cart, My Account, Product category/tag/taxonomy page...). Left, Right, or No sidebar.','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fattoria'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fattoria'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_woo',
                    'label'       => esc_html__('Sidebar select WooCommerce page','fattoria'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_woo',
                    'condition'   => 's7upf_sidebar_position_woo:not(no)',
                    'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','fattoria'),

                ),
                array(
                    'id'          => 'shop_default_style',
                    'label'       => esc_html__('Default style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(                        
                        array(
                            'value'=>'grid',
                            'label'=>esc_html__('Grid','fattoria'),
                        ),
                        array(
                            'value'=>'list',
                            'label'=>esc_html__('List','fattoria'),
                        ),
                    )
                ),
                array(
                    'id'          => 'shop_gap_product',
                    'label'       => esc_html__('Gap Products','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose space. The space between the items on the shop page.','fattoria'),
                    'choices'     => array(                        
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','fattoria'),
                        ),
                        array(
                            'value'=>'gap-0',
                            'label'=>esc_html__('0','fattoria'),
                        ),
                        array(
                            'value'=>'gap-5',
                            'label'=>esc_html__('5px','fattoria'),
                        ),
                        array(
                            'value'=>'gap-10',
                            'label'=>esc_html__('10px','fattoria'),
                        ),
                        array(
                            'value'=>'gap-15',
                            'label'=>esc_html__('15px','fattoria'),
                        ),
                        array(
                            'value'=>'gap-20',
                            'label'=>esc_html__('20px','fattoria'),
                        ),
                        array(
                            'value'=>'gap-30',
                            'label'=>esc_html__('30px','fattoria'),
                        ),
                        array(
                            'value'=>'gap-40',
                            'label'=>esc_html__('40px','fattoria'),
                        ),
                        array(
                            'value'=>'gap-50',
                            'label'=>esc_html__('50px','fattoria'),
                        ),

                    )
                ),
                array(
                    'id'          => 'woo_shop_number',
                    'label'       => esc_html__('Product Number','fattoria'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'std'         => '12',
                    'desc'        => esc_html__('Enter number product to display per page. Default is 12.','fattoria')
                ),
                array(
                    'id'          => 'sv_set_time_woo',
                    'label'       => esc_html__('Product new in(days)','fattoria'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter number to set time for product is new. Unit day. Default is 30.','fattoria')
                ),
                array(
                    'id'          => 'shop_style',
                    'label'       => esc_html__('Shop pagination','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'=>esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','fattoria'),
                        ),
                        array(
                            'value'=>'load-more',
                            'label'=>esc_html__('Load more','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 'shop_ajax',
                    'label'       => esc_html__('Shop ajax','fattoria'),
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'off',
                    'desc'        => esc_html__('Enable ajax process for your shop page.','fattoria'),
                ),
                array(
                    'id'          => 'shop_thumb_animation',
                    'label'       => esc_html__('Thumbnail animation','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a animation.','fattoria'),
                    'choices'     => s7upf_get_product_thumb_animation('option')
                ),
                array(
                    'id'          => 'shop_number_filter',
                    'label'       => esc_html__('Show number filter','fattoria'),
                    'desc'        => 'Show/hide number filter on shop page.',
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'shop_number_filter_list',
                    'label'       => esc_html__('Add list number filter','fattoria'),
                    'type'        => 'list-item',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Add custom list number to filter on the shop page.','fattoria'),
                    'settings'    => array( 
                        array(
                            'id'          => 'number',
                            'label'       => esc_html__('Number','fattoria'),
                            'type'        => 'text',                            
                        ),
                    ),
                    'condition'   => 'blog_number_filter:not(off)',
                ),
                array(
                    'id'          => 'shop_type_filter',
                    'label'       => esc_html__('Show type filter','fattoria'),
                    'desc'        => 'Show/hide type filter(list/grid) on shop page.',
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'on',
                ),
				array(
                    'id'          => 'shop_label',
                    'label'       => esc_html__('Show Product Label','fattoria'),
                    'desc'        => 'Show/hide label about new product and sale product on shop page.',
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'off',
                ),
				array(
                    'id'          => 'shop_rate',
                    'label'       => esc_html__('Show Product Rating','fattoria'),
                    'desc'        => 'Show/hide rating for product on shop page.',
                    'type'        => 'on-off',
                    'section'     => 'option_woo',
                    'std'         => 'off',
                ),
                //Tab list
                array(
                    'id'        => 'tab_shop_list',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('List Settings','fattoria')
                ),

                array(
                    'id'          => 'shop_list_size',
                    'label'       => esc_html__('Custom list thumbnail size','fattoria'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','fattoria')
                ),
                array(
                    'id'          => 'shop_list_item_style',
                    'label'       => esc_html__('List item style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => s7upf_get_product_list_style('option')
                ),
                //Tab grid
                array(
                    'id'        => 'tab_shop_grid',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('Grid Settings','fattoria')
                ),
                array(
                    'id'          => 'shop_grid_column',
                    'label'       => esc_html__('Grid column','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'std'         => '3',
                    'desc'        => esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=> '2',
                            'label'=> esc_html__('2 column','fattoria'),
                        ),
                        array(
                            'value'=> '3',
                            'label'=> esc_html__('3 column','fattoria'),
                        ),
                        array(
                            'value'=> '4',
                            'label'=> esc_html__('4 column','fattoria'),
                        ),
                        array(
                            'value'=> '5',
                            'label'=> esc_html__('5 column','fattoria'),
                        ),
                        array(
                            'value'=> '6',
                            'label'=> esc_html__('6 column','fattoria'),
                        ),
                        array(
                            'value'=> '7',
                            'label'=> esc_html__('7 column','fattoria'),
                        ),
                        array(
                            'value'=> '8',
                            'label'=> esc_html__('8 column','fattoria'),
                        ),
                        array(
                            'value'=> '9',
                            'label'=> esc_html__('9 column','fattoria'),
                        ),
                        array(
                            'value'=> '10',
                            'label'=> esc_html__('10 column','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 'shop_grid_size',
                    'label'       => esc_html__('Custom grid thumbnail size','fattoria'),
                    'type'        => 'text',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','fattoria')
                ),
                array(
                    'id'          => 'shop_grid_item_style',
                    'label'       => esc_html__('Grid item style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => s7upf_get_product_style('option')
                ),
                array(
                    'id'          => 'shop_grid_type',
                    'label'       => esc_html__('Grid display','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','fattoria'),
                        ),
                        array(
                            'value'=>'list-masonry',
                            'label'=>esc_html__('Masonry','fattoria'),
                        )
                    )
                ),
                array(
                    'id'        => 'tab_shop_advanced',
                    'type'      => 'tab',
                    'section'   => 'option_woo',
                    'label'     => esc_html__('Advanced','fattoria')
                ),
                array(
                    'id'          => 'cart_page_style',
                    'label'       => esc_html__('Cart display','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','fattoria'),
                        ),
                        array(
                            'value'=>'style2',
                            'label'=>esc_html__('Style 2','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 'checkout_page_style',
                    'label'       => esc_html__('Checkout display','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','fattoria'),
                        ),
                        array(
                            'value'=>'style2',
                            'label'=>esc_html__('Style 2','fattoria'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_header_page_woo',
                    'label'       => esc_html__( 'Header Woocommerce Page', 'fattoria' ),
                    'desc'        => esc_html__( 'Include Header content. Go to Header in admin menu to edit/create header content. Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific header for it', 'fattoria' ),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'choices'     => s7upf_list_post_type('s7upf_header')
                ),
                array(
                    'id'          => 's7upf_footer_page_woo',
                    'label'       => esc_html__( 'Footer Woocommerce Page', 'fattoria' ),
                    'desc'        => esc_html__( 'Include Footer content. Go to Footer in admin menu to edit/create footer content.  Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific footer for it', 'fattoria' ),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'choices'     => s7upf_list_post_type('s7upf_footer')
                ),
                array(
                    'id'          => 'before_append_woo',
                    'label'       => esc_html__('Append content before Woocommerce page','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','fattoria'),
                ),
                array(
                    'id'          => 'after_append_woo',
                    'label'       => esc_html__('Append content after Woocommerce page','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_woo',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','fattoria'),
                ),
                // END Shop config
                array(
                    'id'        => 'tab_product_general',
                    'type'      => 'tab',
                    'section'   => 'option_product',
                    'label'     => esc_html__('General','fattoria')
                ),
                array(
                    'id'          => 'sv_sidebar_position_woo_single',
                    'label'       => esc_html__('Sidebar Position WooCommerce Single','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Left, or Right, or Center','fattoria'),
                    'std'         => 'no',
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','fattoria'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','fattoria'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','fattoria'),
                        ),
                    )
                ),
                array(
                    'id'          => 'sv_sidebar_woo_single',
                    'label'       => esc_html__('Sidebar select WooCommerce Single','fattoria'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_product',
                    'condition'   => 'sv_sidebar_position_woo_single:not(no)',
                    'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','fattoria'),
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
                    'id'          => 'product_tab_detail',
                    'label'       => esc_html__('Product tab style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to display','fattoria'),
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
                    'id'          => 'show_excerpt',
                    'label'       => esc_html__('Show Excerpt','fattoria'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'        => 'tab_product_extra',
                    'type'      => 'tab',
                    'section'   => 'option_product',
                    'label'     => esc_html__('Extra display','fattoria')
                ),               
                array(
                    'id'          => 'show_latest',
                    'label'       => esc_html__('Show latest products','fattoria'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_upsell',
                    'label'       => esc_html__('Show upsell products','fattoria'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_related',
                    'label'       => esc_html__('Show related products','fattoria'),
                    'type'        => 'on-off',
                    'section'     => 'option_product',
                    'std'         => 'on'
                ),
                array(
                    'id'          => 'show_single_number',
                    'label'       => esc_html__('Show Single Number','fattoria'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '1,100,1',
                    'section'     => 'option_product',
                    'std'         => '6'
                ),
                array(
                    'id'          => 'show_single_size',
                    'label'       => esc_html__('Show Single Size','fattoria'),
                    'type'        => 'text',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Custom size for related,upsell products. Enter size thumbnail to crop. [width]x[height]. Example is 300x300.','fattoria'),
                ),
                array(
                    'id'          => 'show_single_itemres',
                    'label'       => esc_html__('Custom item devices','fattoria'),
                    'type'        => 'text',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Enter item for screen width(px) format is width:value and separate values by ",". Example is 0:2,600:3,1000:4. Default is auto.','fattoria'),
                ),
                array(
                    'id'          => 'show_single_item_style',
                    'label'       => esc_html__('Single item style','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'desc'        => esc_html__('Choose a style to active display','fattoria'),
                    'choices'     => s7upf_get_product_style('option')
                ),
                array(
                    'id'        => 'tab_product_advanced',
                    'type'      => 'tab',
                    'section'   => 'option_product',
                    'label'     => esc_html__('Advanced','fattoria')
                ),
                array(
                    'id'          => 'before_append_woo_single',
                    'label'       => esc_html__('Append content before product page','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before main content of page/post.','fattoria'),
                ),
                array(
                    'id'          => 'before_append_tab',
                    'label'       => esc_html__('Append content before product tab','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','fattoria'),
                ),
                array(
                    'id'          => 'after_append_tab',
                    'label'       => esc_html__('Append content after product tab','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to before product tab.','fattoria'),
                ),
                array(
                    'id'          => 'after_append_woo_single',
                    'label'       => esc_html__('Append content after product page','fattoria'),
                    'type'        => 'select',
                    'section'     => 'option_product',
                    'choices'     => s7upf_list_post_type('s7upf_mega_item'),
                    'desc'        => esc_html__('Choose a mega page content append to after main content of page/post.','fattoria'),
                ),
            );
            $s7upf_config['theme-option']['settings'] = array_merge($s7upf_config['theme-option']['settings'],$woo_settings);
            // End add settings
        }
    }
}
s7upf_set_theme_config();