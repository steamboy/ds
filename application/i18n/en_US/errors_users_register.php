<?php defined('SYSPATH') or die('No direct access allowed.');
 
$lang = array
(
	'username' => array
	(
		'required'             => 'Username cannot be blank.',
		'chars'                => 'Username should only consist of letters, numbers and underscores',
		'length'               => 'Username should be more than four(4) characters',
		'username_available'    => 'Username already exists. Please choose another one.',
		'default'              => 'Username has an Invalid Input.'
	),
	'password' => array
	(
		'required'             => 'Password cannot be blank.',
		'length'               => 'Password should be more than five(5) characters',
		'default'              => 'Password has an Invalid Input.'
	),
	'password_confirm' => array
	(
		'required'             => 'Password Confirmation cannot be blank.',
		'matches'              => 'Password Confirmation does not match Password field',
		'default'              => 'Password Confirmation has an Invalid Input.'
	),
	'email' => array
	(
		'required'             => 'Email cannot be blank.',
		'email'                => 'Email is not a valid email',
		'email_exists'         => 'Email already exists. Please choose another one.',
		'default'              => 'Email has an Invalid Input.'
	),
	'first_name' => array
	(
		'required'             => 'First Name cannot be blank.',
		'standard_text'        => 'First Name should only consist of letters, numbers, whitespaces, dashes, periods and underscores',
		'default'              => 'First Name has an Invalid Input.'
	),
	'last_name' => array
	(
		'required'             => 'Last Name cannot be blank.',
		'standard_text'        => 'Last Name should only consist of letters, numbers, whitespaces, dashes, periods and underscores',
		'default'              => 'Last Name has an Invalid Input.'
	),
	'captcha_response' => array
	(
		'required'             => 'Captcha cannot be blank.',
		'captcha_valid'        => 'Captcha is invalid',
		'default'              => 'Captcha has an Invalid Input.'
	)
);