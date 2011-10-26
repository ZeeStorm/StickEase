<?
class User_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function create( $obj )
	{
		// Build the data array for the query
		$data = array(
			'user_email' => $obj->user_email,
			'user_password' => $obj->user_password,
			'user_display' => $obj->user_display,
			'user_invited' => (int)$obj->user_invited,
			'user_created' => getNow(),
			'user_updated' => getNow()
		);

		// Insert the data
		if ( $this->db->insert( 'users', $data ) )
		{
			$objUser = new stdClass();
			$objUser->user_id = $this->db->insert_id();
			
			return $objUser;
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 300, $this->lang->line( 'error_300' ) );
			
			return $objResponse;
		}
	}
	
	function delete( $obj )
	{
		// Build the data array for the query
		$data = array(
			'user_updated' => getNow(),
			'user_deleted' => 1
		);
		
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
	
	function edit( $obj )
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
	
	function get_by_email( $obj )
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
	
	function get_by_id( $obj )
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

