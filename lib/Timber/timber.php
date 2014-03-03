<?php

	require_once('Object/ObjectInterface.php');
	require_once('Object/Post.php');

	require_once('Select/SelectInterface.php');
	require_once('Select/Post.php');

	class TimberPost extends Timber\Object\Post {}

	class TimberSelectPost extends Timber\Select\Post {}