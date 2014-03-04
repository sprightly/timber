<?php

	namespace Timber\Select;

	class Term implements SelectInterface {

		public static function select_by_id($tid, $taxonomy = null){
			if ($taxonomy === null){
				$taxonomy = self::get_taxonomy($tid);
			}
			if ($taxonomy){
				return get_term($tid, $taxonomy);
			}
		}

		public static function select_by_slug($slug){

		}

		public static function get_taxonomy($tid){
			global $wpdb;
			$query = $wpdb->prepare("SELECT taxonomy FROM $wpdb->term_taxonomy WHERE term_id = %d LIMIT 1", $tid);
			$tax = $wpdb->get_var($query);
			if (isset($tax) && strlen($tax)) {
				return $tax;
			}
		}
	}

	class_alias('Timber\Select\Term', 'TimberSelectTerm');
