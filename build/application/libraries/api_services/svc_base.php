<?
class svc_base
{
	protected static function validate_form( $obj )
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
	
	protected static function filterData( $obj, $obj_keys )
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
?>