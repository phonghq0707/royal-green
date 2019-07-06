<?php
if ( is_active_sidebar( $sidebar) ):?>
	<div class="sidebar <?php echo esc_attr($el_class)?>">
	    <?php dynamic_sidebar($sidebar); ?>
	</div>
<?php endif;?>