<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends Base
{
	public function create()
	{
		if ( $this->gated() === true )
		{
			$obj = $this->defaults();
			
			if ( get_class( $obj ) == 'response' )
			{
				$this->displayJson( $obj );
			}
			else
			{
				$this->api->callMethod( 'project.create', $obj );
			}
		}
	}
	
	public function get_updates()
	{
		if ( $this->gated() === true )
		{
			$obj = $this->defaults();
			
			if ( get_class( $obj ) == 'response' )
			{
				$this->displayJson( $obj );
			}
			else
			{
				$this->api->callMethod( 'project.get_updates', $obj );
			}
		}
	}
}