<?php

use dataStructure\queueContainer\priorityQueue\orderedSequence\AgentQueue;
include "AgentQueue.php";

try {
	$agents = new AgentQueue();
	$agents->enqueue("Anna", 1);
	$agents->enqueue("Laura", 2);
	$agents->enqueue("Rosa", 1);
	$agents->enqueue("Maria", 3);
	$agents->enqueue("Gianna", 4);
	$agents->display();
	echo $agents->dequeue();
	$agents->display();
}catch (Exception $e){
	echo $e->getMessage();
}
