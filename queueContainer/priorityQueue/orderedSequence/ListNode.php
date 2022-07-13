<?php

namespace dataStructure\queueContainer\priorityQueue\orderedSequence;

class ListNode {
	private $data = NULL;
	private $next = NULL;
	private $priority = null;

	public function __construct(string $data = NULL, int $priority = NULL)
	{
		$this->data = $data;
		$this->priority = $priority;
	}

	public function getData(): string{
		return $this->data;
	}

	public function getNext(){
		return $this->next;
	}

	public function setNext($nextEl):void{
		$this->next = $nextEl;
	}

	public function getPriority(): ?int{
		return $this->priority;
	}
}
