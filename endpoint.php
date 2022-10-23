<?php
//  ██████╗ ██████╗ ██████╗ ███████╗███╗   ███╗ █████╗ ███╗   ██╗
// ██╔════╝██╔═══██╗██╔══██╗██╔════╝████╗ ████║██╔══██╗████╗  ██║
// ██║     ██║   ██║██║  ██║█████╗  ██╔████╔██║███████║██╔██╗ ██║
// ██║     ██║   ██║██║  ██║██╔══╝  ██║╚██╔╝██║██╔══██║██║╚██╗██║
// ╚██████╗╚██████╔╝██████╔╝███████╗██║ ╚═╝ ██║██║  ██║██║ ╚████║
//  ╚═════╝ ╚═════╝ ╚═════╝ ╚══════╝╚═╝     ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝
// @version 1.0.0

header( 'Content-Type: application/json' );

$data = json_decode( file_get_contents( 'php://input' ), true );

$_POST[ 'name' ] = $data[ 'name' ] ?? '';
$_POST[ 'last_name' ] = $data[ 'last_name' ] ?? '';
$_POST[ 'maternal_surname' ] = $data[ 'maternal_surname' ] ?? '';
$_POST[ 'email' ] = $data[ 'email' ] ?? '';
$_POST[ 'gender' ] = $data[ 'gender' ] ?? '';
$_POST[ 'comment' ] = $data[ 'comment' ] ?? '';

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
		'name',
		'last_name',
		'maternal_surname',
		'gender',
		'comment',
	];

	foreach( $params as $param ) {
		if( ! isset( $_POST[ $param ] ) || empty( $_POST[ $param ] ) )
			throw new Exception( 'Bad params in (' . $param . ').' );
	}	// end foreach
	unset( $param );

	// Database
	$db = new PDO( 'mysql:host=127.0.0.1;dbname=unimex', 'root', 'JdRYq0DIfREIX&br%tKd2JX8Evv5XNsgv+Vs' );

	$stmt = $db -> prepare( 'INSERT INTO usuarios ( nombres, apellido_paterno, apellido_materno, correo_electronico, genero, comentario, fecha_creacion, fecha_modificacion, fecha_eliminacion  )
											VALUES ( :name, :last_name, :maternal_surname, :email, :gender, :comment, NOW(), NOW(), NULL );' );
	$stmt -> bindParam( ':name', $_POST[ 'name' ] );
	$stmt -> bindParam( ':last_name', $_POST[ 'last_name' ] );
	$stmt -> bindParam( ':maternal_surname', $_POST[ 'maternal_surname' ] );
	$stmt -> bindParam( ':email', $_POST[ 'email' ] );
	$stmt -> bindParam( ':gender', $_POST[ 'gender' ] );
	$stmt -> bindParam( ':comment', $_POST[ 'comment' ] );
	$stmt -> execute();

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