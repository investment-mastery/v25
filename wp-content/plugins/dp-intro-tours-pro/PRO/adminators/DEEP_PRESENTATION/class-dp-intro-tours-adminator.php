<?php

class Dp_Intro_Tours_Adminator extends Dp_Intro_Tours_Adminator_Core {


	public function __construct() {
		parent::__construct();
	}

	public function filter_api_init_data( $data ) {
		$data['consumer_key']    = 'ck_e726c5ceb95924599337fa3391cf3394257b3f30';
		$data['consumer_secret'] = 'cs_95cafa104b982e50c0dedbe8d8b452c02ead7d45';
		return $data;
	}

	public function get_license_key_settings_id() {
		return 'licenseKey';
	}
	public function get_license_key_placeholder() {
		return __( 'License key, that you received after payment at', 'dp-intro-tours' ) . ' deeppresentation.com';
	}

}
