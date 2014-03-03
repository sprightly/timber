<?php

	namespace Timber\Object;

	class Post implements ObjectInterface {

		function __construct($post_data){
			$this->init($post_data);
		}

		protected function init($post_data){
			if (is_integer($post_data)){
				$post_data = \TimberSelectPost::select_by_id($post_data);
			} else if (is_string($post_data)){
				$post_data = \TimberSelectPost::select_by_slug($post_data);
			}
			if (is_object($post_data) || is_array($post_data)){
				$this->import($post_data);
			} else {
				throw new \Exception('Failed to retrive $post_data in TimberPost::init');
			}
		}

		protected function import($info) {
			if (is_object($info)) {
				$info = get_object_vars($info);
			}
			if (is_array($info)) {
				foreach ($info as $key => $value) {
					if(!empty($key)){
						$this->$key = $value;
					}
				}
			}
		}

		protected function init_from_pid($pid){

		}

		protected function init_from_slug(){

		}

		public function meta($key, $value = null){

		}

		public function slug(){

		}

		public function title(){

		}

		public function name(){

		}
	}