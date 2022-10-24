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
	'channel' => '#auditoria',
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