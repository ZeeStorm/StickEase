<?
class svc_user
{
	static function get_by_slug( $response, $options )
	{
		
	
		if( $options[ 'slug' ])
		{
			$response->setResponse( array( 'yay' => true ));
		}

		return $response;
	}
}