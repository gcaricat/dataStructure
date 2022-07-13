<?php

namespace queueContainer\queue;

	interface Queue {
		public function enqueue(string $item);
		public function dequeue():string;
		public function peek():string;
		public function isEmpty():bool;
	}
