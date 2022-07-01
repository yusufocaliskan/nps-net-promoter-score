<?php

require "includes/NpsCalculatorContract.php";

class Nps implements NpsCalculatorContract
{   
    /**
     * Holds the response
     */
    private $responses = [];    

    //the total number of promters
    private $promoters = 0;

    //the total number of detractors
    private $detractors = 0;

    //the total number of passive
    private $passive = 0;

    //the last score
    private $nps_score = 0;

    /**
     * Creates an instance of the calculator provided an
     * array of responses (expressed as integers in the range
     * 1 to 10).
     * 
     * @param int[] $responses
     */
    public function __construct(array $responses){

        //Set the responses
        $this->responses = $responses;
        
        //Calculate the nps
        $this->nps_calculator();
    }

    /**
     * Calculates the nps result using 
     * the responses which assigned to $responses variable
     * 
     * @return int the result
     */
    private function nps_calculator()
    {
        
        $l = $this->getTotalResponseCount();

        for ($i=0; $i < $l; $i++) {
            
            //define the promoters
            if ($this->responses[$i] >= 9){
                $this->promoters++;
            }

            //define the detractors
            if ($this->responses[$i] <= 6){ 
                $this->detractors++;
            }

            //define the passives
            if($this->responses[$i] > 6 && $this->responses[$i] < 9  )
            {
                $this->passive++;
            }
        }

        //set the variable
        //And return it back
        $this->nps_score =  round((($this->promoters / $l) - ($this->detractors / $l)) * 100);
        return $this->nps_score;

    }

    /**
     * Returns the Net Promoter Score rounded
     * to the nearest integer.
     * 
     * @return int Between -100 and 100.
     */
    public function getNpsScore(): int {
        return $this->nps_score;
    }

    /**
     * Returns the number of responses that
     * were promoters.
     * 
     * @return int
     */
    public function getPromoterCount(): int {
        return $this->promoters;
    }

    /**
     * Returns the number of responses that
     * were passives.
     * 
     * @return int
     */
    public function getPassiveCount(): int {
        return $this->passive;
    }

    /**
     * Returns the number of responses that
     * were detractors.
     * 
     * @return int
     */
    public function getDetractorCount(): int {
        return $this->detractors;
    }

    /**
     * Returns the total number of responses.
     * 
     * @return int
     */
    public function getTotalResponseCount(): int {
        return count($this->responses);
    }

}
