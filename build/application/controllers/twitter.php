<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twitter extends CI_Controller {
	function __construct()
	{
		include 'application/includes/OAuth.php';
		include 'application/includes/twitteroauth.php';
		parent::__construct();
	}
	
	public function twitter_callback()
	{
		/* If the oauth_token is old redirect to the connect page. */
		if ( isset( $_REQUEST[ 'oauth_token' ] ) && $this->session->userdata( 'oauth_token' ) !== $_REQUEST[ 'oauth_token' ] ) {
			$this->session->unset_userdata(array(
				'oauth_token' => '',
				'oauth_token_secret' => '',
				'access_token' => ''
			));
			
			header( 'Location: /twitter/auth' );
			exit;
		}
		
		/* Create TwitteroAuth object with app key/secret and token key/secret from default phase */
		$connection = new TwitterOAuth( TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, $this->session->userdata( 'oauth_token' ), $this->session->userdata( 'oauth_token_secret' ) );
		
		/* Request access tokens from twitter */
		$access_token = $connection->getAccessToken( $_REQUEST[ 'oauth_verifier' ] );
		
		/* Save the access tokens. Normally these would be saved in a database for future use. */
		$this->session->set_userdata( 'access_token', $access_token );
		
		/* Remove no longer needed request tokens */
		$this->session->unset_userdata(array(
			'oauth_token' => '',
			'oauth_token_secret' => ''
		));
		
		/* If HTTP response is 200 continue otherwise send to connect page to retry */
		if ( 200 == $connection->http_code )
		{
			/* The user has been verified and the access tokens can be saved for future use */
			header( 'Location: /' );
		}
		else
		{
			/* Save HTTP status for error dialog on connnect page.*/
			$this->session->unset_userdata(array(
				'oauth_token' => '',
				'oauth_token_secret' => '',
				'access_token' => ''
			));
			
			header( 'Location: /twitter/auth' );
		}
	}
	
	public function twitter_auth()
	{
		/* Build TwitterOAuth object with client credentials. */
		$connection = new TwitterOAuth( TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET );
		 
		/* Get temporary credentials. */
		$request_token = $connection->getRequestToken( TWITTER_OAUTH_CALLBACK );
		
		/* Save temporary credentials to session. */
		$token = $request_token['oauth_token'];
		
		$this->session->set_userdata(array(
			'oauth_token' => $token,
			'oauth_token_secret', $request_token['oauth_token_secret']
		));
		 
		/* If last connection failed don't display authorization link. */
		switch ( $connection->http_code )
		{
		  case 200:
		    /* Build authorize URL and redirect user to Twitter. */
		    header( 'Location: ' . $connection->getAuthorizeURL( $token ) );
		    break;
		  default:
		    /* Show notification if something went wrong. */
		    //echo 'Could not connect to Twitter. Refresh the page or try again later.';
		    header( 'Location: /twitter/failed' );
		}
	}
}
