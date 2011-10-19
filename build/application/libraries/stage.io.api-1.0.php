<?php
class Stageio {
	protected static $app_token = "18574b0c318291b78fa18aeedc95693a";
	//private $skip_response = true;
	protected static $api_domain = API_DOMAIN;
	protected static $api_path = '/1.0/';
	protected static $lib_version = '1.0.0';
	protected static $timeout = 5;
	//protected $throw_onfail = true; // currently not used
	
	/*
	public function setSkipResponse( $ignore_response )
	{
		if ( is_bool( $skip_response ))
		{
			$this->skip_response = $skip_response;
		}
	}
	
	public function setThrowOnFail( $throw_onfail )
	{
		if ( is_bool( $throw_onfail ) )
		{
			$this->throw_onfail = $throw_onfail;
		}
	}
	*/
	
	public static function setTimeout( $timeout )
	{
		if ( is_integer( $timeout ) )
		{
			self::$timeout = $timeout;
		}
	}
	
	public static function prepJson( $obj )
	{
		if ( is_object( $obj ) )
		{
			$obj->app_token = self::$app_token;
			$obj->lib_version = self::$lib_version;
		}
		else if ( is_array( $obj ) )
		{
			$obj[ 'app_token' ] = self::$app_token;
			$obj[ 'lib_version' ] = self::$lib_version;
		}
		
		return json_encode( $obj );
	}
	
	public static function populateArray( $arr, $obj, $useIndex = false )
	{
		$arrReturn = array();
		
		if ( is_object( $obj ) )
		{
			$obj = get_object_vars( $obj );
		}
		
		foreach ( $arr as $key => $val )
		{
			if ( $useIndex === true )
			{
				if ( isset( $obj[ $key ] ) )
				{
					// use the object's index (0,1,2..) and our array's value (app_username,etc.)
					$arrReturn[ $val ] = $obj[ $key ];
				}	
			}
			else
			{
				if ( isset( $obj[ $val ] ) )
				{
					$arrReturn[ $val ] = $obj[ $val ];
				}
			}
		}
		
		return $arrReturn;
	}
	
	protected static function request( $method, $data, $capture_response = false )
	{
		$fp = fsockopen( self::$api_domain, 80, $errno, $errstr, self::$timeout);
		
		if ( !$fp )
		{
			return false;
		}
		else
		{
			$out = "POST " . self::$api_path . $method . " HTTP/1.1\r\n";
			$out .= "Host: " . self::$api_domain . "\r\n";
			$out .= "Content-Type: application/json\r\n";
			$out .= "Content-Length: " . strlen( $data ) . "\r\n";
			$out .= "Connection: Close\r\n\r\n";
			$out .= $data;
			
			fwrite( $fp, $out );
			
			$response = true;
			
			if ( $capture_response === true )
			{
				$response = '';
				
				while ( !feof( $fp ) )
				{
					$response .= fgets($fp, 128);
				}
				
				if ( strlen( $response ) )
				{
					$pos = strpos( $response, "\r\n\r\n" );
					
					if ( $pos !== false )
					{
						$response = substr( $response, $pos + 4 );
					}
				}
			}
			
			fclose( $fp );
			
			return $response;
		}
	}
	
	public static function custom( $url, $obj, $capture_response = false )
	{
		$response = self::request( $url, self::prepJson( $obj ), $capture_response );
		
		if ( $response === false || $response === true )
		{
			return $response;
		}
		else if ( is_string( $response ) && substr( $response, 0, 1 ) == '{'  )
		{
			return json_decode( $response );
		}
		else
		{
			return $response;
		}
	}
}

class Stageio_action extends Stageio {
	public static function create( $obj )
	{
		$arr = array(
			'identity_token' => '',
			'preset_name' => '',
			'action_meta' => '',
			'geo' => null
		);
		
		if ( !is_object( $obj ) && !is_array( $obj ) )
		{
			$arrData = self::populateArray( $arr, func_get_args(), true );
		}
		else
		{
			$arrData = self::populateArray( $arr, $obj );
		}
		
		return self::custom( 'action/create', $arrData, false );
	}
	
	public static function create_plus( $obj )
	{
		$arr = array(
			'identity_token' => '',
			'preset_name' => '',
			'action_meta' => '',
			'action_created' => '',
			'action_modified' => '',
			'geo' => null
		);
		
		if ( !is_object( $obj ) && !is_array( $obj ) )
		{
			$arrData = self::populateArray( $arr, func_get_args(), true );
		}
		else
		{
			$arrData = self::populateArray( $arr, $obj );
		}
		
		return self::custom( 'action/create_plus', $arrData, false );
	}
	
	public static function get_last_actions()
	{
		$arrData = array();
		
		return self::custom( 'action/get_last_actions', $arrData, true );
	}
}

class Stageio_identity extends Stageio {
	/**
	 * Returns a unique token for the given identity
	 *
	 * @access	public
	 * @param	string [$app_username] Required. A readable identifiable name for the user. Values: Your app's own stored username, or the local-part of an email address (everything before the @ character).
	 * @param	string [$identity_info] Required. Unique identifiable key for the user. Values: Twitter name, Facebook url, Google url, or a SHA1 hash of the full email.
	 * @param	string [$identity_type] Required. The two-character identifier for the service that we can identity a user as. Values: tw = Twitter, fb = Facebook, go = Google, em = Email
	 *
	 * If not using an array/object you can specify your arguments in this order:
	 * $app_username, $identity_info, $identity_type
	 */
	public static function getToken( $obj )
	{
		$arr = array(
			'app_username',
			'identity_info',
			'identity_type'
		);
		
		if ( !is_object( $obj ) && !is_array( $obj ) )
		{
			$arrData = self::populateArray( $arr, func_get_args(), true );
		}
		else
		{
			$arrData = self::populateArray( $arr, $obj );
		}
		
		return self::custom( 'identity/get_token', $arrData, false );
	}
}
?>