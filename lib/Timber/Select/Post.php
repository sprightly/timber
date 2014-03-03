<?php

namespace Timber\Select {

	class Post implements SelectInterface {

		public static function select_by_id($pid){
			global $post;
			$rpost = get_post($pid);
			if (get_class($rpost) == 'WP_Post'){
				return $rpost;
			}
			throw new \Exception("Could not retrieve post of ID = $pid in TimberSelectPost::select_by_id");
		}

		public static function select_by_slug($slug){
			global $wpdb;
			$query = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_name = %s LIMIT 1", $slug);
			$result = $wpdb->get_row($query);
			if (isset($result->ID)){
				return self::select_by_id($result->ID);
			}
			throw new \Exception("Didn't find an id in TimberSelectPost::select_by_slug");
		}

		public static function foo(){
			echo 'bar';
		}

	}

}