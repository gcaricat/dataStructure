<?php

namespace dataStructure\circularLinkedList;

class CircularLinkedList
{
	private ?ListNode $_head = NULL;
	private int $_totalNodes = 0;

	public function insertAtEnd(string $data = NULL):bool{
		$newNode = new ListNode($data);

		if(!$this->_head){
			$this->_head = &$newNode;
		}else{
			$currentNode = $this->_head;
			while($currentNode->getNext() !== $this->_head){ // block the infinite loop
				$currentNode = $currentNode->getNext();
			}
			$currentNode->setNext($newNode);
		}
		$newNode->setNext($this->_head);//last node -> head
		$this->_totalNodes++;
		return true;
	}

	/**
	 * Insert at first element
	 * @param string|NULL $data
	 * @return bool
	 */
	public function insertAtFirst(string $data = NULL):bool{
		$newNode = new ListNode($data);

		if($this->_head === NULL){
			$this->_head = &$newNode;
			$newNode->setNext($this->_head);//last node -> head
		}else{
			$currentNode = $this->_head;
			while($currentNode->getNext() !== $this->_head){
				$currentNode = $currentNode->getNext();
			}
			$newNode->setNext($this->_head);
			$currentNode->setNext($newNode);
			$this->_head = $newNode;
		}

		$this->_totalNodes++;
		return true;
	}

	public function deleteFirst(): bool{

		if($this->_head){
			$currentNode = $this->_head;
			if(!$currentNode->getNext()){
				$this->_head = NULL;
			}else{
				while($currentNode->getNext() !== $this->_head){
					$currentNode = $currentNode->getNext();
				}
				$currentNode->setNext($this->_head->getNext());
				$this->_head = $currentNode ;

			}
		}
		return FALSE;
	}

	public function display(){
		echo "Total book titles: ".$this->_totalNodes."\n";
		$currentNode = $this->_head;
		while($currentNode->getNext() !== $this->_head){
			echo $currentNode->getData()."\n";
			$currentNode = $currentNode->getNext();
		}

		if($currentNode){
			echo $currentNode->getData()."\n";
		}
	}

}
