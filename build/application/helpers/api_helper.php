<?

function getInput()
{
	$data = file_get_contents('php://input');

	if( strlen( $data ) > 0 )
	{
		return json_decode( $data )->input;
	}
	else
	{
		return false;
	}
}

function getUserOrFail( $CI, $strToken )
{
	$objUser = $CI->user_model->getByToken( $strToken );

	if( $objUser )
	{
		return $objUser;
	}
	else
	{
		$objResponse = new response();
		$objResponse->createError( 1, 'You must be logged in to perform this request.' );

		$CI->load->view( 'json', array( 'json' => $objResponse ));

		die();
	}
}
