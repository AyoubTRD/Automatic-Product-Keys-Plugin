<?php
	/*
	Plugin Name: Automatic Product Keys
	Description: A plugin allowing dynamic association of keys to orders. This plugin requires you to have the plugin Advanced Custom Fields PRO.
	Author: Ayoub Taouarda
	Version: 0.1.0
	*/

include(plugin_dir_path(__FILE__).'src/fields/keys.php');

function trd_product_keys_on_activate() {
}

trd_register_keys_field();

register_activation_hook(__FILE__, 'trd_product_keys_on_activate');

include(plugin_dir_path(__FILE__).'src/main.php');