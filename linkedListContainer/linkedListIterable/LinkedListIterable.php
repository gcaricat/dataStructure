<?php

namespace dataStructure\linkedList;

use PHPUnit\DbUnit\Operation\Exception;
//use dataStructure\linkedList\ListNode;

include "../linkedList/ListNode.php";
//use Iterator;

class LinkedListIterable implements \Iterator
{
	private ?ListNode $_head = null;
	private int $_totalNodes = 0;
	private ?ListNode $_currentNode;
	private int $_currentPosition = 0;

	public function insert(string $data = NULL):bool{
		$newNode = new ListNode($data);


		/**
		 * We have to consider:
		 * 1. the list is empty and we are inserting the first title
		 * 2. the list is not empty and we have to insert the title to the end
		 */
		if($this->_head === NULL) {
			$this->_head = &$newNode;
		}else{
			$currentNode = $this->_head;
			/**
			 * we iterate untill the end of the list
			 */
			while($currentNode->getNext() !== NULL){
				$currentNode = $currentNode->getNext();
			}
			$currentNode->setNext($newNode);
		}

		$this->_totalNodes++;
		return TRUE;
	}

	public function display():void{
		echo "Total Book Titles: ".$this->_totalNodes."\n";
		$currentNode = $this->_head;
		while ($currentNode !== NULL){
			echo $currentNode->getData()."\n";
			$currentNode = $currentNode->getNext();
		}
	}

	/**
	 * /**
	 * Inserting at first node (head) we have to consider two possibilities
	 * 1. the list can be empty  and as result of the new node is the head
	 * 2. if the list have the head we have to
	 * 2.1 create new node
	 * 2.2 Make the new node as first node or head
	 * 2.3 Assign the previous head or first node as the next follow for the newly
	 * created first node
	 *
	 * @param string|null $data
	 * @return bool
	 */
	public function insertAtFirst(string $data = null):?bool{
		$newNode = new ListNode($data);

		if($this->_head == null) { //1.
			$this->_head = &$newNode;
		}else{

			$currentFirstNode = $this->_head; //create New node
			$this->_head = &$newNode;
			$newNode->setNext($currentFirstNode);
		}

		$this->_totalNodes++;
		return true;

	}

	/**
	 * search a value into linked list
	 * @param string|null $data
	 */

	public function search(string $data = null):bool{

		if($this->_totalNodes){

			$currentNode = $this->_head;
			while ($currentNode){
				if($currentNode->getData() == $data){
					return true;
				}
				$currentNode = $currentNode->getNext();
			}
		}

		return false;
	}

	/**
	 * Insert before specific node
	 * @param string|null $data
	 * @param string|null $query
	 */
	public function insertBefore(string $data = null, string $query = null):void{

		$newNode = new ListNode($data);

		if ($this->_head) {
			$nextNode = NULL;
			$currentNode = $this->_head;
			while ($currentNode) {
				if ($currentNode->getData() === $query) {
					if ($nextNode !== NULL) {
						$newNode->setNext($nextNode);
					}
					$currentNode->setNext($newNode);
					$this->_totalNodes++;
					break;
				}
				$currentNode = $currentNode->getNext();
				$nextNode = $currentNode->getNext();
			}
		}
	}

	/**
	 * Insert after queryString
	 * @param string|null $data
	 * @param string|null $query
	 */
	public function insertAfter(string $data = null, string $query = null ):void{

		$newNode = new ListNode($data);


		if($this->_head){


			$currentNode = $this->_head;
			$nextNode = $currentNode->getNext();

			while ( $currentNode ){

				if($currentNode->getData() === $query ){

					if($nextNode !== NULL){
						$newNode->setNext($nextNode);
					}

					$currentNode->setNext($newNode);
					$this->_totalNodes++;
					break;
				}

				$currentNode = $currentNode->getNext();
				$nextNode = $currentNode->getNext();
			}
		}
	}

	/**
	 * Delete first element
	 * @return bool true if success
	 */
	public function deleteFirst():bool{

		if($this->_head){
			if($this->_head->getNext() !== NULL){
				$this->_head = $this->_head->getNext();
			}else{
				$this->_head = null;
			}

			$this->_totalNodes--;
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Delete last element
	 * @return bool true if success
	 */
	public function deleteLast():bool{

		if($this->_head){
			$currentNode = $this->_head;
			if(!$currentNode->getNext()){
				$this->_head = null;
			}else{
				$previousNode = NULL;
				while ($currentNode->getNext()){
					$previousNode = $currentNode;
					$currentNode = $currentNode->getNext();
				}
				$previousNode->setNext(null);
				$this->_totalNodes++;
				return TRUE;
			}
		}
		return  FALSE;
	}

	/**
	 * delete element from querystring
	 * @param string|null $query
	 */
	public function delete(string $query = NULL):bool
	{

		if ($this->_head) {
			$previousNode = NULL;
			$currentNode = $this->_head;

			while ($currentNode->getData() !== $query && $currentNode->getNext() != null) {
				$previousNode = $currentNode;
				$currentNode = $currentNode->getNext();
			}

			if ($currentNode->getData() === $query) {
				if ($previousNode) {
					$previousNode->setNext($currentNode->getNext());

				} else {
					$this->_head = $currentNode->getNext();
				}
				unset($currentNode);
				return TRUE;
			}
		}
		return FALSE;
	}

	public function getSize(){
		return $this->_totalNodes;
	}

	public function reverse(){

		if($this->_head && $this->_head->getNext()){

			$reversedList = NULL;
			$nextNode = NULL;
			$currentNode = $this->_head;
			while($currentNode){
				$nextNode = $currentNode->getNext();
				$currentNode->setNext($reversedList);
				$reversedList = $currentNode;
				$currentNode = $nextNode;
			}
			$this->_head = $reversedList;
		}
	}

	/**
	 * Get the element at Nth position
	 * @param int $n
	 * @return ListNode
	 */
	public function getNthNode(int $n = 0): ?ListNode{
		$count = 1;
		if($this->_head && $n <= $this->_totalNodes){
			$currentNode = $this->_head;
			while ($currentNode){
				if($count === $n){
					return $currentNode;
				}
				$count++;
				$currentNode = $currentNode->getNext();
			}
		}
	}

	/**
	 * @return mixed|string|null
	 */
	public function current():?string
	{
		return $this->_currentNode->getData();
	}

	/**
	 *
	 */
	public function next(): void
	{

		$this->_currentPosition++;
		$this->_currentNode = $this->_currentNode->getNext();

	}

	/**
	 * @return bool|float|int|string|null
	 */
	public function key(): int
	{
		return $this->_currentPosition;
	}

	public function valid():bool
	{
		return isset($this->_currentNode);
	}

	public function rewind():void
	{
		$this->_currentPosition = 0;
		$this->_currentNode = $this->_head;
	}
}
