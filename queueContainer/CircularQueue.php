<?php

interface Queue{
	public function enqueue(string $item);
	public function dequeue();
	public function peek();
	public function isEmpty();
}

class CircularQueue implements Queue{
	private $queue;
	private $limit;
	private $front = 0;
	private $rear = 0;

	public function __construct(int $limit = 5)
	{
		$this->limit = $limit;
		$this->queue = [];
	}

	public function size(){
		if($this->rear > $this->front) {
			return $this->rear - $this->front;
		}
		return $this->limit - $this->front + $this->rear;
	}

	public function isEmpty(): bool
	{
		return $this->rear == $this->front;
	}

	public function isFull(): bool{
		$diff =  $this->rear - $this->front;
		if($diff == -1 || $diff == ($this->limit -1) ){
			return true;
		}
		return false;
	}

	public function enqueue(string $item): void
	{
		if( $this->isFull() ){
			throw new OverflowException("Queue is full");
		} else{
			$this->queue[$this->rear] = $item;
			$this->rear = ($this->rear + 1 ) % $this->limit;
		}
	}

	public function dequeue(): string
	{
		$item = "";
		if( $this->isEmpty() ){
			throw new UnderflowException("Queue is empty");
		}else{
			$item = $this->queue[$this->front];
			$this->queue[$this->front] = NULL;
			$this->front = ($this->front + 1) % $this->limit;
		}
		return  $item;
	}

	public function peek() {
		return $this->queue[$this->front];
	}
}

try {
	$cirQueue = new CircularQueue();
	$cirQueue->enqueue("one");
	$cirQueue->enqueue("Two");
	$cirQueue->enqueue("Three");
	$cirQueue->dequeue();
	$cirQueue->enqueue("FIVE");
	echo $cirQueue->size();
}catch (Exception $e){
	echo $e->getMessage();
}
