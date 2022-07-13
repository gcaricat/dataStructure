<?php
	$agents = new SplQueue();
	$agents->enqueue("Maria");
	$agents->enqueue("Rosa");
	$agents->enqueue("Sara");

	echo $agents->dequeue()."\n";
	echo $agents->bottom()."\n";
