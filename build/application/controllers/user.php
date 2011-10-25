<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Base
{
	public function invite()
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
				$this->api->callMethod( 'user.invite', $obj );
			}
		}
	}
	
	public function create()
	{
		$obj = $this->defaults();
		
		if ( get_class( $obj ) == 'response' )
		{
			$this->displayJson( $obj );
		}
		else
		{
			$this->api->callMethod( 'user.create', $obj );
		}
	}
	
	public function edit()
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
				$this->api->callMethod( 'user.edit', $obj );
			}
		}
	}
	
	public function get_by_project()
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
				$this->api->callMethod( 'user.get_by_project', $obj );
			}
		}
	}
}