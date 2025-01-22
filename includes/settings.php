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
                <tr>
                    <th>Order Now Hover Color</th>
                    <td><input type="color" name="wcbe_order_now_hover_color" value="<?php echo esc_attr(get_option('wcbe_order_now_hover_color', '#c04545')); ?>"></td>
                </tr>
                <tr>
                    <th>Customize Hover Color</th>
                    <td><input type="color" name="wcbe_customize_hover_color" value="<?php echo esc_attr(get_option('wcbe_customize_hover_color', '#005a87')); ?>"></td>
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
                <!-- Text Style -->
                <tr>
                    <th>Text Style</th>
                    <td>
                        <input type="checkbox" name="wcbe_button_text_style[]" value="bold" <?php echo in_array('bold', (array) get_option('wcbe_button_text_style', [])) ? 'checked' : ''; ?>> Bold<br>
                        <input type="checkbox" name="wcbe_button_text_style[]" value="italic" <?php echo in_array('italic', (array) get_option('wcbe_button_text_style', [])) ? 'checked' : ''; ?>> Italic
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
