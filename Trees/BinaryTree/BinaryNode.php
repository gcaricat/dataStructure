<?php

class BinaryNode {
	/**
	 * @var string
	 */
	private $data;
	/**
	 * @var BinaryNode
	 */
	private $left;
	/**
	 * @var BinaryNode
	 */
	private $right;

	public function __construct(string $data = NULL)
	{
		$this->data = $data;
		$this->left = NULL;
		$this->right = NULL;
	}

	/**
	 * @return string
	 */
	public function getData(): ?string
	{
		return $this->data;
	}

	/**
	 * @return BinaryNode
	 */
	public function getLeft(): ?BinaryNode
	{
		return $this->left;
	}

	/**
	 * @return BinaryNode
	 */
	public function getRight(): ?BinaryNode
	{
		return $this->right;
	}

	public function addChildren(BinaryNode $left, BinaryNode $right){
		$this->left = $left;
		$this->right = $right;
	}



}
