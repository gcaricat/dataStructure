<?php

namespace dataStructure\doubleLinkedList;

class DoubleLinkedList{

	private ?ListNode $_head = NULL;
	private ?ListNode $_tail = NULL;
	private int $_totalNodes = 0;

	public function insertAtFirst(string $data = null):bool{
		$newNode = new ListNode($data);

		if($this->_head === null){
			$this->_head = &$newNode;
			$this->_tail = $newNode;
		}else{
			$currentFirstNode = $this->_head;
			$this->_head = &$newNode;
			$newNode->setNext($currentFirstNode);
			$currentFirstNode->setPrev($newNode);
		}
		$this->_totalNodes++;
		return TRUE;
	}

	public function insertAtLast(string $data = null):bool{
		$newNode = new ListNode($data);

		if($this->_head === NULL ){
			$this->_head = &$newNode;
			$this->_tail = $newNode;
		}else{
			$currentLastNode = $this->_tail;

			 //Alternative
//			$currentLastNode->setNext($newNode);
//			$newNode->setPrev($currentLastNode);
//			$this->_tail = $newNode;

			$this->_tail = &$newNode;
			$newNode->setPrev($currentLastNode);
			$currentLastNode->setNext($newNode);
		}
		$this->_totalNodes++;
		return TRUE;

	}

	public function displayForward(){
		echo "Total book titles: ".$this->_totalNodes."\n";
		$currentNode = $this->_head;
		while($currentNode !== null){
			echo $currentNode->getData()."\n";
			$currentNode = $currentNode->getNext();
		}
	}

	public function displayBackward(){
		echo "Total book titles: ".$this->_totalNodes."\n";
		$currentNode = $this->_tail;
		while ($currentNode !== null){
			echo $currentNode->getData()."\n";
			$currentNode = $currentNode->getPrev();
		}
	}

	public function insertBefore(string $data = NULL, string $query = null):bool{
		$newNode = new ListNode($data);

		if($this->_head){
			$previousNode = new ListNode();
			$currentNode = $this->_head;
			while ($currentNode !== NULL){

				if($currentNode->getData() === $query){

					$newNode->setNext($currentNode);
					$currentNode->setPrev($newNode);

					$previousNode->setNext($newNode);
					$newNode->setPrev($previousNode);
					$this->_totalNodes++;
					return TRUE;
				}
				$previousNode = $currentNode;
				$currentNode = $currentNode->getNext();
			}
		}
		return FALSE;
	}

	/**
	 * @param string|null $data
	 * @param string|null $query
	 * @return void
	 */
	function insertAfter(string $data = null, string $query = null){
		$newNode = new ListNode($data);
		if($this->_head){
			$nextNode = new ListNode();
			$currentNode = $this->_head;

			while($currentNode !== null){

				if($currentNode->getData() === $query){
					if($nextNode !== null){
						$newNode->setNext($nextNode);
					}
					if($currentNode === $this->_tail){
						$this->_tail = $nextNode;
					}

					$currentNode->setNext($newNode);
					$nextNode->setPrev($newNode);
					$newNode->setPrev($currentNode);
					$this->_totalNode++;

				}
				$currentNode = $currentNode->getNext();
				$nextNode = $currentNode->getNext();
			}
		}
	}

	/**
	 * Delete first node.
	 * @return bool true if success
	 */
	public function deleteFirst():bool{

		if($this->_head){
			if( $this->_head->getNext() ){
				$this->_head = $this->_head->getNext();
				$this->_head->setPrev(null);
			}else{
				$this->_head = NULL;
			}

			$this->_totalNodes--;
			return TRUE;
		}
		return FALSE;
	}

	public function deleteLast():bool{
		if($this->_tail){
			$currentNode = $this->_tail;

			if($currentNode->getPrev()){
				$this->_tail = $currentNode->getPrev();
				$this->_tail->setNext(null);
				$this->_totalNodes--;
				return TRUE;
			}else{
				$this->_head = NULL;
				$this->_tail = NULL;
			}
		}
		return FALSE;
	}

	public function delete(string $query = NULL):bool{

		if($this->_head){
			$previousNode = new ListNode();
			$currentNode = $this->_head;
			while ($currentNode !== NULL){

				if($currentNode->getData() === $query){

					if($currentNode->getNext() === NULL){
						$previousNode->setNext(NULL);
					}else{
						$previousNode->setNext($currentNode->getNext());
						$currentNode->getNext()->setPrev($previousNode);
						$currentNode = $previousNode;
					}
					$this->_totalNodes--;
					return true;
				}
				$previousNode = $currentNode;
				$currentNode = $currentNode->getNext();
			}
		}
		return false;
	}



}
