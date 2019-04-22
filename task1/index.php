<?php
define('COUNT_NUM', 64); // сколько чисел выводить

function fibonacci(int $count)
{
	$result = array();
	for($i = 0; $i < $count; $i++){
		if($i == 0 || $i == 1){
			$result[$i] = "1";
		} else {
			$result[$i] = bcadd($result[$i - 1], $result[$i - 2]);
		}
	}
	return $result;
}

foreach(fibonacci(COUNT_NUM) as $key => $val){
	echo '[' . ($key+1) . '] => ' . $val . "<br>";
}

?>