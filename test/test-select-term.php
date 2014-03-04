<?php

	class TestTerm extends WP_UnitTestCase {

		function testSelectTermById(){
			$term_id = 1;
			$term = new TimberTerm($term_id);
			print_r($term);
		}

	}