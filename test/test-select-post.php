<?php

	class TestSelectPost extends WP_UnitTestCase {

		function testSelectPostById(){
			$rand = rand(1, 1000);
			$this->assertEquals($rand, Timber\Select\Post::select_by_id($rand));
		}

		function testSelectPostByIdSimpleInterface(){
			$rand = rand(1, 1000);
			$this->assertEquals($rand, TimberSelectPost::select_by_id($rand));
		}

	}