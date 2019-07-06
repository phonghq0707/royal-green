<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package 7up-framework
 */

?>
	    <?php echo s7upf_get_template('footer-default');?>
	    <?php echo s7upf_get_template('scroll-top');?>
	    <?php echo s7upf_get_template('wishlist-notification');?>
	    <?php echo s7upf_get_template('tool-panel');?>
	    <?php s7upf_content_form_popup()?>
    </div>
<?php wp_footer(); ?>
</body>
</html>
