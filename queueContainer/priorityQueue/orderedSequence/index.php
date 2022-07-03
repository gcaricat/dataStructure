<?php

class ListNode {
	public $data = NULL;
	public $next = NULL;
	public $priority = NULL;

	public function __construct(string $data = NULL, int $priority = NULL)
	{
		$this->data = $data;
		$this->priority = $priority;
	}
}
