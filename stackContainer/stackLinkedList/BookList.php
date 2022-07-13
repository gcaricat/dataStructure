<?php
	namespace dataStructure\stackLinkedList;

	use dataStructure\linkedListIterable\LinkedListIterable;

	include_once "Stack.php";
	include_once "../../linkedListContainer/linkedListIterable/LinkedListIterable.php";


	class BookList implements Stack {

		private $stack;

		public function __construct()
		{
			$this->stack = new LinkedListIterable();
		}

		public function pop(): ?string
		{
			if($this->isEmpty()){
				throw new \UnderflowException("Stack is Empty");
			}else{
				$lastItem = $this->top();
				$this->stack->deleteLast();
				return $lastItem;
			}
		}

		public function push(string $item)
		{
			$this->stack->insert($item);
		}

		public function top(): ?string
		{
//			if( $this->stack->getNthNode($this->stack->getSize())->getData() ){
//				return $this->stack->getNthNode($this->stack->getSize())->getData();
//			}
//
//			return null;

			return $this->stack->getNthNode($this->stack->getSize())->getData() ?: null;
		}

		public function isEmpty():bool
		{
			return $this->stack->getSize() == 0;
		}

	}
