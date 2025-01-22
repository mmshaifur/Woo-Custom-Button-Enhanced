<?php

function wcbe_render_buttons() {
    global $product;

    if (!$product) return;

    // Get settings
    $order_now_text = esc_html(get_option('wcbe_order_now_text', 'Order Now'));
    $customize_text = esc_html(get_option('wcbe_customize_text', 'Customize'));
    $order_now_color = esc_attr(get_option('wcbe_order_now_color', '#f05454'));
    $customize_color = esc_attr(get_option('wcbe_customize_color', '#0073aa'));
    $order_now_hover_color = esc_attr(get_option('wcbe_order_now_hover_color', '#c04545'));
    $customize_hover_color = esc_attr(get_option('wcbe_customize_hover_color', '#005a87'));
    $text_size = esc_attr(get_option('wcbe_button_text_size', '16')) . 'px';
    $border = esc_attr(get_option('wcbe_button_border', '2px solid #000'));
    $border_radius = esc_attr(get_option('wcbe_button_border_radius', '5')) . 'px';
    $text_styles = (array) get_option('wcbe_button_text_style', []);

    // Build CSS styles
    $style = 'font-size: ' . $text_size . '; border: ' . $border . '; border-radius: ' . $border_radius . '; ';
    if (in_array('bold', $text_styles)) {
        $style .= 'font-weight: bold; ';
    }
    if (in_array('italic', $text_styles)) {
        $style .= 'font-style: italic; ';
    }

    $order_now_url = wc_get_cart_url() . '/checkout/?order-now=' . $product->get_id();
    $product_url = get_permalink($product->get_id());

    // Render buttons
    echo '<style>
        .wcbe-order-now:hover { background-color: ' . $order_now_hover_color . '; }
        .wcbe-customize:hover { background-color: ' . $customize_hover_color . '; }
    </style>';
    echo '<div class="wcbe-buttons-container">';
    echo '<a href="' . esc_url($order_now_url) . '" class="wcbe-order-now" style="background-color: ' . $order_now_color . '; ' . $style . '">' . $order_now_text . '</a>';
    echo '<a href="' . esc_url($product_url) . '" class="wcbe-customize" style="background-color: ' . $customize_color . '; ' . $style . '">' . $customize_text . '</a>';
    echo '</div>';
}
