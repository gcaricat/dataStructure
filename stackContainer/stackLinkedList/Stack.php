<?php

	namespace dataStructure\stackLinkedList;

	interface Stack {
		public function push(string $item);

		public function pop();

		public function top();

		public function isEmpty();
	}
