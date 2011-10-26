<?
class Action_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	function create( $obj )
	{
		// Build the data array for the query
		$data = array(
			'user_id' => $obj->user_id,
			'action_text' => $obj->action_text,
			'action_created' => getNow()
		);

		// Insert the data
		if ( $this->db->insert( 'actions', $data ) )
		{	
			return true;
		}
		else
		{
			return false;
		}
	}
}

