<?php

	class TestSelectPost extends WP_UnitTestCase {

		function testSelectPostByIdAndAlias(){
			$post_id = $this->factory->post->create();
			$post = new TimberPost($post_id);
			$this->assertEquals('Timber\Object\Post', get_class($post));
			$this->assertEquals($post_id, $post->ID);
		}

	}