<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view( 'design' );
	}
	
	function board()
	{
		$this->load->view( 'board' );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */