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

	public function display(){
		echo "Total book titles: ".$this->_head."\n";
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
