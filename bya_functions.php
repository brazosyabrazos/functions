<?php
/*
Plugin Name: ByA Functions
*/

define ( 'BYA_SHIPPING_BASE_PRICE', 4.75 );
define ( 'BYA_SHIPPING_DISCOUNT_VALUE' , 89 );

class ByA_Functions {

	function __construct() {
		$this->hooks();
	}
	
	function hooks() {
		add_filter( 'wpsc_convert_total_shipping', array( $this, 'total_shipping' ) );
	}

	function total_shipping ( $total ) {
		global $wpsc_cart;

		if ( $wpsc_cart->calculate_subtotal() >= BYA_SHIPPING_DISCOUNT_VALUE ) {
			return $total - BYA_SHIPPING_BASE_PRICE;
		} else {
			return $total;
		}
	}
}
$bya_functions = new ByA_Functions;