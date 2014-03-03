<?php

	class TestPost extends WP_UnitTestCase {

		function testSelectPostById(){
			$post_id = $this->factory->post->create();
			$post = new TimberPost($post_id);
			$this->assertEquals('Timber\Object\Post', get_class($post));
			$this->assertEquals($post_id, $post->ID);
		}

		function testSelectPostByIdWhenAlsoGlobal(){
			//when the current $post matches the requested ID, let's save ourselves a query, shall we?
			$post_id = $this->factory->post->create();
			global $post;
			$post = get_post($post_id);
			setup_postdata($post);
			$timber_post = new TimberPost($post_id);
			$this->assertEquals($post_id, $post->ID, $timber_post->ID);
		}

		function testSelectPostBySlug(){
			$post_id = $this->factory->post->create(array(
				'post_title' => 'Jared Has A Test Post'
			));
			$post = new TimberPost('jared-has-a-test-post');
			$this->assertEquals($post_id, $post->ID);
		}

		function testSelectPostByNothing(){
			$post_id = $this->factory->post->create(array(
				'post_title' => 'Jared Has Another Test Post'
			));
			global $post;
			$post = get_post($post_id);
			setup_postdata($post);
			$timber_post = new TimberPost();
			$this->assertEquals($post->ID, $timber_post->ID);
		}

		function testTitleMethod(){
			$post_title = 'Jaredz Cool Test Post';
			$post_id = $this->factory->post->create(array(
				'post_title' => $post_title
			));
			$post = new TimberPost($post_id);
			$this->assertEquals($post_title, $post->title());
		}

		function testTitleProperty(){
			$post_title = 'Jaredz Cool Test Post';
			$post_id = $this->factory->post->create(array(
				'post_title' => $post_title
			));
			$post = new TimberPost($post_id);
			$this->assertEquals($post_title, $post->title);
		}

	}