<?
class response {

	var $success = true;
	var $response = null;
	//var $error = null;

	public function response( $bSuccess=true )
	{
		$this->success = $bSuccess;
		$this->response = new stdClass();

		return $this;
	}
	
	public function setSuccess( $bSuccess )
	{
		$this->success = $bSuccess;
	}

	public function setError( $intCode, $strMsg )
	{
		$this->success = false;
		$this->response = new err( (int) $intCode, $strMsg );
	}

	public function setResponse( $objResponse )
	{
		$this->response = $objResponse;
	}
}