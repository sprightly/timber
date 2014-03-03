<?php

	require_once('Object/ObjectInterface.php');
	require_once('Object/Post.php');

	require_once('Select/SelectInterface.php');
	require_once('Select/Post.php');

	class_alias('Timber\Object\Post', 'TimberPost');
	class_alias('Timber\Select\Post', 'TimberSelectPost');
