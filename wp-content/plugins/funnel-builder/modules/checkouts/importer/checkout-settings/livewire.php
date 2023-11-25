<?php
$advanced_field = WFACP_Common::get_advanced_fields();
$settings       = [
	'show_on_next_step'          => [
		'single_step' => [
			'billing_email'       => 'true',
			'billing_first_name'  => 'true',
			'billing_last_name'   => 'true',
			'address'             => 'true',
			'shipping-address'    => 'true',
			'billing_phone'       => 'true',
			'shipping_calculator' => 'true',
		],
	],
	'enable_phone_flag'          => 'true',
	'enable_phone_validation'    => 'true',
	'autocomplete_enable'        => 'false',
	'autocomplete_google_key'    => '',
	'preferred_countries_enable' => 'false',
	'preferred_countries'        => '',
];

$steps = [
	'single_step' => [
		'name'          => __( 'Step 1', 'woofunnels-aero-checkout' ),
		'slug'          => 'single_step',
		'friendly_name' => __( 'Single Step Checkout', 'woofunnels-aero-checkout' ),
		'active'        => 'yes',
	],
	'two_step'    => [
		'name'          => __( 'Step 2', 'woofunnels-aero-checkout' ),
		'slug'          => 'two_step',
		'friendly_name' => __( 'Two Step Checkout', 'woofunnels-aero-checkout' ),
		'active'        => 'no',
	],
	'third_step'  => [
		'name'          => __( 'Step 3', 'woofunnels-aero-checkout' ),
		'slug'          => 'third_step',
		'friendly_name' => __( 'Three Step Checkout', 'woofunnels-aero-checkout' ),
		'active'        => 'no',
	],
];

$pageLayout = [
	'steps'                       => $steps,
	'fieldsets'                   => [
		'single_step' => [
			[
				'name'        => __( 'Customer Information', 'woofunnels-aero-checkout' ),
				'class'       => '',
				'sub_heading' => '',
				'fields'      => [
					[
						'label'        => __( 'Email', 'woocommerce' ),
						'required'     => 'true',
						'type'         => 'email',
						'class'        => [ 0 => 'form-row-wide', ],
						'validate'     => [ 0 => 'email', ],
						'autocomplete' => 'email username',
						'priority'     => '110',
						'id'           => 'billing_email',
						'field_type'   => 'billing',
						'placeholder'  => '',
					],
					[
						'label'        => __( 'First name', 'woocommerce' ),
						'required'     => 'true',
						'class'        => [ 0 => 'form-row-first', ],
						'autocomplete' => 'given-name',
						'priority'     => '10',
						'type'         => 'text',
						'id'           => 'billing_first_name',
						'field_type'   => 'billing',
						'placeholder'  => '',
					],
					[
						'label'        => __( 'Last name', 'woocommerce' ),
						'required'     => 'true',
						'class'        => [ 0 => 'form-row-last', ],
						'autocomplete' => 'family-name',
						'priority'     => '20',
						'type'         => 'text',
						'id'           => 'billing_last_name',
						'field_type'   => 'billing',
						'placeholder'  => '',
					],


					[
						'label'        => __( 'Phone', 'woocommerce' ),
						'type'         => 'tel',
						'class'        => [ 'form-row-wide' ],
						'id'           => 'billing_phone',
						'field_type'   => 'billing',
						'validate'     => [ 'phone' ],
						'placeholder'  => '',
						'autocomplete' => 'tel',
						'priority'     => 100,
					],
				],
			],

			[
				'name'        => __( 'Shipping Address', 'woofunnels-aero-checkout' ),
				'class'       => '',
				'sub_heading' => '',
				'fields'      => [
					WFACP_Common::get_single_address_fields( 'shipping' ),
					WFACP_Common::get_single_address_fields()
				],
			],
			[
				'name'        => __( 'Shipping Method', 'woofunnels-aero-checkout' ),
				'class'       => '',
				'sub_heading' => '',
				'html_fields' => [ 'shipping_calculator' => true ],
				'fields'      => [
					isset( $advanced_field['shipping_calculator'] ) ? $advanced_field['shipping_calculator'] : []
				],
			],
		],

	],
	'product_settings'            => [
		'coupons'                             => '',
		'enable_coupon'                       => 'false',
		'disable_coupon'                      => 'false',
		'hide_quantity_switcher'              => 'false',
		'enable_delete_item'                  => 'false',
		'hide_product_image'                  => 'false',
		'is_hide_additional_information'      => 'true',
		'additional_information_title'        =>  __( 'WHAT\'S INCLUDED IN YOUR PLAN?', 'woofunnels-aero-checkout' ),
		'hide_quick_view'                     => 'false',
		'hide_you_save'                       => 'true',
		'hide_best_value'                     => 'false',
		'best_value_product'                  => '',
		'best_value_text'                     => 'Best Value',
		'best_value_position'                 => 'above',
		'enable_custom_name_in_order_summary' => 'false',

		'product_switcher_template' => 'default',
	],
	'have_coupon_field'           => 'true',
	'have_billing_address'        => 'true',
	'have_shipping_address'       => 'true',
	'have_billing_address_index'  => '7',
	'have_shipping_address_index' => '6',
	'enabled_product_switching'   => 'yes',
	'have_shipping_method'        => 'true',
	'current_step'                => 'single_step',
];


return [
	'page_layout'   => $pageLayout,
	'page_settings' => $settings,
];
