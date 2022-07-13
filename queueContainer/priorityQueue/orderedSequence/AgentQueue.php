<?php
namespace dataStructure\queueContainer\priorityQueue\orderedSequence;
use dataStructure\queueContainer\priorityQueue\orderedSequence;

include "Queue.php";
include "LinkedList.php";


class AgentQueue implements \Queue {

	private $limit;
	private $queue;

	public function __construct(int $limit = 20)
	{
		$this->limit = $limit;
		$this->queue = new LinkedList();
	}

	public function enqueue(string $item, int $priority): void
	{
		if($this->queue->getSize() < $this->limit){
			$this->queue->insert($item, $priority);
		}else{
			throw new \OverflowException("Queue is full");
		}
	}

	public function dequeue(): string
	{
		if( $this->isEmpty() ){
			throw new \UnderflowException("Queue is empty");
		}else{
			$lastItem = $this->peek();
			$this->queue->deleteFirst();
			return  $lastItem;
		}
	}

	public function peek(): string
	{
		return $this->queue->getNthNode(1)->getData();
	}

	public function isEmpty(): bool
	{
		return $this->queue->getSize() === 0;
	}

	public function display(){
		$this->queue->display();
	}
}
