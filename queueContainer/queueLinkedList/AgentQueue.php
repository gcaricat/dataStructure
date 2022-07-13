<?php
namespace queueContainer\queueLinkedList;

use dataStructure\linkedListIterable\LinkedListIterable;

class AgentQueue implements Queue {

	private $limit;
	private $queue;

	public function __construct(int $limit = 20)
	{
		$this->limit = $limit;
		$this->queue = new LinkedListIterable();
	}

	public function enqueue(string $item)
	{
		if($this->queue->getSize() < $this->limit){
			$this->queue->insert($item);
		}else{
			throw new \OverflowException("Queue is full");
		}
	}

	public function dequeue(): string
	{
		if($this->isEmpty()){
			throw new \UnderflowException("Queue is Empty");
		}else{
			$lastItem = $this->peek();
			$this->queue->deleteFirst();

			return $lastItem;
		}
	}

	public function peek(): string
	{
		return $this->queue->getNthNode(1)->getData();
	}

	public function isEmpty(): bool
	{
		return $this->queue->getSize() == 0;
	}
}
