<?php
	/*
	Plugin Name: Automatic Product Keys
	Description: A plugin allowing dynamic association of keys to orders. This plugin requires you to have the plugin Advanced Custom Fields PRO.
	Author: Ayoub Taouarda
	Version: 1.0.0
	Text Domain: trdpk
	*/

include(plugin_dir_path(__FILE__).'src/fields/keys.php');

function trd_product_keys_init() {
	$languages_dir = basename(plugin_dir_path(__FILE__)).'\languages';
	$result = load_plugin_textdomain('trdpk', false, $languages_dir);
	trd_register_keys_field();
}

add_action('init', 'trd_product_keys_init');

include(plugin_dir_path(__FILE__).'src/main.php');
