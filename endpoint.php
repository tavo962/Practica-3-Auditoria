<?php
//  ██████╗ ██████╗ ██████╗ ███████╗███╗   ███╗ █████╗ ███╗   ██╗
// ██╔════╝██╔═══██╗██╔══██╗██╔════╝████╗ ████║██╔══██╗████╗  ██║
// ██║     ██║   ██║██║  ██║█████╗  ██╔████╔██║███████║██╔██╗ ██║
// ██║     ██║   ██║██║  ██║██╔══╝  ██║╚██╔╝██║██╔══██║██║╚██╗██║
// ╚██████╗╚██████╔╝██████╔╝███████╗██║ ╚═╝ ██║██║  ██║██║ ╚████║
//  ╚═════╝ ╚═════╝ ╚═════╝ ╚══════╝╚═╝     ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝
// @version 1.0.0

header( 'Content-Type: application/json' );

$output = [
	'code' => 0,
	'message' => 'Bad request.',
	'status' => 'error',
];

try {
	if( $_SERVER[ 'REQUEST_METHOD' ] !== 'POST' )
		throw new Exception( 'Bad method HTTP.' );

	// Fields required
	$params = [
		'email',
	];

	

	foreach( $params as $param ) {
		if( ! isset( $_POST[ $param ] ) || empty( $_POST[ $param ] ) )
			throw new Exception( 'Bad params in (' . $param . ').' );
	}	// end foreach
	unset( $param );

	$output = [
		'code' => 200,
		'message' => 'Successful operation.',
		'status' => 'success',
	];
}	// end try
catch( Exception $error ) {
	$output = [
		'code' => 0,
		'message' => $error -> getMessage(),
		'params' => $_POST,
		'status' => 'error',
	];
}	// end catch

echo json_encode( $output, JSON_PRETTY_PRINT );