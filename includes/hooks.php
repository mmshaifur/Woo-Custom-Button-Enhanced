<?php

add_action('woocommerce_after_shop_loop_item', 'wcbe_render_buttons', 15);
add_action('woocommerce_single_product_summary', 'wcbe_render_buttons', 35);

// Remove default "Add to Cart" buttons
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
