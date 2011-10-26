<?
class User_model extends Base_model {
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
			'user_invite' => (int)$obj->user_invite,
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
			$objResponse->setError( 301, $this->lang->line( 'error_301' ) );
			
			return $objResponse;
		}
	}
	
	function delete( $obj )
	{
		$this->db->where( 'user_id', $obj->user_id );
		$this->db->limit( 1 );
		$this->db->delete( 'users' );
		
		return true;
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
		
		if ( isset( $obj->user_invite ) && is_numeric( $obj->user_invite ) ) {
			$data['user_invite'] = (int)$obj->user_invite;
		}

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
			$objResponse->setError( 301, $this->lang->line( 'error_301' ) );
			
			return $objResponse;
		}
	}
	
	function get_by_email( $obj )
	{
		$this->db->select( 'user_password' );
		$this->db->where( 'user_slug', $obj->user_slug );
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

///////////////////////////// FROM MOBVIA
	private function newUrl( $strTitle, $intCount=0 )
	{
		$strUrl = url_title( $strTitle, 'dash', true );
		
		if( $intCount > 0 )
		{
			$strUrl .= '-' . ($intCount+1);
		}
		
		$this->db->select( 'user_id' );
		$this->db->where( 'user_slug', $strUrl );
		$this->db->limit( 1 );
		
		$query = $this->db->get( 'users' );
		
		if ( $query->num_rows() > 0 )
		{
			return $this->newUrl( $strTitle, ($intCount+1));
		}
		else
		{
			return $strUrl;
		}
	}
}

