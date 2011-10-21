<?
class Base extends CI_Controller {

	public $api;

	function __construct()
	{
		parent::__construct();

/*		if( getUserId() == 0 && !$this->session->userdata( 'visited' ))
		{
			$this->session->set_userdata( 'visited', true );
			$this->user_model->logInFromCookie();
		}
*/
		$this->api = new api();
	}
} 