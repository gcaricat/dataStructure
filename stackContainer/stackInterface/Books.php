<?php

	namespace dataStructure\stackInterface;

	include("Stack.php");

	class Books Implements Stack {

		private $limit;
		private $stack;

		public function __construct(int $limit = 20)
		{
			$this->limit = $limit;
			$this->stack = [];
		}

		public function push(string $item)
		{
			if( count($this->stack) < $this->limit ){
				array_push($this->stack, $item);
			}else{
				throw new \UnderflowException('Stack is full');
			}
		}

		public function pop():string
		{
			if( $this->isEmpty() ){
				throw new \UnderflowException('Stack is Empty');
			}else{
				return array_pop($this->stack);
			}
		}

		public function top(): string
		{
			return end($this->stack);
		}

		public function isEmpty():bool
		{
			return empty($this->stack);
		}
	}
