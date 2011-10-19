<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Internal extends CI_Controller
{
	public function get_last_actions()
	{
		require 'application/libraries/stage.io.api-1.0.php';
		
		$response = Stageio_action::get_last_actions();
		
		$this->load->view( 'json', array( 'json' => $response ) );
	}
}