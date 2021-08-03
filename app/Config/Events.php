<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', function () {
	if (ENVIRONMENT !== 'testing')
	{
		if (ini_get('zlib.output_compression'))
		{
			throw FrameworkException::forEnabledZlibOutputCompression();
		}

		while (ob_get_level() > 0)
		{
			ob_end_flush();
		}

		ob_start(function ($buffer) {
			return $buffer;
		});
	}

	/*
	 * --------------------------------------------------------------------
	 * Debug Toolbar Listeners.
	 * --------------------------------------------------------------------
	 * If you delete, they will no longer be collected.
	 */
	if (CI_DEBUG && ! is_cli())
	{
		Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
		Services::toolbar()->respond();
	}
});

Events::on('user_created',function(string $emailAddress) {
	$config = [
		'protocol' => 'smtp',
		'SMTPHost' => 'smtp.mailtrap.io',
		'SMTPPort' => 2525,
		'SMTPUser' => '4a30faf5ad7840',
		'SMTPPass' => '83851c3ab0ca23',
		'CRLF' => "\r\n",
		'newline' => "\r\n",
	];

	$email = \Config\Services::email($config);

	$email->setFrom('you@example.com', 'CodeIgniter');
    $email->setTo($emailAddress);

    $email->setSubject('User Created');
    $email->setMessage('Your User Has been created');
    
	$email->send();
});
