<?php

class ExecutionTimeRecorder {

    //The name of the timer
    private $name = "Timer";
    //Start time of a timer
    private $time_start = 0.0;
    //End time of a timer
    private $time_end = 0.0;
    //Execution time of a timer
    private $time = 0.0;
    //Execution time of all timers
    static $total_exec = 0.0;
    //Number of timers used
    static $number_timers = 0; //Number of timers used

    /**
     * Returns the name of a timer
     * @return String
     */

    public function getName() {
        return $this->name;
    }
    
    /**
     * Returns the start time of a timer
     * @return String
     */
    public function getTimeStart() {
        return $this->time_start;
    }

    /**
     * Returns the end time of a timer
     * @return String
     */
    public function getTimeEnd() {
        return $this->time_end;
    }

    /**
     * Return the execution time of a timer
     * @return Float
     */
    public function getTime() {
        return $this->time;
    }

    /**
     * Return the execution time of all timers
     * @return Float
     */
    static function getTotalExec() {
        return static::$total_exec;
    }
    
     /**
     * Return the execution time of all timers
     * @return Float
     */
    static function getNumberTimers() {
        return static::$number_timers;
    }

    /**
     * Returns the name and execution time of the timer
     * @return String
     */
    public function totalTimer() {
        return "It took " . $this->getTime() . " seconds to run " . $this->getName() . " <br>";
    }

    /**
     * Function to start a timer. Increments number of timers used
     * @param String $name
     * @return void
     */
    public function startTimer($name = null) {

        //Name Provided?
        if ($name != "" && $name != null) {
            $this->name = $name;
        }

        $this->time_start = microtime(true);
        static::$number_timers++;
    }

    /**
     * Function to end a timer. Increments the execution time of all timers
     * return void 
     */
    public function endTimer() {
        $this->time_end = microtime(true);
        $this->time = number_format(($this->time_end - $this->time_start), 5);
        static::$total_exec += $this->time;
    }

    /**
     * Return description with number of timers used and time to run the entire page
     * @return String
     */
    static function totalExecution() {
        return static::getNumberTimers() . " Timers have been used and it "
                . "took " . static::getTotalExec() . " seconds to run them.<br/> It also took " . number_format((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']), 5) . " seconds to run the entire page";;
    }

}
