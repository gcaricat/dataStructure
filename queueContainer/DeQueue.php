<?php

/**
 * Double ended queue
 */

class ListNode {
	private $data = NULL;
	private $next = NULL;

	public function __construct(string $data = null)
	{
		$this->data = $data;
	}

	public function getData(){
		return $this->data;
	}

	public function getNext(){
		return $this->next;
	}

	public function setNext(LinkedList $node){
		$this->next = $node;
	}

}

class LinkedList implements Iterator {

	private $_firstNode = NULL;
	private $_totalNode = 0;
	private $_currentNode = NULL;
	private $_currentPosition = 0;

	public function insert(string $data = null){
		$newNode = new LinkedList($data);
		if($this->_firstNode == null){
			$this->_firstNode = $newNode;
		}else{
			/**
			 * @var ListNode
			 */
			$currentNode = $this->_firstNode;
			while ($currentNode->getNext() !== NULL){
				$currentNode = $currentNode-getNext();
			}
			$currentNode->setNext($newNode);
		}
		$this->_totalNode++;
		return TRUE;
	}

	public function insertAtFirst(string $data = NULL){
		$newNode = new ListNode($data);
		if($this->_firstNode === NULL){
			$this->_firstNode = &$newNode;
		}else{
			$currentFirstNode = $this->_firstNode;
			$this->_firstNode = &$newNode;
			$newNode->setNext($currentFirstNode);
		}
		$this->_totalNode++;
		return true;
	}

	public function search(string $data = null){
		if( $this->_totalNode ){
			$currentNode = $this->_firstNode;
			while ($currentNode !== null){
				if($currentNode->getData() === $data){
					return $currentNode;
				}
				$currentNode = $currentNode->getNext();
			}
		}
		return FALSE;
	}

	public function insertBefore(string $data = NULL, string $query = NULL){
		$newNode = new ListNode($data);

		if($this->_firstNode){
			$previous = NULL;
			$currentNode = $this->_firstNode;
			while ($currentNode !== null){
				if($currentNode->getData()  === $query){
					$newNode->setNext($currentNode);
					$previous->setNext($newNode);
					$this->_totalNode++;
					break;
				}

				$previous = $currentNode;
				$currentNode = $currentNode->getNext();
			}
		}
	}

	public function insertAfter(string $data = null, string $query = null){
		$newNode = new ListNode($data);

		if($this->_firstNode){
			$nextNode = NULL;
			$currentNode = $this->_firstNode;

			while ($currentNode !== null){

				if($currentNode->getData() === $query){
					if($nextNode !== NULL){
						$newNode->setNext($nextNode);
					}
					$currentNode->setNext($newNode);
					$this->_totalNode++;
					break;
				}
				$currentNode = $currentNode->getNext();
				$nextNode = $currentNode->getNext();

				$currentNode = $currentNode->getNext();
			}
		}
	}

	public function deleteFirst(){
		if($this->_firstNode !== NULL){
			if($this->_firstNode->getNext() !== NULL){
				$this->_firstNode = $this->_firstNode->getNext();
			}else{
				$this->_firstNode = NULL;
			}
			$this->_totalNode--;
			return TRUE;
		}
		return FALSE;
	}

	public function deleteLast(){
		if($this->_firstNode !== NULL){
			$currentNode = $this->_firstNode;
			if($currentNode->getNext() === NULL){
				$this->_firstNode = NULL;
			}else{
				$previousNode = NULL;
				while($currentNode->getNext() !== NULL){
					$previousNode = $currentNode;
					$currentNode = $currentNode->getNext();
				}
				$previousNode->setNext(NULL);
				$this->_totalNode--;
				return TRUE;
			}
		}
		return FALSE;
	}

	public function delete(string $query = NULL){
		if($this->_firstNode){
			$previous = NULL;
			$currentNode = $this->_firstNode;
			while($currentNode !== NULL){
				if($currentNode->getData() === $query){
					if($currentNode->getNext() === NULL){
						$previous->setNext(NULL);
					}else{
						$previous->setNext($currentNode->getNext());
					}

					$this->_totalNode--;
					break;
				}
				$previous = $currentNode;
				$currentNode = $currentNode->getNext();
			}
		}
	}

	public function reverse(){
		if($this->_firstNode !== NULL){
			if($this->_firstNode->getNext() !== NULL ){
				$reversedList = NULL;
				$next = NULL;
				$currenNode = $this->_firstNode;
				while ($currenNode !== NULL){
					$next = $currenNode->getNext();
					$currenNode->setNext($reversedList);
					$reversedList = $currenNode;
					$currenNode = $next;
				}
				$this->_firstNode = $reversedList;
			}
		}
	}

	public function getNthNode(int $n = 0){
		$count = 1;
		if($this->_firstNode !== NULL && $n <= $this->_totalNode){
			$currentNode = $this->_firstNode;
			while ($currentNode !== NULL){
				if($count === $n) {
					return $currentNode;
				}
				$count++;
				$currentNode = $currentNode->getNext();
			}
		}
	}

	public function display(){
		echo "TOTAL ".$this->_totalNode;
		$currentNode = $this->_firstNode;
		while($currentNode !== NULL){
			echo $currentNode->getData()."\n";
			$currentNode = $currentNode->getNext();
		}
	}

	public function getSize(){
		return $this->_totalNode;
	}

	public function current()
	{
		return $this->_currentNode->getData();
	}

	public function next()
	{
		$this->_currentPosition++;
		$this->_currentNode = $this->_currentNode->getNext();
	}

	public function key(){
		return $this->_currentPosition;
	}

	public function rewind(){
		$this->_currentPosition = 0;
		$this->_currentNode = $this->_firstNode;
	}

	public function valid(){
		return $this->_currentNode !== NULL;
	}
}


class DeQueue {
	private $limit;
	private $queue;

	public function __construct(int $limit = 20){
		$this->limit = $limit;
		$this->queue = new LinkedList();
	}

	public function dequeueFromFront(): string {
		if($this->isEmpty()){
			throw new UnderflowException("Queue is Empty");
		}else{
			$lastItem = $this->peekFront();
			$this->queue->deleteFirst();
			return $lastItem;
		}
	}

	public function dequeueFromBack(): string {
		if ($this->isEmpty()) {
			throw new UnderflowException('Queue is empty');
		} else {
			$lastItem = $this->peekBack();
			$this->queue->deleteLast();
			return $lastItem;
		}
	}

	public function enqueueAtBack(string $newItem) {

		if ($this->queue->getSize() < $this->limit) {
			$this->queue->insert($newItem);
		} else {
			throw new OverflowException('Queue is full');
		}
	}

	public function enqueueAtFront(string $newItem) {

		if ($this->queue->getSize() < $this->limit) {
			$this->queue->insertAtFirst($newItem);
		} else {
			throw new OverflowException('Queue is full');
		}
	}

	public function peekFront(): string {
		return $this->queue->getNthNode(1)->getData();
	}

	public function peekBack(): string {
		return $this->queue->getNthNode($this->queue->getSize())->getData();
	}

	public function isEmpty(): bool {
		return $this->queue->getSize() == 0;
	}
}

try {
	$agents = new DeQueue(10);
	$agents->enqueueAtFront("Anna");
	$agents->enqueueAtFront("Rosa");
	$agents->enqueueAtBack("Kendra");
	$agents->enqueueAtFront("Alina");
	echo $agents->dequeueFromBack() . "\n";
	echo $agents->dequeueFromFront() . "\n";
	echo $agents->peekFront() . "\n";
	echo $agents->peekBack() . "\n";
} catch (Exception $e) {
	echo $e->getMessage();
}
