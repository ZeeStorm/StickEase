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

		// Create our response object
		$this->response = new Response();
	}

	public function callMethod( $strMethod, $objOptions )
	{
		$arrMethod = explode( '.', $strMethod );

		$this->objCI->load->library( 'api_services/svc_' . $arrMethod[0] );

		$this->response = call_user_func_array( 'svc_' . $arrMethod[0] . '::' . $arrMethod[1], array( $this, $objOptions ));

		return $this->response;
	}
	
	protected function validate_form( $obj )
	{
		if ( !$this->form_validation->run( $obj ) )
		{
			// validation failed
			$objResponse = new response( false );
			$errors = $this->form_validation->get_errors();
			
			foreach ($errors as $error)
			{
				// only use the first one, array looks like array( int error_code, string message )
				$objResponse->setError( $error[0], $error[1] );
				break;
			}
			
			$this->form_validation->reset();
			return $objResponse;
		}
		
		$this->form_validation->reset();
		
		return true;
	}
	
	protected function filterData( $obj, $obj_keys )
	{
		$filteredObj = new stdClass();
		
		foreach ( $obj_keys as $key )
		{
			if ( isset( $obj->{$key} ) )
			{
				$filteredObj->{$key} = $obj->{$key};
			}
			else
			{
				$filteredObj->{$key} = null;
			}
		}
		
		return $filteredObj;
	}
}