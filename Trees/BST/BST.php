<?php

/**
 * http://btv.melezinek.cz/binary-search-tree.html
 */

	include "Node.php";

	class BST {
		private $root = NULL;

		public function __construct(int $data)
		{
			$this->root = new Node($data);
		}

		public function getRoot(){
			return $this->root;
		}

		public function isEmpty(): bool {
			return $this->root === NULL;
		}

		/**
		 * 1. Create a new node as a leaf (no left child or right child).
		 * 2. Start with the root node and set it as the current node.
		 * 3. If the node is empty, make the new node as the root.
		 * 4. Check whether the new value is less than the current node or more.
		 * 5. If less, go to the left and set the left as the current node.
		 * 6. If more, go to the right and set the right as the current node.
		 * 7. Continue to step 3 until all the nodes are visited and the new node is set.
		 *
		 * @param int $data
		 * @return void
		 */
		public function insert(int $data){

			if( $this->isEmpty() ){
				$node = new Node($data);
				$this->root = $node;
				return $node;
			}

			$node = $this->root;

			while ($node){

				if( $data > $node->getData() ){

					if($node->getRight()){
						$node = $node->getRight();
					}else{
						$node->setRight( new Node($data, $node) );
						$node = $node->getRight();
						break;
					}

				}elseif( $data < $node->getData() ){
					if( $node->getLeft() ){
						$node = $node->getLeft();
					}else{
						$node->setLeft(new Node($data, $node));
						$node = $node->getLeft();
						break;
					}
				}else{
					break;
				}
			}
			return $node;
		}

		public function traverse(Node $node, string $type = "in-order"){

			switch ($type){
				case "in-order":
					$this->inOrder($node);
					break;
				case "pre-order":
					$this->preOrder($node);
					break;
				case "post-order":
					$this->postOrder($node);
					break;
			}

		}

		public function preOrder(Node $node){
			if($node){
				echo $node->getData()." ";
				if($node->getLeft()){
					$this->traverse($node->getLeft());
				}
				if($node->getRight()){
					$this->traverse($node->getRight());
				}
			}
		}

		public function inOrder(Node $node){
			if($node){
				if($node->getLeft()){
					$this->traverse($node->getLeft());
				}
				echo $node->getData()." ";
				if($node->getRight()){
					$this->traverse($node->getRight());
				}
			}
		}

		public function postOrder(Node $node){
			if($node){
				if($node->getLeft()){
					$this->traverse($node->getLeft());
				}
				if($node->getRight()){
					$this->traverse($node->getRight());
				}
				echo $node->getData()." ";
			}
		}

		/**
		 * 1. Start with the root node and set it as the current node.
		 * 2. If the current node is empty, return false.
		 * 3. If the current node value is the search value, return true.
		 * 4. Check whether the searching value is less than the current node or more.
		 * 5. If less, go to the left and set the left as the current node.
		 * 6. If more, go to the right and set the right as the current node.
		 * 7. Continue to step 3 until all the nodes are visited.
		 * @param int $data
		 * @return void
		 */
		public function search(int $data){
			if($this->isEmpty()){
				return FALSE;
			}

			$node = $this->root;

			while ($node){
				if($data > $node->getData()){
					$node = $node->getRight();
				}elseif($data < $node->getData()){
					$node = $node->getLeft();
				}else{
					break;
				}
			}
			return $node;
		}


		public function delete(){
			/** @var Node $node */
			$node = $this;
			if( !$node->getLeft() && !$node->getRight() ){
				if($node->getParent()->getLeft() === $node){
					$node->getParent()->setLeft(NULL);
				}else{
					$node->getParent()->setRight(NULL);
				}
			}elseif($node->getLeft() && $node->getRight()){
				/** @var Node $successor */
				$successor = $node->successor();
				$node->setData($successor->getData());
				$successor->delete();
			}elseif($node->getLeft()){
				if($node->getParent()->getLeft() === $node){
					$node->getParent()->setLeft($node->getLeft());
					$node->getLeft()->setParent($node->getParent()->getLeft());
				}else{
					$node->getParent()->setRight($node->getLeft());
					$node->getLeft()->setParent($node->getParent()->getRight());
				}
				$node->setLeft($NULL);
			}elseif ($node->getRight()){

				if($node->getParent()->getLeft() === $node){
					$node->getParent()->setLeft($node->getRight());
					$node->getRight()->setParent($node->getParent()->getRight());
				}
				$node->setRight(NULL);
			}
		}

		public function remove(int $data){
			$node = $this->search($data);
			if ($node){
				$node->delete();
			}
		}
	}
