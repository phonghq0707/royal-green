<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 */
$page_id = s7upf_get_option('s7upf_404_page');
if(!empty($page_id)){	
	$style = s7upf_get_option('s7upf_404_page_style');
	if($style == 'full-width') {
		get_header('none');
		echo S7upf_Template::get_vc_pagecontent($page_id);
		get_footer('none');
	}
	else{
		get_header(); ?>
		<div id="main-content" class="main-page-default">
		    <?php do_action('s7upf_before_main_content')?>
		    <div class="container">
				<?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
			</div>
			<?php do_action('s7upf_after_main_content')?>
		</div>
		<?php get_footer();
	}
}
else{
	get_header(); ?>
	<div id="main-content" class="main-page-default">
	    <?php do_action('s7upf_before_main_content')?>
	    <div class="container">
	    	<div class="content-default-404">
		    	<div class="row">
		    		<div class="col-md-6 col-sm-6 col-xs-12">
		    			<div class="icon-404">
		    				<span class="number"><?php esc_html_e("404","fattoria")?></span>
		    				<span class="text"><?php esc_html_e("Page Not Found","fattoria")?></span>
		    			</div>
		    		</div>
		    		<div class="col-md-6 col-sm-6 col-xs-12">
		    			<div class="info-404">
		    				<h2><?php esc_html_e("Oops!","fattoria")?></h2>
		    				<h3><?php esc_html_e("Page not found on server","fattoria")?></h3>
		    				<p class="desc"><?php esc_html_e("The link you followed is either outdated, inaccurate or the server has been instructed not to let you have it.","fattoria")?></p>
		    				<a href="<?php echo esc_url(home_url('/'))?>" class="shop-button"><?php esc_html_e("Go to Home","fattoria")?></a>
		    			</div>
		    		</div>
		    	</div>
		    </div>
		</div>
		<?php do_action('s7upf_after_main_content')?>
	</div>
	<?php get_footer(); 
}?>
