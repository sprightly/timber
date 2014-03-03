<?php

	class TestSelectPost extends WP_UnitTestCase {

		function testSelectPostByIdAndAlias(){
			$post_id = $this->factory->post->create();
			$post = new TimberPost($post_id);
			$this->assertEquals('Timber\Object\Post', get_class($post));
			$this->assertEquals($post_id, $post->ID);
		}

		function testSelectPostBySlugAndAlias(){
			$post_id = $this->factory->post->create(array(
				'post_title' => 'Jared Has A Test Post'
			));
			$post = new TimberPost('jared-has-a-test-post');
			$this->assertEquals($post_id, $post->ID);
		}

	}