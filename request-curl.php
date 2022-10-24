<?php

$url = 'https://hooks.slack.com/services/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';
$handler = curl_init( $url );

$payload = json_encode( [
	'channel' => '#unimex',
	'icon_emoji' => 'lizard',
	'text'	=>	'This is a text.',
	'username' => 'kuetspali',
] );

curl_setopt( $handler, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $handler, CURLOPT_HTTPHEADER, [ 'Content-Type:application/json' ] );
curl_setopt( $handler, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec( $handler );
curl_close( $handler );

var_dump( $result );