<?
class api
{
	private $objCI;
	private $objServiceMap;
	public $response;

	function __construct( $objResponse=null, $arrErrors=array())
	{
		// Get our CodeIgniter object
		$this->objCI =& get_instance();

		// Load the libraries we'll need globally for api calls
		$this->objCI->load->library( 'response' );

		// Create our response object
		$this->response = new Response();
	}

	public function callMethod( $strMethod, $objOptions )
	{
		$arrMethod = explode( '.', $strMethod );

		$this->objCI->load->library( 'api_services/svc_' . $arrMethod[0] );

		$this->response = call_user_func_array( 'svc_' . $arrMethod[0] . '::' . $arrMethod[1], array( $this->response, $objOptions ));

		return $this->response;
	}
}