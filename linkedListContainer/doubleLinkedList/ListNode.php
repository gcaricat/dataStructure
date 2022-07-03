<?php
namespace dataStructure\doubleLinkedList;

class ListNode{
	/**
	 * @var string|null
	 */
	private ?string $data = NULL;

	/**
	 * @var ListNode|null
	 */
	private ?ListNode $next = NULL;

	/**
	 * @var ListNode|null
	 */
	private ?ListNode $prev = NULL;

	public function __construct($data = null)
	{
		$this->data = $data;
	}

	/**
	 * @return string|null
	 */
	public function getData(): ?string
	{
		return $this->data;
	}

	/**
	 * @param string|null $data
	 */
	public function setData(?string $data): void
	{
		$this->data = $data;
	}

	/**
	 * @return ListNode|null
	 */
	public function getNext(): ?ListNode
	{
		return $this->next;
	}

	/**
	 * @param ListNode|null $next
	 */
	public function setNext(?ListNode $next): void
	{
		$this->next = $next;
	}

	/**
	 * @return ListNode|null
	 */
	public function getPrev(): ?ListNode
	{
		return $this->prev;
	}

	/**
	 * @param ListNode|null $prev
	 */
	public function setPrev(?ListNode $prev): void
	{
		$this->prev = $prev;
	}



}
