<?

// 1xx errors, standard api related errors
$lang[ 'error_100' ] = 'Method not found';
$lang[ 'error_101' ] = 'Method deprecated';
$lang[ 'error_102' ] = 'Method unavailable';
$lang[ 'error_103' ] = 'API calls must use POST requests';
$lang[ 'error_104' ] = 'API calls must use content type: application/json';
$lang[ 'error_105' ] = 'POST data not a valid JSON object';
$lang[ 'error_106' ] = 'User must be logged in to do that.';

// 2xx errors, form errors
$lang[ 'error_200' ] = 'Field is required: %s';
$lang[ 'required' ] = array( 200, $lang[ 'error_200' ] );

$lang[ 'error_201' ] = 'Field requires a valid email: %s';
$lang[ 'valid_email' ] = array( 201, $lang[ 'error_201' ] );

$lang[ 'error_202' ] = 'Field has a minimum length: %s (%s)';
$lang[ 'min_length' ] = array( 202, $lang[ 'error_202' ] );

$lang[ 'error_203' ] = 'Field has a maximum length: %s (%s)';
$lang[ 'max_length' ] = array( 203, $lang[ 'error_203' ] );

$lang[ 'error_204' ] = 'Field has an exact length: %s (%s)';
$lang[ 'exact_length' ] = array( 204, $lang[ 'error_204' ] );

$lang[ 'error_205' ] = 'Field can only be alphabetical: %s';
$lang[ 'alpha' ] = array( 205, $lang[ 'error_205' ] );

$lang[ 'error_206' ] = 'Field can only contain alpha-numeric: %s';
$lang[ 'alpha_numeric' ] = array( 206, $lang[ 'error_206' ] );

$lang[ 'error_207' ] = 'Field can only contain alpha-numeric characters, dashes and underscores: %s';
$lang[ 'alpha_dash' ] = array( 207, $lang[ 'error_207' ] );

$lang[ 'error_208' ] = 'Field can only be numbers greater than 0: %s';
$lang[ 'is_natural_no_zero' ] = array( 208, $lang[ 'error_208' ] );

$lang[ 'error_209' ] = 'Field contains invalid characters: %s';
$lang[ 'alpha_name' ] = array( 209, $lang[ 'error_209' ] );

$lang[ 'error_210' ] = 'Field must contain numbers and a single decimal: %s';
$lang[ 'decimal' ] = array( 210, $lang[ 'error_210' ] );

$lang[ 'error_211' ] = 'Field must be a valid domain: %s';
$lang[ 'domain' ] = array( 211, $lang[ 'error_211' ] );

$lang[ 'error_212' ] = 'Field can only contain alpha-numeric characters, dashes and dots: %s';
$lang[ 'alpha_dash_dot' ] = array( 212, $lang[ 'error_212' ] );

// 3xx errors, user api errors
$lang[ 'error_300' ] = 'User not found';
$lang[ 'error_301' ] = 'User slug is already in use';

// 4xx errors, app api errors
$lang[ 'error_400' ] = 'App not found';
$lang[ 'error_401' ] = 'App username already associated with a different user';
$lang[ 'error_402' ] = 'App domain is already in use';
$lang[ 'error_403' ] = 'App slug is already in use';
$lang[ 'error_404' ] = 'App limit for this user has been reached';

// 5xx errors, action api errors
$lang[ 'error_500' ] = 'Action meta data is not a valid JSON object';
$lang[ 'error_501' ] = 'Action meta data is larger than 2KB';
$lang[ 'error_502' ] = 'Action not found';

// 6xx errors, identity api errors
$lang[ 'error_600' ] = 'Identity not found';
$lang[ 'error_601' ] = 'Identity duplicate';

// 7xx errors, axi api errors
$lang[ 'error_700' ] = 'App association to user already exists';
$lang[ 'error_701' ] = 'App association to user does not exist';

// 8xx errors, geo api errors
$lang[ 'error_800' ] = 'Geo record not found';

// 9xx errors, preset api errors
$lang[ 'error_900' ] = 'Preset not found';
$lang[ 'error_901' ] = 'Preset with that name already exists for app';

?>