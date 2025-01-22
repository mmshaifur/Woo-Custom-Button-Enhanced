<?php

// Register settings
add_action('admin_init', 'wcbe_register_settings');
function wcbe_register_settings() {
    register_setting('wcbe_settings_group', 'wcbe_order_now_text');
    register_setting('wcbe_settings_group', 'wcbe_customize_text');
    register_setting('wcbe_settings_group', 'wcbe_button_pages');
    register_setting('wcbe_settings_group', 'wcbe_button_text_style');
    register_setting('wcbe_settings_group', 'wcbe_order_now_color');
    register_setting('wcbe_settings_group', 'wcbe_customize_color');
    register_setting('wcbe_settings_group', 'wcbe_order_now_hover_color');
    register_setting('wcbe_settings_group', 'wcbe_customize_hover_color');
    register_setting('wcbe_settings_group', 'wcbe_button_text_size');
    register_setting('wcbe_settings_group', 'wcbe_button_border');
    register_setting('wcbe_settings_group', 'wcbe_button_border_radius');
    register_setting('wcbe_settings_group', 'wcbe_custom_css'); // Custom CSS field
    register_setting('wcbe_settings_group', 'wcbe_predefined_style'); // Predefined styles
}

// Add settings page
add_action('admin_menu', 'wcbe_add_settings_page');
function wcbe_add_settings_page() {
    add_menu_page(
        'Custom Buttons Settings',
        'Button Settings',
        'manage_options',
        'wcbe-settings',
        'wcbe_render_settings_page',
        'dashicons-admin-generic',
        100
    );
}

// Render settings page
function wcbe_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Custom Buttons Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('wcbe_settings_group');
            do_settings_sections('wcbe_settings_group');
            ?>
            <table class="form-table">
                <!-- Button Text -->
                <tr>
                    <th>Order Now Button Text</th>
                    <td><input type="text" name="wcbe_order_now_text" value="<?php echo esc_attr(get_option('wcbe_order_now_text', 'Order Now')); ?>"></td>
                </tr>
                <tr>
                    <th>Customize Button Text</th>
                    <td><input type="text" name="wcbe_customize_text" value="<?php echo esc_attr(get_option('wcbe_customize_text', 'Customize')); ?>"></td>
                </tr>
                <!-- Color Settings -->
                <tr>
                    <th>Order Now Button Color</th>
                    <td><input type="color" name="wcbe_order_now_color" value="<?php echo esc_attr(get_option('wcbe_order_now_color', '#f05454')); ?>"></td>
                </tr>
                <tr>
                    <th>Customize Button Color</th>
                    <td><input type="color" name="wcbe_customize_color" value="<?php echo esc_attr(get_option('wcbe_customize_color', '#0073aa')); ?>"></td>
                </tr>
                <!-- Text Size -->
                <tr>
                    <th>Button Text Size (px)</th>
                    <td><input type="number" name="wcbe_button_text_size" value="<?php echo esc_attr(get_option('wcbe_button_text_size', '16')); ?>" min="10" max="30"></td>
                </tr>
                <!-- Border Settings -->
                <tr>
                    <th>Button Border (e.g., 2px solid #000)</th>
                    <td><input type="text" name="wcbe_button_border" value="<?php echo esc_attr(get_option('wcbe_button_border', '2px solid #000')); ?>"></td>
                </tr>
                <tr>
                    <th>Button Border Radius (px)</th>
                    <td><input type="number" name="wcbe_button_border_radius" value="<?php echo esc_attr(get_option('wcbe_button_border_radius', '5')); ?>" min="0" max="50"></td>
                </tr>
                <!-- Predefined Styles -->
<tr>
    <th>Predefined Button Style</th>
    <td>
        <select name="wcbe_predefined_style">
            <option value="default" <?php selected(get_option('wcbe_predefined_style', 'default'), 'default'); ?>>Default</option>
            <option value="centered" <?php selected(get_option('wcbe_predefined_style', 'centered'), 'centered'); ?>>Centered</option>
            <option value="inline" <?php selected(get_option('wcbe_predefined_style', 'inline'), 'inline'); ?>>Inline</option>
            <option value="spaced" <?php selected(get_option('wcbe_predefined_style', 'spaced'), 'spaced'); ?>>Spaced Buttons</option>
        </select>
    </td>
</tr>

                <!-- Custom CSS -->
                <tr>
                    <th>Custom CSS</th>
                    <td><textarea name="wcbe_custom_css" rows="5" cols="50"><?php echo esc_textarea(get_option('wcbe_custom_css', '')); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
