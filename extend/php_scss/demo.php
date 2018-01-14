<?php
	require __DIR__.'/core.php';
	// Import scss or css folder by absolute or relative path
	$scss_folder =  __DIR__.'/scss';
	$css__folder =  __DIR__.'/css';
	\Sass::run( $scss_folder, $css__folder );