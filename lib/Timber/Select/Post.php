<?php

namespace Timber\Select {

	class Post implements SelectInterface {

		public static function select_by_id($pid){
			$post = get_post($pid);
			if (get_class($post) == 'WP_Post'){
				return $post;
			}
			//throw new Exception('somethings wrong');
		}

		public static function foo(){
			echo 'bar';
		}

	}

}