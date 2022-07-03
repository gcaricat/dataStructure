<?php

class TreeNode {
	private $data = NULL;
	private $children = [];

	public function __construct(string $data = NULL)
	{
		$this->data = $data;
	}

	public function addChildren(TreeNode $node){
		$this->children[] = $node;
	}

	public function getData(){
		return $this->data;
	}

	public function getChildren(){
		return $this->children;
	}
}

