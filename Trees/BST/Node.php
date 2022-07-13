<?php

class Node {
	private $data;
	private $left;
	private $right;
	private $parent;

	public function __construct(int $data = null, Node $parent = null)
	{
		$this->data = $data;
		$this->left = NULL;
		$this->right = NULL;
		$this->parent = $parent;
	}

	public function min() {
		$node = $this;

		while ( $node->left ){
			$node = $node->left;
		}
		return $node;
	}

	public function max(){
		$node = $this;
		while($node->right){
			$node = $node->right;
		}
		return $node;
	}

	public function successor(){
		$node = $this;
		if($node->right){
			return $node->right->min();
		}else{
			return NULL;
		}
	}

	public function predecessor(){
		$node = $this;
		if($node->left){
			return $node->left->max();
		}else{
			return NULL;
		}
	}

	public function delete() {
		$node = $this;
		if (!$node->left && !$node->right) {
			if ($node->parent->left === $node) {
				$node->parent->left = NULL;
			} else {
				$node->parent->right = NULL;
			}
		} elseif ($node->left && $node->right) {
			$successor = $node->successor();
			$node->data = $successor->data;
			$successor->delete();
		} elseif ($node->left) {
			if ($node->parent->left === $node) {
				$node->parent->left = $node->left;
				$node->left->parent = $node->parent->left;
			} else {
				$node->parent->right = $node->left;
				$node->left->parent = $node->parent->right;
			}
			$node->left = NULL;
		} elseif ($node->right) {

			if ($node->parent->left === $node) {
				$node->parent->left = $node->right;
				$node->right->parent = $node->parent->left;
			} else {
				$node->parent->right = $node->right;
				$node->right->parent = $node->parent->right;
			}
			$node->right = NULL;
		}
	}

	/**
	 * @return int|null
	 */
	public function getData(): ?int
	{
		return $this->data;
	}

	/**
	 * @return null
	 */
	public function getLeft()
	{
		return $this->left;
	}

	/**
	 * @return null
	 */
	public function getRight()
	{
		return $this->right;
	}

	public function getParent()
	{
		return $this->parent;
	}

	/**
	 * @param int|null $data
	 */
	public function setData(?int $data): void
	{
		$this->data = $data;
	}

	/**
	 * @param null $left
	 */
	public function setLeft($left): void
	{
		$this->left = $left;
	}

	/**
	 * @param null $right
	 */
	public function setRight($right): void
	{
		$this->right = $right;
	}

	public function setParent($parentNode): void
	{
		$this->parent = $parentNode;
	}

}
