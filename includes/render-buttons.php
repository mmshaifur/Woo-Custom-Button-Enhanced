<?php

function wcbe_render_buttons() {
    global $product;

    if (!$product) return;

    // Get settings
    $order_now_text = esc_html(get_option('wcbe_order_now_text', 'Order Now'));
    $customize_text = esc_html(get_option('wcbe_customize_text', 'Customize'));
    $button_pages = get_option('wcbe_button_pages', 'both');
    $show_order_now = get_option('wcbe_show_order_now', 'yes');
    $show_customize = get_option('wcbe_show_customize', 'yes');
    $text_styles = (array) get_option('wcbe_button_text_style', []);

    $style = '';
    if (in_array('bold', $text_styles)) {
        $style .= 'font-weight: bold; ';
    }
    if (in_array('italic', $text_styles)) {
        $style .= 'font-style: italic; ';
    }

    $order_now_url = wc_get_cart_url() . '/checkout/?order-now=' . $product->get_id();
    $product_url = get_permalink($product->get_id());

    // Build buttons based on settings
    $buttons = '<div class="wcbe-buttons-container">';
    if ($show_order_now === 'yes') {
        $buttons .= '<a href="' . esc_url($order_now_url) . '" class="wcbe-order-now" style="' . $style . '">' . $order_now_text . '</a>';
    }
    if ($show_customize === 'yes') {
        $buttons .= '<a href="' . esc_url($product_url) . '" class="wcbe-customize" style="' . $style . '">' . $customize_text . '</a>';
    }
    $buttons .= '</div>';

    // Display buttons based on selected pages
    if ($button_pages === 'shop' && is_shop()) {
        echo $buttons;
    } elseif ($button_pages === 'single' && is_product()) {
        echo $buttons;
    } elseif ($button_pages === 'both') {
        echo $buttons;
    }
}
