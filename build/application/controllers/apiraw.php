<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apiraw extends CI_Controller
{
	private function getInput()
	{
		$data = file_get_contents( 'php://input' );
	
		if ( strlen( $data ) > 0 )
		{
			$obj = json_decode( $data );
			
			if ( is_object( $obj ) ) {
				return $obj;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	
	public function pass($pw='', $url1='',$url2='')
	{
		if ( $pw != 'C4llth3ap1' || !$url1 || !$url2 )
		{
			show_404();
			exit;
		}
		
		require 'application/libraries/stage.io.api-1.0.php';
		
		$url = $url1 . '/' . $url2;
		$stage = new stageio();
		$response = new stdClass();
		
		$obj = $this->getInput();
		
		if ( $obj !== false && $url )
		{
			$response = $stage->custom( $url, $obj );
		}
		
		$this->load->view( 'json', array( 'json' => $response ) );
	}
	
	public function index($pw='')
	{
		if ( $pw != 'C4llth3ap1' )
		{
			show_404();
			exit;
		}
		
		$forms = array(
			'action/create' => array(
				'fields' => array(
					'app_token' => array(
						'size' => 41
					),
					'identity_token' => array(
						'size' => 41
					),
					'preset_name' => array(
						'size' => 41
					),
					'action_meta' => array(
						'size' => 41,
						'optional' => true
					),
					'geo[geo_latitude]' => array(
						'size' => 30,
						'id' => 'geo_latitude',
						'optional' => true
					),
					'geo[geo_longitude]' => array(
						'size' => 30,
						'id' => 'geo_longitude',
						'optional' => true
					),
					'geo[geo_altitude]' => array(
						'size' => 30,
						'id' => 'geo_altitude',
						'optional' => true
					),
					'geo[geo_accuracy]' => array(
						'size' => 30,
						'id' => 'geo_accuracy',
						'optional' => true
					),
					'geo[geo_altitudeAccuracy]' => array(
						'size' => 30,
						'id' => 'geo_altitudeAccuracy',
						'optional' => true
					),
					'geo[geo_heading]' => array(
						'size' => 30,
						'id' => 'geo_heading',
						'optional' => true
					),
					'geo[geo_speed]' => array(
						'size' => 30,
						'id' => 'geo_speed',
						'optional' => true
					)
				)
			),
			'action/create_plus' => array(
				'fields' => array(
					'app_token' => array(
						'size' => 41
					),
					'identity_token' => array(
						'size' => 41
					),
					'preset_name' => array(
						'size' => 41
					),
					'action_meta' => array(
						'size' => 41,
						'optional' => true
					),
					'action_created' => array(
						'size' => 41,
						'optional' => true
					),
					'action_modified' => array(
						'size' => 41,
						'optional' => true
					),
					'geo[geo_latitude]' => array(
						'size' => 30,
						'id' => 'geo_latitude',
						'optional' => true
					),
					'geo[geo_longitude]' => array(
						'size' => 30,
						'id' => 'geo_longitude',
						'optional' => true
					),
					'geo[geo_altitude]' => array(
						'size' => 30,
						'id' => 'geo_altitude',
						'optional' => true
					),
					'geo[geo_accuracy]' => array(
						'size' => 30,
						'id' => 'geo_accuracy',
						'optional' => true
					),
					'geo[geo_altitudeAccuracy]' => array(
						'size' => 30,
						'id' => 'geo_altitudeAccuracy',
						'optional' => true
					),
					'geo[geo_heading]' => array(
						'size' => 30,
						'id' => 'geo_heading',
						'optional' => true
					),
					'geo[geo_speed]' => array(
						'size' => 30,
						'id' => 'geo_speed',
						'optional' => true
					)
				)
			),
			'action/get_last_action' => array(
				'protected' => true,
				'fields' => array(
					'app_token' => array(
						'size' => 41,
						'value' => '18574b0c318291b78fa18aeedc95693a'
					),
					'app_id' => array(
						'size' => 10,
						'optional' => true
					),
					'limit' => array(
						'size' => 5,
						'optional' => true
					)
				)
			),
			'action/test_suite' => array(
				'fields' => array(
					'password' => array(
						'size' => 41
					)
				)
			),
			'app/create' => array(
				'protected' => true,
				'fields' => array(
					'app_token' => array(
						'size' => 41,
						'value' => '18574b0c318291b78fa18aeedc95693a'
					),
					'app_name' => array(
						'size' => 41
					),
					'app_slug' => array(
						'size' => 41,
						'optional' => true
					),
					'app_domain' => array(
						'size' => 41
					),
					'app_logo' => array(
						'size' => 41
					),
					'user_id' => array(
						'size' => 10
					)
				)
			),
			'app/get_by_slug' => array(
				'protected' => true,
				'fields' => array(
					'app_token' => array(
						'size' => 41,
						'value' => '18574b0c318291b78fa18aeedc95693a'
					),
					'app_slug' => array(
						'size' => 41
					)
				)
			),
			'identity/get_token' => array(
				'fields' => array(
					'app_token' => array(
						'size' => 41
					),
					'app_username' => array(
						'size' => 41
					),
					'identity_info' => array(
						'size' => 41
					),
					'identity_type' => array(
						'size' => 2,
						'maxlength' => 2
					)
				)
			),
			'identity/test_suite' => array(
				'fields' => array(
					'password' => array(
						'size' => 41
					)
				)
			),
			'preset/create' => array(
				'protected' => true,
				'fields' => array(
					'app_token' => array(
						'size' => 41,
						'value' => '18574b0c318291b78fa18aeedc95693a'
					),
					'app_id' => array(
						'size' => 10
					),
					'preset_name' => array(
						'size' => 41
					),
					'preset_text' => array(
						'size' => 41
					)
				)
			),
			'user/create' => array(
				'protected' => true,
				'fields' => array(
					'app_token' => array(
						'size' => 41,
						'value' => '18574b0c318291b78fa18aeedc95693a'
					),
					'user_slug' => array(
						'size' => 41,
						'optional' => true
					),
					'user_display' => array(
						'size' => 41
					),
					'user_twitter_token' => array(
						'size' => 41,
						'optional' => true
					),
					'user_twitter_secret' => array(
						'size' => 41,
						'optional' => true
					),
					'user_twitter_userid' => array(
						'size' => 41,
						'optional' => true
					)
				)
			)
		);
		
		$this->load->view( 'test', array(
			'controller' => 'apiraw',
			'pw' => $pw,
			'forms' => $forms
		) );
	}
}