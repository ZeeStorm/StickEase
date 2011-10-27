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
		$this->db->set( 'project_updated', getNow() );
		$this->db->set( 'project_deleted', 1 );;
		
		$this->db->where( 'project_id', $obj->project_id );
		$this->db->where( 'project_deleted', 0 );

		// Update the data
		if ( $this->db->update( 'projects' ) )
		{
			if ( $this->db->affected_rows() > 0 )
			{
				$this->db->set( 'uxp_updated', getNow() );
				$this->db->set( 'uxp_deleted', 1 );
				
				$this->db->where( 'project_id', $obj->project_id );
		
				// Update the data
				if ( $this->db->update( 'users_x_projects' ) )
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return true;
			}
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
		$this->db->set( 'project_updated', getNow() );
		
		if ( isset( $obj->project_name ) && is_null( $obj->project_name ) ) {
			$this->db->set( 'project_name', $obj->project_name );
		}
		
		if ( isset( $obj->user_id ) && is_null( $obj->user_id ) ) {
			$this->db->set( 'user_id', $obj->user_id );
		}
		
		$this->db->where( 'project_id', $obj->project_id );

		// Update the data
		if ( $this->db->update( 'projects' ) )
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
	
	function remove_user_from_project( $obj )
	{
		$this->db->set( 'uxp_deleted', 1 );
		$this->db->set( 'uxp_updated', getNow() );
		
		$this->db->where( 'user_id', $obj->user_id );
		$this->db->where( 'project_id', $obj->project_id );
		$this->db->where( 'uxp_deleted', 0 ); // only delete if not yet deleted
		
		$this->db->limit( 1 );

		// Update the data
		if ( $this->db->update( 'users_x_projects' ) )
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
	
	function add_user_to_project( $obj )
	{
		$this->db->set( 'user_id', $obj->user_id );
		$this->db->set( 'project_id', $obj->project_id );
		$this->db->set( 'uxp_created', getNow() );
		$this->db->set( 'uxp_updated', getNow() );

		if ( $this->db->insert( 'users_x_projects' ) )
		{
			return true;
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 402, $this->lang->line( 'error_402' ) );
			
			return $objResponse;
		}
	}
	
	function get_all_user_projects( $obj )
	{
		$this->db->select( 'projects.project_id, projects.project_name' );
		$this->db->where( 'users_x_projects.user_id', $obj->user_id );
		$this->db->where( 'projects.project_deleted', 0 );
		$this->db->where( 'users_x_projects.uxp_deleted', 0 );
		$this->db->join( 'projects', 'projects.project_id = users_x_projects.project_id' );
		
		$query = $this->db->get( 'projects' );
		
		if ( $query->num_rows() )
		{
			return $query->result();
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 400, $this->lang->line( 'error_400' ) );
			
			return $objResponse;
		}
	}
	
	function get_user_project(  $obj )
	{
		$this->db->select( 'users_x_projects.uxp_id, projects.project_name' );
		$this->db->where( 'users_x_projects.user_id', $obj->user_id );
		$this->db->where( 'users_x_projects.project_id', $obj->project_id );
		$this->db->where( 'projects.project_deleted', 0 );
		$this->db->where( 'users_x_projects.uxp_deleted', 0 );
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
		$this->db->where( 'project_deleted', 0 );
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
		$this->db->where( 'project_deleted', 0 );
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

