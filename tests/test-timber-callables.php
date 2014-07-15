<?php

	class TestTimberCallables extends WP_UnitTestCase {
		
		function testACFGetFieldTermTag() {
			$tid = $this->factory->term->create();
			update_field( 'color', 'green', 'post_tag_'.$tid );
			$term = new TimberTerm( $tid );
			$str = '{{term.color}}';
			$this->assertEquals( 'green', Timber::compile_string( $str, array( 'term' => $term ) ) );
		}

		function testPostFakeProperty() {
			$pid = $this->factory->post->create();
			$post = new TimberPost( $pid );
			$str = '{{post.color}}';
			$this->assertEquals(false, Timber::compile_string( $str, array( 'post' => $post ) ) );
		}

		function testPostFakePropertyChild() {
			$pid = $this->factory->post->create();
			$post = new TimberPost( $pid );
			$str = '{{post.color.hue}}';
			$this->assertEquals(false, Timber::compile_string( $str, array( 'post' => $post ) ) );
		}

	}