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
	'channel' => '#unimex',
	'icon_emoji' => 'lizard',
	'text'	=>	'Práctica 3',
	'username' => 'kuetspali',
	'fields' => [
		[
			'title' => 'Warning',
			'value' => 'Valor de texto del campo. Puede contener el marcado estándar de mensajes y debe incluir los habituales caracteres de escape. Puede ser multilínea.',
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