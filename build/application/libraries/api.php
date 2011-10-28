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
		
		$this->objCI->lang->load( 'reference', 'english' );

		// Load the libraries we'll need globally for api calls
		$this->objCI->load->library( 'err' );
		$this->objCI->load->library( 'response' );
		$this->objCI->load->library( 'form_validation' );
		$this->objCI->load->library( 'api_services/svc_base' );

		// Create our response object
		$this->response = new response();
	}

	public function callMethod( $strMethod, $objOptions )
	{
		$arrMethod = explode( '.', $strMethod );

		$this->objCI->load->library( 'api_services/svc_' . $arrMethod[0] );
		
		if ( is_callable( array( 'svc_' . $arrMethod[0], $arrMethod[1] ) ) )
		{
			$this->response = call_user_func_array( 'svc_' . $arrMethod[0] . '::' . $arrMethod[1], array( $this->response, $objOptions ));
		}
		else
		{
			$this->response->setError( 100, $this->lang->line( 'error_100' ) );
		}

		return $this->response;
	}
}