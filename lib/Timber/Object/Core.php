<?php

	namespace Timber\Object;

	class Core {

		function __get($key){
			if (method_exists($this, $key)){
				return $this->$key();
			}
			if ($this->$key){
				return $this->$key;
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