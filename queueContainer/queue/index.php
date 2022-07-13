<?php

	use queueContainer\queue\AgentQueue;
	include_once "AgentQueue.php";
	try{
		$agents = new AgentQueue(10);
		$agents->enqueue("Laura");
		$agents->enqueue("Rosa");
		$agents->enqueue("Anna");

		echo $agents->dequeue()."\n";
		echo $agents->peek()."\n";
	}catch ( Exception $e){
	echo $e->getMessage();
}
