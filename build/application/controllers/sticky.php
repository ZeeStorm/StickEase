<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sticky extends Base
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
				$this->api->callMethod( 'sticky.create', $obj );
			}
		}
	}
	public function delete()
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
				$this->api->callMethod( 'sticky.delete', $obj );
			}
		}
	}
	
	public function assign()
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
				$this->api->callMethod( 'sticky.assign', $obj );
			}
		}
	}
	
	public function complete()
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
				$this->api->callMethod( 'sticky.complete', $obj );
			}
		}
	}
	
	public function priority()
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
				$this->api->callMethod( 'sticky.priority', $obj );
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
				$this->api->callMethod( 'sticky.get_by_project', $obj );
			}
		}
	}
	
	public function get_by_project_user()
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
				$this->api->callMethod( 'sticky.get_by_project_user', $obj );
			}
		}
	}
}