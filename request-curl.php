<?php
//  ██████╗ ██████╗ ██████╗ ███████╗███╗   ███╗ █████╗ ███╗   ██╗
// ██╔════╝██╔═══██╗██╔══██╗██╔════╝████╗ ████║██╔══██╗████╗  ██║
// ██║     ██║   ██║██║  ██║█████╗  ██╔████╔██║███████║██╔██╗ ██║
// ██║     ██║   ██║██║  ██║██╔══╝  ██║╚██╔╝██║██╔══██║██║╚██╗██║
// ╚██████╗╚██████╔╝██████╔╝███████╗██║ ╚═╝ ██║██║  ██║██║ ╚████║
//  ╚═════╝ ╚═════╝ ╚═════╝ ╚══════╝╚═╝     ╚═╝╚═╝  ╚═╝╚═╝  ╚═══╝
// @version 1.0.0

$url = 'https://hooks.slack.com/services/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';
$handler = curl_init( $url );

$payload = json_encode( [
	'color' => 'warning', // Puede tomar los valores good, warning, danger
	'channel' => '#acacya',
	'icon_emoji' => 'lizard',
	'text'	=>	'Práctica 3',
	'username' => 'kuetspali',
	'fields' => [
		[
			'title' => 'Warning',
			'value' => 'Saludos clase.',
			'short' => false
		]
	],
] );

curl_setopt( $handler, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $handler, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ] );
curl_setopt( $handler, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec( $handler );
curl_close( $handler );

var_dump( $result );