<?php 
function trd_register_how_to_activate() {
				if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_62702dd3c02a4',
	'title' => 'How to activate',
	'fields' => array(
		array(
			'key' => 'field_62702dfda92e6',
			'label' => 'How to activate',
			'name' => 'trd_how_to_activate',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;		
}