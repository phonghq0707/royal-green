<?php
if (!defined('ABSPATH')) {
    die;
}
?>
<div class="wrap bb_wrap bb_edo_settings" id="bb-edo-settings">
    <h2 class="bb-headtitle"><?php esc_html_e('Responsive for WPBakery Page Builder - General Settings', '7up-core') ?></h2>

	<form id="bb-form" method="post" action="">
		<div class="bb-form">
			<div class="bb-field-row">
				<div class="bb-label">
					<label><?php esc_html_e('Mode Elements Option by themselves', '7up-core') ?></label>
				</div>
				<div class="bb-field">
					<select name="option_by_elements" id="bb_edo_option_by_themselves">
						<option value="" <?php echo ($this->option_by_elements == '')?'selected="selected"' : ''; ?>><?php esc_html_e('Disable', '7up-core') ?></option>
						<option value="all" <?php echo ($this->option_by_elements == 'all')?'selected="selected"' : ''; ?>><?php esc_html_e('All of Elements', '7up-core') ?></option>
						<option value="custom" <?php echo ($this->option_by_elements == 'custom')?'selected="selected"' : ''; ?>><?php esc_html_e('Custom Elements', '7up-core') ?></option>
					</select>

					<p id="bb_edo_option_by_themselves_custom" class="bb_edo_icon_depend">
						<textarea name="custom_elements"><?php echo esc_textarea( $this->custom_elements ) ?></textarea>
					</p>
				</div>
				<div class="bb-desc">
					<?php esc_html_e("'All of Elements' only apply to elements have available 'Design Options'", '7up-core') ?>
				</div>
			</div>
			<div class="bb-field-row">
				<div class="bb-label">
					<label><?php esc_html_e('Menu tab position', '7up-core') ?></label>
				</div>
				<div class="bb-field">
					<select name="menu_tab_position">
						<option value="top" <?php echo ($this->menu_tab_position == 'top')?'selected="selected"' : ''; ?>><?php esc_html_e('Top', '7up-core') ?></option>
						<option value="right" <?php echo ($this->menu_tab_position == 'right')?'selected="selected"' : ''; ?>><?php esc_html_e('Right', '7up-core') ?></option>
					</select>
				</div>
				<div class="bb-desc">
				</div>
			</div>
		</div>

		<input type="hidden" name="s7upf_res_update_general" value="1">
		<button type="submit" name="submit" class="button success">
			<span class="dashicons dashicons-admin-generic"></span>
			<?php esc_html_e('Save Changes', '7up-core') ?>
		</button>
	</form>

</div>
