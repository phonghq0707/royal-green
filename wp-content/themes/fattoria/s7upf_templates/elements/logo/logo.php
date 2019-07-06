<?php
if(empty($content)) $content = get_bloginfo('name', 'display');
?>
<div class="logo <?php echo esc_attr($el_class)?>">
    <div class="text-logo">
        <?php if($site_title == 'on'):?> <h1 class="color"> <?php endif;?>
            <a href="<?php echo esc_url(home_url('/'))?>">
            	<?php echo wpb_js_remove_wpautop($content, false);?>
            </a>
        <?php if($site_title == 'on'):?> </h1> <?php endif;?>
    </div>
</div>
