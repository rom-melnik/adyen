<?php
/**
 * Abstract payment request
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2019 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay\Gateways\Adyen
 */

namespace Pronamic\WordPress\Pay\Gateways\Adyen;

/**
 * Abstract payment request
 *
 * @link https://docs.adyen.com/api-explorer/#/PaymentSetupAndVerificationService/v41/payments
 * @link https://docs.adyen.com/api-explorer/#/PaymentSetupAndVerificationService/v41/paymentSession
 *
 * @author  Remco Tolsma
 * @version 1.0.0
 * @since   1.0.0
 */
abstract class AbstractPaymentRequest {
	/**
	 * Amount.
	 *
	 * @var Amount
	 */
	private $amount;

	/**
	 * Billing address.
	 *
	 * @var Address|null
	 */
	private $billing_address;

	/**
	 * Channel.
	 *
	 * The platform where a payment transaction takes place. This field is optional for filtering out
	 * payment methods that are only available on specific platforms. If this value is not set,
	 * then we will try to infer it from the sdkVersion or token.
	 *
	 * Possible values: Android, iOS, Web.
	 *
	 * @var string|null
	 */
	private $channel;

	/**
	 * The shopper country.
	 *
	 * Format: ISO 3166-1 alpha-2 Example: NL or DE
	 *
	 * @var string|null
	 */
	private $country_code;

	/**
	 * The merchant account identifier, with which you want to process the transaction.
	 *
	 * @var string
	 */
	private $merchant_account;

	/**
	 * The reference to uniquely identify a payment. This reference is used in all communication
	 * with you about the payment status. We recommend using a unique value per payment;
	 * however, it is not a requirement. If you need to provide multiple references for
	 * a transaction, separate them with hyphens ("-"). Maximum length: 80 characters.
	 *
	 * @var string
	 */
	private $reference;

	/**
	 * The URL to return to.
	 *
	 * @var string
	 */
	private $return_url;

	/**
	 * The shopper's IP address. 
	 *
	 * @var string|null
	 */
	private $shopper_ip;

	/**
	 * The combination of a language code and a country code to specify the language to be used in the payment.
	 *
	 * @var string|null
	 */
	private $shopper_locale;

	/**
	 * The shopper's full name and gender (if specified)
	 *
	 * @var ShopperName|null
	 */
	private $shopper_name;

	/**
	 * The shopper's reference to uniquely identify this shopper (e.g. user ID or account ID). This field is
	 * required for recurring payments
	 *
	 * @var string|null
	 */
	private $shopper_reference;

	/**
	 * The text to appear on the shopper's bank statement.
	 *
	 * @var string|null
	 */
	private $shopper_statement;

	/**
	 * The shopper's telephone number
	 *
	 * @var string|null
	 */
	private $telephone_number;

	/**
	 * Construct a payment request object.
	 *
	 * @param Amount $amount           The amount information for the transaction.
	 * @param string $merchant_account The merchant account identifier, with which you want to process the transaction
	 * @param string $reference        The reference to uniquely identify a payment.
	 * @param string $return_url       The URL to return to.
	 */
	public function __construct( Amount $amount, $merchant_account, $reference, $return_url ) {
		$this->set_amount( $amount );
		$this->set_merchant_account( $merchant_account );
		$this->set_reference( $reference );
		$this->set_return_url( $return_url );
	}

	/**
	 * Get amount.
	 *
	 * @return Amount
	 */
	public function get_amount() {
		return $this->amount;
	}

	/**
	 * Set amount.
	 *
	 * @param Amount $amount Amount.
	 */
	public function set_amount( Amount $amount ) {
		$this->amount = $amount;
	}

	/**
	 * Get billing address.
	 *
	 * @return Address|null
	 */
	public function get_billing_address() {
		return $this->billing_address;
	}

	/**
	 * Set billing address.
	 *
	 * @param Address|null $billing_address Billing address.
	 */
	public function set_billing_address( Address $billing_address = null ) {
		$this->billing_address = $billing_address;
	}

	/**
	 * Get channel.
	 *
	 * @return string|null
	 */
	public function get_channel() {
		return $this->channel;
	}

	/**
	 * Set channel.
	 *
	 * @param string|null $channel Channel.
	 */
	public function set_channel( $channel ) {
		$this->channel = $channel;
	}

	/**
	 * Get country code.
	 *
	 * @return string|null
	 */
	public function get_country_code() {
		return $this->country_code;
	}

	/**
	 * Set country code.
	 *
	 * @param string|null $country_code Country code.
	 */
	public function set_country_code( $country_code ) {
		$this->country_code = $country_code;
	}

	/**
	 * Get merchant account.
	 *
	 * @return string
	 */
	public function get_merchant_account() {
		return $this->merchant_account;
	}

	/**
	 * Set merchant account.
	 *
	 * @param string $merchant_account Merchant account.
	 */
	public function set_merchant_account( $merchant_account ) {
		$this->merchant_account = $merchant_account;
	}

	/**
	 * Get reference.
	 *
	 * @return string
	 */
	public function get_reference() {
		return $this->reference;
	}

	/**
	 * Set reference.
	 *
	 * @param string $reference Reference.
	 */
	public function set_reference( $reference ) {
		$this->reference = $reference;
	}

	/**
	 * Get return URL.
	 *
	 * @return string
	 */
	public function get_return_url() {
		return $this->return_url;
	}

	/**
	 * Set return URL.
	 *
	 * @param string $return_url Return URL.
	 */
	public function set_return_url( $return_url ) {
		$this->return_url = $return_url;
	}

	/**
	 * Get shopper IP.
	 *
	 * @return string|null
	 */
	public function get_shopper_ip() {
		return $this->shopper_ip;
	}

	/**
	 * Set shopper IP.
	 *
	 * @param string|null $shopper_ip Shopper IP.
	 */
	public function set_shopper_ip( $shopper_ip ) {
		$this->shopper_ip = $shopper_ip;
	}

	/**
	 * Get shopper locale.
	 *
	 * @return string|null
	 */
	public function get_shopper_locale() {
		return $this->shopper_locale;
	}

	/**
	 * Set shopper locale.
	 *
	 * @param string|null $shopper_ip Shopper locale.
	 */
	public function set_shopper_ip( $shopper_locale ) {
		$this->shopper_locale = $shopper_locale;
	}

	/**
	 * Get shopper name.
	 *
	 * @return ShopperName|null
	 */
	public function get_shopper_name() {
		return $this->shopper_name;
	}

	/**
	 * Set shopper name.
	 *
	 * @param ShopperName|null $shopper_name Shopper name.
	 */
	public function set_shopper_name( ShopperName $shopper_name = null ) {
		$this->shopper_name = $shopper_name;
	}

	/**
	 * Get shopper reference.
	 *
	 * @return string|null
	 */
	public function get_shopper_reference() {
		return $this->shopper_reference;
	}

	/**
	 * Set shopper reference.
	 *
	 * @param string|null $shopper_reference Shopper reference.
	 */
	public function set_shopper_reference( $shopper_reference ) {
		$this->shopper_reference = $shopper_reference;
	}

	/**
	 * Get shopper statement.
	 *
	 * @return string|null
	 */
	public function get_shopper_statement() {
		return $this->shopper_statement;
	}

	/**
	 * Set shopper statement.
	 *
	 * @param string|null $shopper_statement Shopper statement.
	 */
	public function set_shopper_statement( $shopper_statement ) {
		$this->shopper_statement = $shopper_statement;
	}

	/**
	 * Get telephone number.
	 *
	 * @return string|null
	 */
	public function get_telephone_number() {
		return $this->telephone_number;
	}

	/**
	 * Set shopper statement.
	 *
	 * @param string|null $telephone_number Telephone number.
	 */
	public function set_telephone_number( $telephone_number ) {
		$this->telephone_number = $telephone_number;
	}

	/**
	 * Get JSON.
	 *
	 * @return object
	 */
	public function get_json() {
		$object = (object) array();

		// Amount.
		$object->amount = $this->get_amount()->get_json();

		// Billing address.
		if ( null !== $this->billing_address ) {
			$object->billingAddress = $this->billing_address->get_json();
		}

		// Channel.
		if ( null !== $this->channel ) {
			$object->channel = $this->channel;
		}

		// Country code.
		if ( null !== $this->country_code ) {
			$object->countryCode = $this->country_code;
		}

		// Merchant account.
		$object->merchantAccount = $this->get_merchant_account();

		// Reference.
		$object->reference = $this->get_reference();

		// Return URL.
		$object->returnUrl = $this->get_return_url();

		// Shopper IP.
		if ( null !== $this->shopper_ip ) {
			$object->shopperIP = $this->shopper_ip;
		}

		// Shopper locale.
		if ( null !== $this->shopper_locale ) {
			$object->shopperLocale = $this->shopper_locale;
		}

		// Shopper name.
		if ( null !== $this->shopper_name ) {
			$object->shopperName = $this->shopper_name->get_json();
		}

		// Shopper reference.
		if ( null !== $this->shopper_reference ) {
			$object->shopperReference = $this->shopper_reference;
		}

		// Shopper statement.
		if ( null !== $this->shopper_statement ) {
			$object->shopperStatement = $this->shopper_statement;
		}

		// Telephone number.
		if ( null !== $this->telephone_number ) {
			$object->telephoneNumber = $this->telephone_number;
		}

		// Return object.
		return $object;
	}
}