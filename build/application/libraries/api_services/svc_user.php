<?
class svc_user extends svc_base
{
	static function create( $response, $obj )
	{
		// verify input data first
		$this->form_validation->set_rules( 'user_email', 'user_email', 'trim|required|valid_email|max_length[255]' );
		$this->form_validation->set_rules( 'user_password', 'user_password', 'required|max_length[100]' );
		$this->form_validation->set_rules( 'user_display', 'user_display', 'trim|required|htmlspecialchars|max_length[75]' );
		
		$objForm = self::validate_form( $obj );
		
		if ( $objForm !== true )
		{
			return $objForm;
		}
		
		$obj_keys = array(
			'user_email',
			'user_password',
			'user_display'
		);
		
		self::filterData( $obj, $obj_keys );
		// Build the data array for the query
		$obj['user_invited'] = 0;
		
		$objResponse = $this->user_model->create( $obj );
		// Insert the data
		if ( get_class( $objResponse ) == 'response' )
		{
			return $objResponse;
		}
		else
		{
			$response->setResponse( $objResponse );
			
			return $response;
		}
	}
	
	static function invite( $response, $obj )
	{
		// verify input data first
		$this->form_validation->set_rules( 'user_email', 'user_email', 'trim|required|valid_email|max_length[255]' );
		
		$objForm = self::validate_form( $obj );
		
		if ( $objForm !== true )
		{
			return $objForm;
		}
		
		$obj_keys = array(
			'user_email'
		);
		
		self::filterData( $obj, $obj_keys );
		// Build the data array for the query
		$obj['user_invited'] = 1;
		$obj['user_display'] = substr( $obj->user_email, 0, 75);
		
		$objResponse = $this->user_model->create( $obj );
		// Insert the data
		if ( get_class( $objResponse ) == 'response' )
		{
			return $objResponse;
		}
		else
		{
			$response->setResponse( $objResponse );
			
			return $response;
		}
	}
	
	static function edit( $response, $obj )
	{
		// Build the data array for the query
		$data = array(
			'user_updated' => getNow()
		);
		
		if ( isset( $obj->user_email ) && is_null( $obj->user_email ) ) {
			$data['user_email'] = $obj->user_email;
		}
		
		if ( isset( $obj->user_password ) && is_null( $obj->user_password ) ) {
			$data['user_password'] = $obj->user_password;
		}
		
		if ( isset( $obj->user_display ) && is_null( $obj->user_display ) ) {
			$data['user_display'] = $obj->user_display;
		}
		
		if ( isset( $obj->user_invited ) && is_numeric( $obj->user_invited ) ) {
			$data['user_invited'] = (int)$obj->user_invited;
		}
		
		$this->db->where( 'user_id', $obj->user_id );

		// Update the data
		if ( $this->db->update( 'users', $data ) )
		{
			return true;
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 300, $this->lang->line( 'error_300' ) );
			
			return $objResponse;
		}
	}
	
	static function get_by_email( $response, $obj )
	{
		$this->db->select( 'user_password' );
		$this->db->where( 'user_email', $obj->user_email );
		$this->db->where( 'user_deleted', 0 );
		$this->db->limit( 1 ); // we only care if they have at least 1, we don't need everything
		
		$query = $this->db->get( 'users' );
		
		if ( $query->num_rows() )
		{
			return $query->row();
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 300, $this->lang->line( 'error_300' ) );
			
			return $objResponse;
		}
	}
	
	static function get_by_id( $response, $obj )
	{
		$this->db->select( 'user_display' );
		$this->db->where( 'user_id', $obj->user_id );
		$this->db->where( 'user_deleted', 0 );
		$this->db->limit( 1 ); // we only care if they have at least 1, we don't need everything
		
		$query = $this->db->get( 'users' );
		
		if ( $query->num_rows() )
		{
			return $query->row();
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 300, $this->lang->line( 'error_300' ) );
			
			return $objResponse;
		}
	}
}