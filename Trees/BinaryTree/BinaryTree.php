<?php

class BinaryTree {
	private $root = NULL;

	public function __construct(BinaryNode $node)
	{
		$this->root = $node;
	}

	public function getRoot(){
		return $this->root;
	}

	public function traverse(BinaryNode $node, int $level = 0){
		if($node){
			echo str_repeat("-", $level);
			echo $node->getData()."\n";

			if($node->getLeft()){
				$this->traverse($node->getLeft(), $level+1);
			}

			if($node->getRight()){
				$this->traverse($node->getRight(), $level+1);
			}
		}
	}


}
