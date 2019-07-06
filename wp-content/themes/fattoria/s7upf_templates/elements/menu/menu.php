<?php if($style == 'main-nav2'){ ?>
	<div class="menu-fixed   <?php echo esc_attr($el_class);?>">
        <a href="#" class="btn-menu-fixed dark"><i class="la la-navicon"></i></a>
        <nav class="main-nav-js main-nav-vertical element-menu-style2 js-menu-vertical">
            <div class="title-menu-fixed">
                <h3 class="title18 bg-color white"><?php echo esc_html__('Menu','fattoria')?>
                    <a href="#" title="<?php echo esc_attr__('Close','fattoria')?>" onclick="return false;" class="close-menu-fixed"><i class="la la-times"></i></a>
                </h3>
            </div>
            <?php wp_nav_menu($menu_data);?>
            <a href="#" class="toggle-mobile-menu"><span></span></a>
        </nav>
    </div>
<?php } else { ?>
	<nav class="main-nav <?php echo esc_attr($el_class);?>">
		<?php wp_nav_menu($menu_data);?>
		<a href="#" class="toggle-mobile-menu"><span></span></a>
	</nav>
<?php } ?>