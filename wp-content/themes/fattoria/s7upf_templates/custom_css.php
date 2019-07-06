<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 13/08/15
 * Time: 10:20 AM
 */
if(!isset($main_color)) $main_color = s7upf_get_value_by_id('main_color');
if(!isset($main_color2)) $main_color2 = s7upf_get_value_by_id('main_color2');
$body_bg = s7upf_get_value_by_id('body_bg');
$container_width = s7upf_get_value_by_id('container_width');
$preload_bg = s7upf_get_option('preload_bg');
$important = '';
?>
<?php
$style = '';

if(!empty($body_bg)){
    $style .= 'body
    {background-color:'.$body_bg.$important.'}'."\n";
}
if(!empty($preload_bg)){
    $style .= '.preload #loading
    {background-color:'.$preload_bg.$important.'}'."\n";
}

if(!empty($container_width)) {
    $style .= '.container,.page-content-box .wrap{max-width: '.$container_width.'px !important;}';
}

/*****BEGIN MAIN COLOR*****/

if(!empty($main_color)){
	$style .= '.about-title-number a.readmore, .color, .desc.color, .item-contact-page .contact-thumb:hover, 
    .list-about-page>li.current>a, .main-nav>ul>li:hover>a, .main-nav>ul>li>a:hover, .popup-icon, 
    .product-title a:hover, a:active, a:focus, a:hover,.desc.color,.main-nav > ul > li > a:hover,
	.popup-icon,.main-nav > ul > li:hover > a,.item-contact-page .contact-thumb:hover,
	.list-about-page > li.current > a,.about-title-number a.readmore,.item-price-table .btn-purchase,
	.title-general i,.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover,
	.product-quick-view i,.product-extra-link .addcart-link i,.product-price ins,.product-price > span,
	.product-title a:hover,.item-testimo .wrap-thumb:before,.item-testimo .wrap-thumb:after,
	.toggle-tab-title i,.item-toggle-tab:before,.comment i,.name-cat:hover,.text-logo i,.bread-crumb-wrap i,
	.bread-crumb-wrap,.show-by.box-per-page .dropdown-list li a.active,
	.show-by.box-per-page .dropdown-list li a:hover,.total-price-html,
	.famibt-wrap .famibt-item .famibt-product-title:hover,.nav-tabs>li>a.active,.view-type a.active,
	.detail-content-wrap blockquote:before,.reply-button,.item-product .product-info .title12:hover,
	.tab-style2 .list-tag-detail li a.active,.customer-care-box a:hover,
	.top-header-link ul li a:hover,.info-footer-box ul li a:hover,.copyright-box li a:hover,
	.post-list-tags a:hover,
	.item-product-featured .product-info .title14 a:hover,
	.woocommerce #review_form #respond .form-submit input,.box-author li span.silver:hover,
	.list-info-title .title24 a:hover,.post-info .title18 a:hover,.testimo-info .title18 a:hover,
	.social-post-box li a:hover,.woocommerce a.button.compare:hover,
	.item-toggle-tab.active .toggle-tab-title .title18,.cart-subtotal .amount,.order-total .amount,
	.product-subtotal .amount,.cart-subtotal .amount, .order-total .amount, .product-subtotal .amount,
	.widget_calendar table tbody td a,.widget_calendar table tfoot a:hover,.info-404 h2,
	.edit-post-visual-editor .editor-block-list__block blockquote.wp-block-quote:before,
	blockquote:before,.wrap-header-left .social-list a:hover i,.footer2 .copyright-box a:hover,
	.footer2 .info-footer-box ul li a:hover,.wrap-testimonial2 .testimo-info .title18 a:hover,
	.block-statistic2 .item-statistic .title48,.comment-info .fn a:hover,
	.wrap-item-service2:after,.has-nav-right .owl-nav button:hover i,.item-leaf .wrap-percent:before,
	.item-info:hover .info-icon a i,.box-testimonal3 .testimo-info .title18 a
    {color:'.$main_color.$important.'}'."\n";
	
	$style .= '.list-tag-detail li.active a
	{color:'.$main_color.$important.' !important}'."\n";
    
    $style .= '.bg-color,.dm-button,#widget_indexdm .dm-header .header-button > a:hover,
	.dropdown-list li a:hover,body .scroll-top,.shop-button:hover,.about-intro-top h3::before,
	.about-banner-history .banner-info h3::before,.main-nav > ul > li .sub-menu > li > a:hover,
	.title-has-border:before,.title-has-border:after,.social-list a:hover,
	.owl-carousel .owl-nav button:hover,.owl-theme .owl-dots .owl-dot.active span, 
	.owl-theme .owl-dots .owl-dot:hover span,.about-team-info .title18:before,
	.about-team-info .title18:after,.dropdown-list li a.active,
	.woocommerce .item-product-list a.button.addcart-link:hover,
	.detail-gallery .gallery-control > a:hover,.tab-style2 .list-tag-detail li.active a::before,
	.tab-style2 .list-tag-detail li a.active::before,.detail-tab-desc ul li:before,
	.woocommerce #review_form #respond .form-submit input:hover,.share-icon:hover,.icon-mid:hover,
	.wrap-bread-crumb,.woocommerce div.product form.cart .button.single_add_to_cart_button:hover,
	.woocommerce-MyAccount-navigation ul li.is-active,.woocommerce-MyAccount-navigation ul li:hover,
	.tagcloud a:hover,.post-password-form input[type=submit]:hover,.page-links > span,
	.list-tag-detail li a.active::before,.list-tag-detail li.active a::before,
	.popup-form input.button:hover,.woocommerce a.button.wc-backward:hover,
	.woocommerce.widget .woocommerce-widget-layered-nav-dropdown__submit:hover,
	.woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover, button:hover,.woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover,.woocommerce #respond input#submit:hover,
	.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,
	.woocommerce-account .addresses .title .edit:hover,
	.woocommerce #respond input#submit.disabled:hover, 
	.woocommerce #respond input#submit:disabled:hover, 
	.woocommerce #respond input#submit:disabled[disabled]:hover, 
	.woocommerce a.button.disabled:hover,
	.woocommerce a.button:disabled:hover, 
	.woocommerce a.button:disabled[disabled]:hover, 
	.woocommerce button.button.disabled:hover, 
	.woocommerce button.button:disabled:hover, 
	.woocommerce button.button:disabled[disabled]:hover, 
	.woocommerce input.button.disabled:hover, 
	.woocommerce input.button:disabled:hover, 
	.woocommerce input.button:disabled[disabled]:hover,
	.form-row input[type="submit"]:hover,
	.shop-button.bg-color2:hover,.info-client-choose .text-has-border:before,
	.box-infomation4 .text-has-border:before,
	.box-best-seller5 .btn-loadmore .product-loadmore:hover
    {background:'.$main_color.$important.'}'."\n";
	
	$style .='.preload #loading,.contact-form-page input[type="submit"]:hover,
	.item-contact-page .contact-thumb::before,.about-title-number .readmore:hover,
	.item-page-view .page-view-info .btn-page-view:hover,.item-page-view .page-view-link:hover,
	.about-title-number::before,.item-price-table .btn-purchase:hover,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce button.button:hover,
	.pagi-nav .current,.woocommerce button.button.alt:hover,.woocommerce a.button.alt:hover,
	.range-filter .ui-slider-handle.ui-state-default.ui-corner-all
	{background-color:'.$main_color.$important.'}'."\n";
	
	$style .='.owl-theme .owl-nav button:hover,.woocommerce .mini-cart-button a:hover,
	.mini-cart-button a:hover
	{background:'.$main_color.$important.' !important}'."\n";
	
    $style .= '.main-border,.item-contact-page .contact-thumb,.banner-fresh-fruit,
	.tagcloud a:hover,.item-service:hover .wrap-item-service
    {border: 1px solid '.$main_color.$important.'}'."\n";
	
	$style .= '.item-info:hover .info-icon
    {border: 5px solid '.$main_color.$important.'}'."\n";
	
	$style .= '.banner-deals .text-sale:before
    {border: 5px double '.$main_color.$important.'}'."\n";
	
	$style .= '.item-price-table .btn-purchase
    {border: 2px solid '.$main_color.$important.'}'."\n";
	
	$style .= '.about-title-number a.readmore,.item-page-view .page-view-info .btn-page-view:hover,
	.item-page-view .page-view-link:hover,.list-about-page > li.current > a::after,
	.wp-block-pullquote
    {border-color:'.$main_color.$important.'}'."\n";

    list($r, $g, $b) = sscanf($main_color, "#%02x%02x%02x");
    $style .= '.bg-rgb,.link-thumb,.share-social-team,.view-cat a,.icon-gallery
    {background-color: rgba('.$r.','.$g.','.$b.', 0.5)'.$important.'}'."\n";
	
	$style .= '.bg-rgb,.item-product-featured:before
    {background-color: rgba('.$r.','.$g.','.$b.', 0.7)'.$important.'}'."\n";
	
	$style .= '.bg-rgb,.item-service
    {background-color: rgba('.$r.','.$g.','.$b.', 0.3)'.$important.'}'."\n";
}

if(!empty($main_color2)){
    $style .= '.color2,.customer-care-box i,.address-contact i,.time_circles .number,
	.form-newsletter form .mc4wp-form-fields:after,
	.woocommerce button.button,.woocommerce .item-product-list a.button.addcart-link,
	.woocommerce div.product form.cart .button.single_add_to_cart_button,
	.yith-wcwl-add-to-wishlist,.mini-cart-button a,.woocommerce .mini-cart-button a,
	.contact-form input[type="submit"],.contact-form-page input[type="submit"],
	.woocommerce a.button.alt,.post-password-form input[type=submit],.info-404 a,
	.share-social-team a:hover,.item-product-featured .product-info .title14 a:hover,
	.popup-form input.button,.woocommerce a.button.wc-backward,
	.woocommerce.widget .woocommerce-widget-layered-nav-dropdown__submit,
	.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, 
	.woocommerce button.button.alt, .woocommerce input.button.alt,button,
	.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, 
	.woocommerce input.button.alt.woocommerce #respond input#submit,.woocommerce a.button,
	.woocommerce button.button,.woocommerce input.button,.woocommerce-account .addresses .title .edit,
	.form-submit .shop-button,.form-row input[type="submit"],.close-menu-fixed:hover,.top-header-link3>div>a:hover
    {color:'.$main_color2.$important.'}'."\n";
    
	$style .='.list-footer-link li:before,.product-quick-view:before,.product-extra-link .addcart-link:before,
	.item-product-featured .product-quick-view:hover,.item-product-featured .product-extra-link .addcart-link:hover,
	.owl-theme .owl-dots .owl-dot span,.name-cat span,.icon-gallery i,.pagi-nav a,
	.detail-gallery .gallery-control > a,.page-links > a,.btn-menu-fixed,
	.shop-button.bg-color2,.info-manager:before,.banner-slide4 .text-has-border:before,
	.banner-advs4 .text-has-border:before,.box-fresh-info .text-has-border:before,
	.title-home5 .text-has-border:before,.wrap-percent-circle:before,
	.box-best-seller5 .btn-loadmore .product-loadmore
	{background:'.$main_color2.$important.'}'."\n";
	
    $style .= '.bg-color2,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
	.range-filter .ui-slider-range
    {background-color:'.$main_color2.$important.'}'."\n";
	
	$style .='.owl-carousel .owl-nav button
	{background:'.$main_color2.$important.' !important}'."\n";
	
	$style .='.compare:hover
	{color:'.$main_color2.$important.' !important}'."\n";

    $style .= '.main-border2
    {border: 1px solid '.$main_color2.$important.'}'."\n";
	
	list($r, $g, $b) = sscanf($main_color2, "#%02x%02x%02x");
	$style .= '.bg-rgb,.box-testimonal
    {background-color: rgba('.$r.','.$g.','.$b.', 0.1)'.$important.'}'."\n";
}

/*****END MAIN COLOR*****/

/*****BEGIN CUSTOM CSS*****/
$custom_css = s7upf_get_option('custom_css');
if(!empty($custom_css)){
    $style .= $custom_css."\n";
}

/*****END CUSTOM CSS*****/

/*****BEGIN BREADCRUMB COLOR*****/
$bread_color = s7upf_get_option('breadcrumb_text');
$bread_color_hover = s7upf_get_option('breadcrumb_text_hover');
if(is_array($bread_color) && !empty($bread_color)){
    $style .= '.bread-crumb a,.bread-crumb span{';
    $style .= s7upf_fill_css_typography($bread_color);
    $style .= '}'."\n";
}
if(is_array($bread_color_hover) && !empty($bread_color_hover)){
    $style .= '.bread-crumb a:hover{';
    $style .= s7upf_fill_css_typography($bread_color_hover);
    $style .= '}'."\n";
}
/*****END CUSTOM CSS*****/

/*****BEGIN MENU COLOR*****/
$menu_color = s7upf_get_option('sv_menu_color');
$menu_hover = s7upf_get_option('sv_menu_color_hover');
$menu_active = s7upf_get_option('sv_menu_color_active');
$menu_color2 = s7upf_get_option('sv_menu_color2');
$menu_hover2 = s7upf_get_option('sv_menu_color_hover2');
$menu_active2 = s7upf_get_option('sv_menu_color_active2');
if(is_array($menu_color) && !empty($menu_color)){
    $style .= '.main-nav>ul>li>a{';
    $style .= s7upf_fill_css_typography($menu_color);
    $style .= '}'."\n";
}
if(!empty($menu_hover)){
    $style .= 'nav.main-nav > ul>li:hover>a,
    nav.main-nav>ul>li>a:focus,
    nav.main-nav>ul>li.current-menu-item>a,
    nav.main-nav>ul>li.current-menu-ancestor>a
    {color:'.$menu_hover.'}'."\n";
}
if(!empty($menu_active)){
    $style .= 'nav.main-nav>ul>li.current-menu-item>a,
    nav.main-nav>ul>li.current-menu-ancestor>a,
    nav.main-nav>ul>li:hover>a
    {background-color:'.$menu_active.'}'."\n";
}
// Sub menu
if(is_array($menu_color2) && !empty($menu_color2)){
    $style .= 'nav .sub-menu>li>a{';
    $style .= s7upf_fill_css_typography($menu_color2);
    $style .= '}'."\n";
}
if(!empty($menu_hover2)){
    $style .= 'nav.main-nav li:not(.has-mega-menu) .sub-menu li:hover >a,
    nav.main-nav li:not(.has-mega-menu) .sub-menu li>a:focus,
    nav.main-nav .sub-menu li.current-menu-item >a,
    nav.main-nav .sub-menu li.current-menu-ancestor >a
    {color:'.$menu_hover2.'}'."\n";
}
if(!empty($menu_active2)){
    $style .= 'nav.main-nav li:not(.has-mega-menu) .sub-menu li:hover,
    nav.main-nav .sub-menu li.current-menu-item,
    nav.main-nav .sub-menu li.current-menu-ancestor
    {background-color:'.$menu_active2.'}'."\n";
}
/*****END MENU COLOR*****/

/*****BEGIN TYPOGRAPHY*****/
$typo_data = s7upf_get_option('s7upf_custom_typography');
if(is_array($typo_data) && !empty($typo_data)){
    foreach ($typo_data as $value) {
        switch ($value['typo_area']) {
             case 'body':
                $style_class = 'body';
                break;

            case 'header':
                $style_class = '#header';
                break;

            case 'footer':
                $style_class = '#footer';
                break;

            case 'widget':
                $style_class = '#main-content .widget';
                break;
            
            default:
                $style_class = '#main-content';
                break;
        }
        $class_array = explode(',', $style_class);
        $new_class = '';
        if(is_array($class_array)){
            foreach ($class_array as $prefix) {
                $new_class .= $prefix.' '.$value['typo_heading'].',';
            }
        }
        if(!empty($new_class)) $style .= $new_class.' .nocss{';
        $style .= s7upf_fill_css_typography($value['typography_style']);        
        $style .= '}';
        $style .= "\n";
    }
}

/*****END TYPOGRAPHY*****/

$custom_css = s7upf_get_option('custom_css');
if(!empty($custom_css)){
    $style .= $custom_css."\n";
}
if(!empty($style)) echo apply_filters('s7upf_output_content',$style);
?>