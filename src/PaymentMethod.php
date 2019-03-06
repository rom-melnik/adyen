<?php
/**
 * Payment method
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2019 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay\Gateways\Adyen
 */

namespace Pronamic\WordPress\Pay\Gateways\Adyen;

/**
 * Payment method
 *
 * @author  Remco Tolsma
 * @version 2.1.0
 * @since   2.0.2
 */
class PaymentMethod {
	/**
	 * Type.
	 *
	 * @var string
	 */
	public $type;

	/**
	 * Construct a payment method.
	 *
	 * @param string $type Adyen payment method type.
	 */
	public function __construct( $type ) {
		$this->type = $type;
	}

	/**
	 * Get type.
	 *
	 * @return string
	 */
	public function get_type() {
		return $this->type;
	}

	/**
	 * Get JSON.
	 *
	 * @return object
	 */
	public function get_json() {
		return (object) (array) $this;
	}
}
