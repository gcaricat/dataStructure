<?php

	namespace queueContainer\queue;
	include_once "Queue.php";

	class AgentQueue implements Queue {

		private $limit;
		private $queue;

		public function __construct(int $limit = 20)
		{
			$this->limit = $limit;
			$this->queue = [];
		}

		public function enqueue(string $item)
		{
			if( count($this->queue) < $this->limit ){
				array_push($this->queue, $item);
			}else{
				throw new \OverflowException("Queue is full");
			}
		}

		public function dequeue(): string
		{
			if($this->isEmpty()){
				throw new \UnderflowException('Queue is Empty');
			}else{
				return array_shift($this->queue);
			}
		}

		public function peek(): string
		{
			return current($this->queue);
		}

		public function isEmpty(): bool
		{
			return empty($this->queue);
		}
	}
