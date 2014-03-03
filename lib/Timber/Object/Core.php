<?php

	namespace Timber\Object;

	class Core {

		function __get($key){
			if (isset($this->$key)){
				//first, return properties as the user is probably expecting
				//meta info they've set instead of a method they're not familar with
				return $this->$key;
			}
			if (method_exists($this, $key)){
				return $this->$key();
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
	}