<?php

class MyPriorityQueue extends SplPriorityQueue {

	public function compare($priority1, $priority2)
	{
		return $priority1 <=> $priority2;
	}
}

$agents = new MyPriorityQueue();
$agents->insert("Fred", 1);
$agents->insert("marke", 2);
$agents->insert("Anna", 3);
$agents->insert("Laura", 2);

$agents->setExtractFlags(MyPriorityQueue::EXTR_BOTH);
$agents->top();

while ($agents->valid() ){
	$current = $agents->current();
	echo $current['data']."\n";
	$agents->next();
}
