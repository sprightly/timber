<?php

namespace Timber\Select {

	class Post implements SelectInterface {

		public static function select_by_id($pid){
			return $pid;
		}

	}

}