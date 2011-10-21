<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once( 'base.php' );
class Home extends Base {
	public function index()
	{
		$this->load->view( 'design' );
	}
	
	function board()
	{
		$this->load->view( 'board' );
	}

	function testapi()
	{
		echo json_encode( $this->api->callMethod( 'board.get_by_slug', array( 'slug' => 'team-zx2' )));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */