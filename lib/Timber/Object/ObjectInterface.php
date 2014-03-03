<?php

	namespace Timber\Object;

	interface ObjectInterface {

		public function meta($key);

		public function slug();

		public function title();

		public function name();

	}