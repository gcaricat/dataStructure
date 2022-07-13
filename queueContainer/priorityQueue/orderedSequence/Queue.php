<?php

interface Queue {
	public function enqueue(string $item, int $p):void;
	public function dequeue():string;
	public function peek():string;
	public function isEmpty():bool;
}
