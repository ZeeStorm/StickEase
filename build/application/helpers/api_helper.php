<?
// Does the pretty "x ago"
function prettydate( $timestamp )
{
	if( gmtToTimezone( now()) - gmtToTimezone( $timestamp ) > 86400 )
	{
		return date( 'D M jS, Y - g:ia', gmtToTimezone( $timestamp ));
	}
	else
	{
		return strtolower( timespan( strtotime( $timestamp ), now()) . ' ago' );
	}
}


// these two functions convert from GMT to timezone... needs to know the timezone, though.
function getUserTimezone()
{
	return '';
}

function gmtToTimezone( $strTimestamp )
{
	return strtotime( $strTimestamp );
	//return gmt_to_local( strtotime( $strTimestamp ), getUserTimezone(), date( 'I' ));
}

function getNow()
{
	return date( "Y-m-d H:i:s", local_to_gmt(time()));
}