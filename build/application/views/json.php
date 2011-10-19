<?
if ( !isset( $json ) )
{
	$json = array();
}

header('Content-type: application/json');
echo json_encode( $json );
?>
