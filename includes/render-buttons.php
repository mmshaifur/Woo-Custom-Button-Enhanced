<?php

function wcbe_render_buttons() {
    global $product;

    if (!$product) return;

    // Get settings
    $order_now_text = esc_html(get_option('wcbe_order_now_text', 'Order Now'));
    $customize_text = esc_html(get_option('wcbe_customize_text', 'Customize'));
    $order_now_color = esc_attr(get_option('wcbe_order_now_color', '#f05454'));
    $customize_color = esc_attr(get_option('wcbe_customize_color', '#0073aa'));
    $text_size = esc_attr(get_option('wcbe_button_text_size', '16')) . 'px';
    $border = esc_attr(get_option('wcbe_button_border', '2px solid #000'));
    $border_radius = esc_attr(get_option('wcbe_button_border_radius', '5')) . 'px';
    $predefined_style = esc_attr(get_option('wcbe_predefined_style', 'default'));
    $custom_css = get_option('wcbe_custom_css', '');

    // Build button styles
    $button_style = 'font-size: ' . $text_size . '; border: ' . $border . '; border-radius: ' . $border_radius . '; ';
    $order_now_url = wc_get_cart_url() . '/checkout/?order-now=' . $product->get_id();
    $product_url = get_permalink($product->get_id());

    // Predefined container styles
    $container_style = '';
    if ($predefined_style === 'centered') {
        $container_style = 'display: flex; justify-content: center; gap: 10px;';
    } elseif ($predefined_style === 'inline') {
        $container_style = 'display: inline-flex; gap: 10px;';
    } elseif ($predefined_style === 'spaced') {
        $container_style = 'display: flex; justify-content: center; gap: 20px;'; // Spaced style with gap
    }

    // Render buttons
    echo '<style>' . $custom_css . '</style>';
    echo '<div class="wcbe-buttons-container" style="' . $container_style . '">';
    echo '<a href="' . esc_url($order_now_url) . '" class="wcbe-order-now" style="background-color: ' . $order_now_color . '; ' . $button_style . '">' . $order_now_text . '</a>';
    echo '<a href="' . esc_url($product_url) . '" class="wcbe-customize" style="background-color: ' . $customize_color . '; ' . $button_style . '">' . $customize_text . '</a>';
    echo '</div>';
}
