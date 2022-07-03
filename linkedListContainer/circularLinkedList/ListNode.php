<?php

namespace dataStructure\circularLinkedList;

class ListNode{

	/**
	 * data contained into the listNode
	 * @var string|null
	 */
	private ?string $data;

	/**
	 * @var \dataStructure\linkedList\ListNode|null
	 */
	private ?ListNode $next = null;

	public function __construct(string $data = null)
	{
		$this->data = $data;
	}

	/**
	 * @param string|null $data
	 */
	public function setData(?string $data): void
	{
		$this->data = $data;
	}

	/**
	 * @param null $next
	 */
	public function setNext(?ListNode $next): void
	{
		$this->next = $next;
	}

	/**
	 * @return string|null
	 */
	public function getData(): ?string
	{
		return $this->data;
	}

	/**
	 * @return ListNode|null
	 */
	public function getNext(): ?ListNode
	{
		return $this->next;
	}



}
