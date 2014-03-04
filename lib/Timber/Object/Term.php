<?php

	namespace Timber\Object;

	class Term extends Core implements ObjectInterface {

		function __construct($term_data = null, $taxonomy = null){
			$this->init($term_data, $taxonomy);
		}

		protected function init($term_data = null, $taxonomy = null){
			if ($term_data === null){
				$term_data = $this->init_from_null();
			} else if (is_integer($term_data)){
				$term_data = $this->init_from_id($term_data);
			}
			if ((is_object($term_data) && $term_data->term_id)){
				$term_data = $this->normalize_wp_to_timber_object($term_data);
				$this->import($term_data);
			}
		}

		private function normalize_wp_to_timber_object($term_data){
			$term_data->ID = $term_data->term_id;
			return $term_data;
		}

		protected function init_from_null(){

		}

		protected function init_from_id($tid){
			return \TimberSelectTerm::select_by_id($tid);
		}

		protected function init_from_slug(){

		}

		public function meta($key){

		}

		public function slug(){
			return $this->slug;
		}

		public function title(){
			return $this->name;
		}

		public function name(){

		}

	}

	class_alias('Timber\Object\Term', 'TimberTerm');