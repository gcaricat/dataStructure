<?php
namespace dataStructure\queueContainer\priorityQueue\orderedSequence;

use Iterator;

include "ListNode.php";

class LinkedList implements Iterator {

	/**
	 * @var ListNode
	 */
	private $_firstNode = nulL;
	private $_totalNode = 0;

	/*
	 * @var ListNode
	 */
	private $_currentNode = NULL;
	private $_currentPosition = 0;

	public function  insert(string $data = null, int $priority = null){
		/**
		 * we have queue |10|1|next| -> |20|3|next| -> |5|4|next| -> null
		 * we have to add |15|2|next|
		 * the result is |10|1|next| -> |15|2|next| -> |20|3|next| -> |5|4|next| -> null
		 *
		 * for the insert we have 3 conditions:
		 * 1. the list is empty -> the new node is the first node
		 * 2. the list is not empty and the new item has the highest priority -> so it become the first node
		 * 3. the list is not empty and the priority is not the highest, so:
		 * 	3.1 we have to insert the new node inside the list or at the end of the list
		 */

		$newNode = new ListNode($data);
		$this->_totalNode++;

		if($this->_firstNode === null){
			$this->_firstNode = &$newNode;
		}else{
			$previous = $this->_firstNode;
			$currentNode = $this->_firstNode;

			while ($currentNode !== null){
				if( $currentNode->getPriority() < $priority ){

					if($currentNode == $this->_firstNode){
						$previous = $this->_firstNode;
						$this->_firstNode = $newNode;
						$newNode->setNext($previous);
						return;
					}
					$newNode->setNext($currentNode);
					$previous->setNext($newNode);
					return;
				}
				$previous = $currentNode;
				$currentNode = $currentNode->getNext();
			}
		}
		return true;
	}

	public function deleteFirst(): bool {

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

	public function getSize(): int{
		return $this->_totalNode;
	}

	public function current(): ListNode{
		return $this->_currentNode->getData();
	}

	public function next(): ListNode{
		$this->_currentPosition++;
		$this->_currentNode = $this->_currentNode->getNext();
	}

	public function key(): int{
		return $this->_currentPosition;
	}

	public function rewind(): void{
		$this->_currentPosition = 0;
		$this->_currentNode = $this->_firstNode;
	}

	public function valid(): bool{
		return $this->_currentNode != NULL;
	}

	public function getNthNode(int $n = 0): ListNode {
		$count = 1;
		if($this->_firstNode !== null && $n <= $this->_totalNode){
			$currentNode = $this->_firstNode;
			while ($currentNode !== NULL){
				if($count === $n){
					return $currentNode;
				}
				$currentNode = $currentNode->getNext();
				$count++;
			}
		}
		throw new \UnderflowException("Node not exist check position ".$n);
	}

	public function display(){
		echo "Total Elements ".$this->_totalNode. "\n";
		$currentNode = $this->_firstNode;
		while ($currentNode !== NULL){
			echo $currentNode->getData()."\n";
			$currentNode = $currentNode->getNext();
		}
	}
}
