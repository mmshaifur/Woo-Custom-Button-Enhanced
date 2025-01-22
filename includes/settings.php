<?php

// Register settings
add_action('admin_init', 'wcbe_register_settings');
function wcbe_register_settings() {
    register_setting('wcbe_settings_group', 'wcbe_order_now_text');
    register_setting('wcbe_settings_group', 'wcbe_customize_text');
    register_setting('wcbe_settings_group', 'wcbe_button_pages');
    register_setting('wcbe_settings_group', 'wcbe_button_text_style');
    register_setting('wcbe_settings_group', 'wcbe_show_order_now'); // Show/Hide Order Now
    register_setting('wcbe_settings_group', 'wcbe_show_customize'); // Show/Hide Customize
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
                <tr>
                    <th>Order Now Text</th>
                    <td><input type="text" name="wcbe_order_now_text" value="<?php echo esc_attr(get_option('wcbe_order_now_text', 'Order Now')); ?>"></td>
                </tr>
                <tr>
                    <th>Customize Text</th>
                    <td><input type="text" name="wcbe_customize_text" value="<?php echo esc_attr(get_option('wcbe_customize_text', 'Customize')); ?>"></td>
                </tr>
                <tr>
                    <th>Display Buttons On</th>
                    <td>
                        <select name="wcbe_button_pages">
                            <option value="shop" <?php selected(get_option('wcbe_button_pages'), 'shop'); ?>>Shop Page</option>
                            <option value="single" <?php selected(get_option('wcbe_button_pages'), 'single'); ?>>Single Product Page</option>
                            <option value="both" <?php selected(get_option('wcbe_button_pages'), 'both'); ?>>Both</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Show "Order Now" Button</th>
                    <td>
                        <input type="radio" name="wcbe_show_order_now" value="yes" <?php checked(get_option('wcbe_show_order_now', 'yes'), 'yes'); ?>> Yes<br>
                        <input type="radio" name="wcbe_show_order_now" value="no" <?php checked(get_option('wcbe_show_order_now', 'yes'), 'no'); ?>> No
                    </td>
                </tr>
                <tr>
                    <th>Show "Customize" Button</th>
                    <td>
                        <input type="radio" name="wcbe_show_customize" value="yes" <?php checked(get_option('wcbe_show_customize', 'yes'), 'yes'); ?>> Yes<br>
                        <input type="radio" name="wcbe_show_customize" value="no" <?php checked(get_option('wcbe_show_customize', 'yes'), 'no'); ?>> No
                    </td>
                </tr>
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
