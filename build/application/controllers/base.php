<?
class Base extends CI_Controller
{
	public $api;
	protected $internal_obj = false;

	function __construct()
	{
		parent::__construct();
		
		$this->api = new api();
	}
	
	private function getInput()
	{
		$data = file_get_contents( 'php://input' );
	
		if ( strlen( $data ) > 0 )
		{
			$obj = json_decode( $data );
			
			if ( is_object( $obj ) ) {
				return $obj;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	protected function displayJson( $obj )
	{
		if ( $this->internal_obj === true )
		{
			return $this->load->view( 'json', array( 'json' => $obj ), true );
		}
		else
		{
			// need this here so test suite can return
			header( 'Content-type: application/json' );
			
			$this->load->view( 'json', array( 'json' => $obj ) );
			
			return false;
		}
	}
	
	protected function defaults( $force_obj = null )
	{
		// determine if request is valid
		if ( ( $objResponse = $this->requestCheck() ) !== true )
		{
			return $objResponse;
		}
		
		// get input obj
		if ( $this->internal_obj === true && $force_obj )
		{
			$obj = $objOriginal = $force_obj;
		}
		else
		{
			$obj = $objOriginal = $this->getInput();
		}
		
		if ( !$obj || $obj === false )
		{
			$objResponse = new response( false );
			$objResponse->setError( 105, $this->lang->line( 'error_105' ) );
			
			return $objResponse;
		}
		
		$obj->user_id = null;
		
		if ( $this->session->userdata( 'user_id' ) && is_numeric( $this->session->userdata( 'user_id' ) ) && $this->session->userdata( 'user_id' ) > 0 )
		{
			$obj->user_id = $this->session->userdata( 'user_id' );
		}
		
		return $obj;
	}

	private function requestCheck()
	{
		// skip check if test suite
		if ( $this->internal_obj === true )
		{
			return true;
		}
		
		// all api methods must be called using POST request method
		if ( $_SERVER[ 'REQUEST_METHOD' ] != 'POST' )
		{
			$objResponse = new response( false );
			$objResponse->setError( 103, $this->lang->line( 'error_103' ) );
			
			return $objResponse;
		}
		
		if ( !isset( $_SERVER[ 'CONTENT_TYPE' ] ) )
		{
			$_SERVER[ 'CONTENT_TYPE' ] = '';
		}
		
		$contentTypes = explode( ';', $_SERVER[ 'CONTENT_TYPE' ] );
		
		if ( !$_SERVER[ 'CONTENT_TYPE' ] || count( $contentTypes ) == 0 || 'application/json' != strtolower( trim( $contentTypes[ 0 ] ) ) )
		{
			$objResponse = new response( false );
			$objResponse->setError( 104, $this->lang->line( 'error_104' ) );
			
			return $objResponse;
		}
		
		return true;
	}
	
	protected function gated()
	{
		if ( $this->session->userdata( 'user_id' ) && is_numeric( $this->session->userdata( 'user_id' ) ) && $this->session->userdata( 'user_id' ) > 0 )
		{
			return true;
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 105, $this->lang->line( 'error_105' ) );
			
			return $this->displayJson( $objResponse );
		}
	}
} 