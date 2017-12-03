<?php

	$path = $_GET['src'];

	if (strpos($path, '..') === false && preg_match('~/storage/originals/[a-z0-9]{2}/[a-z0-9]{2}/.*$~', $path))
	{
		$full_path = dirname(__FILE__) . $path;
		$name = basename($path);
		$info = pathinfo($name);
		$ext = $info['extension'];

		header("Content-Disposition: attachment; filename=$name");
		switch(strtolower($ext)) {
			case 'jpg':
				$ct = 'image/jpeg';
				break;
			case 'gif':
				$ct = 'image/gif';
				break;
			case 'png':
				$ct = 'image/png';
				break;
			default:
				$ct = 'application/octet-stream';
				break;
		}

		header('Content-type: ' . $ct);
		header('Content-length: ' . filesize($full_path));

		$disabled_functions = explode(',', ini_get('disable_functions'));

		if (is_callable('readfile') && !in_array('readfile', $disabled_functions)) {
			readfile($full_path);
		} else {
			die(file_get_contents($full_path));
		}
	}
	else
	{
		header('HTTP/1.1 403 Forbidden');
	}