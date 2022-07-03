<?php

include_once "TreeNode.php";

class Tree {
	private $root = NULL;

	public function __construct(TreeNode  $node){
		$this->root = $node;
	}

	public function getRoot(){
		return $this->root;
	}

	public function traverse(TreeNode $node, int $level = 0){

		if($node){
			echo str_repeat("- ", $level);
			echo $node->getData()."\n";

			foreach ($node->getChildren() as $childNode) {
				$this->traverse($childNode, $level+1);
			}
		}
	}
}
