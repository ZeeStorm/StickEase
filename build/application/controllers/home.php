<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once( 'base.php' );
class Home extends Base {
	public function index()
	{
		$this->load->view( 'splash' );
	}
	
	function stage()
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