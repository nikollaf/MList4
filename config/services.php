<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

	'facebook' => [
		'client_id' => '1591385067814812',
		'client_secret' => '222b3842dd7ced5f534df0cd55aab4d8',
		'redirect' => env('FACEBOOK')
	],

	'twitter' => [
		'client_id' => 'eqo1hK4rZfoeVkkOBnGMIjBKs',
		'client_secret' => 'X0B3kh5tQ2UGUw7ye4437t6bHzalTwnOHmkQTaladAUtXIl4VZ',
		'redirect' => env('TWITTER')
	],

];
