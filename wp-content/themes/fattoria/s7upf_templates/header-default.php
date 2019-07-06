<?php
$page_id = apply_filters('s7upf_header_page_id',s7upf_get_value_by_id('s7upf_header_page'));
if(!empty($page_id)){?>
    <div id="header" class="header-page">
        <div class="container">
            <?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
        </div>
    </div>
<?php
}
else{?>
    <div id="header" class="header header-default">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="header-top-default">
						<div class="logo">
							<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr__("logo","fattoria");?>">
								<?php $s7upf_logo=s7upf_get_option('logo');?>
								<?php if($s7upf_logo!=''){
									echo '<h1 class="hidden">'.get_bloginfo('name', 'display').'</h1><img src="' . esc_url($s7upf_logo) . '" alt="'.esc_attr__("logo","fattoria").'">';
								}   else { echo '<h1>'.get_bloginfo('name', 'display').'</h1>'; }
								?>
							</a>
						</div>
					</div> 
				</div>
				<div class="col-md-9">
					<?php if ( has_nav_menu( 'primary' ) ) {?>
					<div class="header-nav-default">
						<div class="container">
							<nav class="main-nav">
							<?php wp_nav_menu( array(
									'theme_location'    => 'primary',
									'container'         =>false,
									'walker'            =>new S7upf_Walker_Nav_Menu(),
								 )
							);?>
								<a href="#" class="toggle-mobile-menu"><span></span></a>
							 </nav>
						</div>
					</div>
				</div>
			</div>
		</div>
        <?php } ?>                    
    </div>
<?php
}
?>
