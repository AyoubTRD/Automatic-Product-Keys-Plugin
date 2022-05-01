<?php
function trd_load_keys_for_item($order, $item) {
	global $trd_order_number;
	$trd_order_number = $order->get_id();

	$all_keys = get_field('trd_keys', $item->get_product_id());

	$order_keys = array_filter($all_keys, function($key, $k) {
		global $trd_order_number;
		return $key["order_number"] == strval($trd_order_number);
	}, ARRAY_FILTER_USE_BOTH);

	$needs_update = count($order_keys) == 0;
	$has_enough_keys = true;
	if ($needs_update) {
		$max = $item->get_quantity();
		$found = 0;
		for ($i = 0; $i < count($all_keys); $i++) {
			$key = $all_keys[$i];
			if (count($order_keys) == $max) break;
			if (!$key["order_number"]) {
				$key["order_number"] = $trd_order_number;
				array_push($order_keys, $key);
				$found++;
			}
		}
		$has_enough_keys = $max == $found;
	}

	if ($has_enough_keys && $needs_update) {
		$new_keys = [];
		for ($i = 0; $i < count($all_keys); $i++) {
			$key_updated = false;
			for ($j = 0; $j < count($order_keys); $j++) {
				if ($order_keys[$j]['id'] == $all_keys[$i]['id']) {
					$key_updated = true;
					array_push($new_keys, $order_keys[$j]);
				}
			}
			if (!$key_updated) {
				array_push($new_keys, $all_keys[$i]);
			}
		}
		update_field("trd_keys", $new_keys, $item->get_product_id());
	}

	if (!$has_enough_keys) {
		return [];
	}
	return $order_keys;
}
