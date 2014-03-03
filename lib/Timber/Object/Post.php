<?php

	namespace Timber\Object;

	class Post implements ObjectInterface {

		function __construct($post_data = null){
			$this->init($post_data);
		}

		protected function init($post_data = null){
			if (is_null($post_data)){
				$post_data = $this->init_from_null();
			} else if (is_integer($post_data)){
				$post_data = $this->init_from_pid($post_data);
			} else if (is_string($post_data)){
				$post_data = $this->init_from_slug($post_data);
			}
			if ((is_object($post_data) && $post_data->ID)){
				$this->import($post_data);
				$custom = \TimberSelectPost::get_custom($post_data->ID);
				$this->import($custom);
			} else {
				throw new \Exception('Failed to retrive $post_data in TimberPost::init');
			}
		}

		protected function init_from_null(){
			return \TimberSelectPost::select_current_post();
		}

		protected function init_from_pid($pid){
			return \TimberSelectPost::select_by_id($pid);
		}

		protected function init_from_slug($post_slug){
			return \TimberSelectPost::select_by_slug($post_slug);
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

		public function meta($key, $value = null){

		}

		public function slug(){

		}

		public function title(){
			$title = $this->post_title;
			return apply_filters('the_title', $title);
		}

		public function name(){

		}
	}

	class_alias('Timber\Object\Post', 'TimberPost');