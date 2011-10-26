<?
class Sticky_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function create( $obj )
	{
		// Build the data array for the query
		$data = array(
			'user_id_created' => $obj->user_id,
			'sticky_note' => $obj->sticky_note,
			'sticky_priority' => $obj->sticky_priority,
			'sticky_order' => $obj->sticky_order,
			'sticky_created' => getNow(),
			'sticky_updated' => getNow()
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
	
	function update_order( $obj )
	{
		if ( $obj->sticky_order < 0 )
		{
			return false;
		}
		else if ( $obj->sticky_order > $obj->sticky_order_new )
		{
			$this->db->where( 'sticky_order >=', $obj->sticky_order );
			$this->db->where( 'sticky_order <', $obj->sticky_order_new );
			
			$this->db->set( 'sticky_order', 'sticky_order+1', false);
		}
		else if ( $obj->sticky_order < $obj->sticky_order_new )
		{
			$this->db->where( 'sticky_order >', $obj->sticky_order );
			$this->db->where( 'sticky_order <=', $obj->sticky_order_new );
			
			$this->db->set( 'sticky_order', 'sticky_order-1', false);
		}
		
		$this->db->where( 'project_id', $obj->project_id );
		
		$this->db->set( 'user_id_assigned', $obj->user_id_assigned );
		$this->db->set( 'sticky_completed', (int)$obj->sticky_completed );
		
		if ( $this->db->update( 'stickys' ) )
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
	
	function count_by_project( $obj )
	{
		$this->db->select( 'count(sticky_id)' );
		$this->db->where( 'project_id' );
		
		if ( $obj->sticky_assigned === true )
		{
			$this->db->set( 'user_id_assigned >', 0 );
		}
		else
		{
			$this->db->set( 'user_id_assigned', 0 );
		}
		
		$this->db->set( 'sticky_completed', (int)$obj->sticky_completed );
	}
	
	function get_by_id( $obj )
	{
		$this->db->select( 'project_id, sticky_note' );
		$this->db->where( 'project_id', $obj->project_id );
		$this->db->where( 'sticky_id', $obj->sticky_id );
		$this->db->limit( 1 ); // we only care if they have at least 1, we don't need everything
		
		$query = $this->db->get( 'stickys' );
		
		if ( $query->num_rows() )
		{
			return $query->row();
		}
		else
		{
			$objResponse = new response( false );
			$objResponse->setError( 500, $this->lang->line( 'error_500' ) );
			
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

