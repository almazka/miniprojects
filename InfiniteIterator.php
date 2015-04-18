<?php
$ai = new ArrayIterator([$task1, $task2, $task3]);
$ii = new InfiniteIterator($ai);
foreach ($ii as $task) {
	# code...
}
$stop = $task->action();
if (true === $stop) {
	break;
}
usleep(200);


?>