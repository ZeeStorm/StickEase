<?
class Response
{
	public $response;
	public $error = false;
	public $errors = array();

	function __construct( $objResponse=null, $arrErrors=array())
	{
		$this->response = $objResponse;
		$this->errors = $arrErrors;

		if( count( $arrErrors ) > 0 )
		{
			$this->error = true;
		}
	}

	function setResponse( $objResponse )
	{
		$this->response = $objResponse;
	}

	function setError( $strError )
	{
		array_push( $this->errors, $strError );
		$this->error = true;
	}
}