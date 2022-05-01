<?php

include(plugin_dir_path(__FILE__).'functions/display-product-keys.php');
include(plugin_dir_path(__FILE__).'functions/load-keys-for-item.php');

if (!function_exists('get_field')) {
	return;
}

include(plugin_dir_path(__FILE__)).'dependencies/acf-unique_id/acf-unique_id.php';

function trd_load_keys_for_order($order) {
	$keys = [];
	$items = $order->get_items();
	foreach ($items as $item_id => $item) {
		$item_keys = trd_load_keys_for_item($order, $item);
		if (!empty($item_keys)) {
			$keys[$item_id] = [
				"item" => $item,
				"keys" => $item_keys 
			];
		}
	}

	if (count($keys) == count($items)) {
		$order->update_status('wc-completed');
	}

	if (!empty($keys)) {
		trd_display_product_keys($keys);
	}
}

add_action('woocommerce_order_details_after_order_table', 'trd_load_keys_for_order');
