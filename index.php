<?php
include "ExecutionTimeRecorder.php";


//First Timer
$timer_1 = new ExecutionTimeRecorder();

//Start Timer
$timer_1->startTimer("First Timer");

//Block of code to test. In this case just a delay of the execution
sleep(4);

//Stop Timer
$timer_1->endTimer();

//Show total time
echo $timer_1->totalTimer();


//Second Timer
$timer_2 = new ExecutionTimeRecorder();

//Start Timer
$timer_2->startTimer("Second Timer");

//Block of code to test. In this case just a delay of the execution
for ($x = 0; $x <= 1000; $x++) {
    echo "The number is: $x <br>";
} 

//Stop Timer
$timer_2->endTimer();

//Show total time
echo $timer_2->totalTimer();

//Time to run page
echo ExecutionTimeRecorder::totalExecution();
