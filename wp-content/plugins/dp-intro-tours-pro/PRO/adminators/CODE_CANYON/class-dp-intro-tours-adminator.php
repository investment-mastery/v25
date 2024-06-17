<?php

class Dp_Intro_Tours_Adminator extends Dp_Intro_Tours_Adminator_Core {


	public function __construct() {
		parent::__construct();
	}

	public function get_license_key_settings_id() {
		return 'licenseKey_CC';
	}
	public function get_license_key_placeholder() {
		return __( 'Purchase Code (CodeCanyon), that you received after payment at codecanyon.net', 'dp-intro-tours' );
	}

	public function get_license_key_title() {
		return __( 'Purchase Code', 'dp-intro-tours' );
	}
}
