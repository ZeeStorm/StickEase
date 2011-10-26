<?
class Project_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function create( $obj )
	{
		// Build the data array for the query
		$data = array(
			'user_id' => $obj->user_id,
			'project_name' => $obj->project_name,
			'project_created' => getNow(),
			'project_updated' => getNow()
		);

		// Insert the data
		if ( $this->db->insert( 'projects', $data ) )
		{
			$objUser = new stdClass();
			$objUser->user_id = $this->db->insert_id();
			
			return $objUser;
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 400, $this->lang->line( 'error_400' ) );
			
			return $objResponse;
		}
	}
	
	function delete( $obj )
	{
		// Build the data array for the query
		$data = array(
			'project_updated' => getNow(),
			'project_deleted' => 1
		);
		
		$this->db->where( 'project_id', $obj->project_id );

		// Update the data
		if ( $this->db->update( 'projects', $data ) )
		{
			return true;
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 400, $this->lang->line( 'error_400' ) );
			
			return $objResponse;
		}
	}
	
	function edit( $obj )
	{
		// Build the data array for the query
		$data = array(
			'project_updated' => getNow()
		);
		
		if ( isset( $obj->project_name ) && is_null( $obj->project_name ) ) {
			$data['project_name'] = $obj->project_name;
		}
		
		if ( isset( $obj->user_id ) && is_null( $obj->user_id ) ) {
			$data['user_id'] = $obj->user_id;
		}
		
		$this->db->where( 'project_id', $obj->project_id );

		// Update the data
		if ( $this->db->update( 'projects', $data ) )
		{
			return true;
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 400, $this->lang->line( 'error_400' ) );
			
			return $objResponse;
		}
	}
	
	function remove_from_project( $obj )
	{
		$this->db->select(
	}
	
	function get_all_user_projects( $obj )
	{
		$this->db->select( 'projects.project_id, project_name' );
		$this->db->where( 'users_x_projects.user_id', $obj->user_id );
		$this->db->where( 'projects.project_deleted', 0 );
		$this->db->join( 'projects', 'projects.project_id = users_x_projects.project_id' );
		
		$query = $this->db->get( 'projects' );
		
		if ( $query->num_rows() )
		{
			return $query->row();
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 400, $this->lang->line( 'error_400' ) );
			
			return $objResponse;
		}
	}
	
	function get_by_id( $obj )
	{
		$this->db->select( 'project_id, project_name, user_id' );
		$this->db->where( 'project_id', $obj->project_id );
		$this->db->limit( 1 ); // we only care if they have at least 1, we don't need everything
		
		$query = $this->db->get( 'projects' );
		
		if ( $query->num_rows() )
		{
			return $query->row();
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 400, $this->lang->line( 'error_400' ) );
			
			return $objResponse;
		}
	}
	
	function get_by_project_owner( $obj )
	{
		$this->db->select( 'project_id' );
		$this->db->where( 'project_id', $obj->project_id );
		$this->db->where( 'user_id', $obj->user_id );
		$this->db->limit( 1 ); // we only care if they have at least 1, we don't need everything
		
		$query = $this->db->get( 'projects' );
		
		if ( $query->num_rows() )
		{
			return $query->row();
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 401, $this->lang->line( 'error_401' ) );
			
			return $objResponse;
		}
	}
}

