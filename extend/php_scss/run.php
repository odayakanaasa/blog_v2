<?php
$dir = realpath( __DIR__.'/../../public/static/');
	echo PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL;
	print 'Dirtory Path: '.$dir.PHP_EOL;
	require __DIR__.'/core.php';
	// Import scss or css folder in absolute or relative path
	$scss_folder =  $dir.'/scss';
	$css__folder =  $dir.'/css';
	\Sass::run( $scss_folder, $css__folder );