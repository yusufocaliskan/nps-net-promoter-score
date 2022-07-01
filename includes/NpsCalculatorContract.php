<?php

interface NpsCalculatorContract
{
    /**
     * Creates an instance of the calculator provided an
     * array of responses (expressed as integers in the range
     * 1 to 10).
     * 
     * @param int[] $responses
     */
    public function __construct(array $responses);

    /**
     * Returns the Net Promoter Score rounded
     * to the nearest integer.
     * 
     * @return int Between -100 and 100.
     */
    public function getNpsScore(): int;

    /**
     * Returns the number of responses that
     * were promoters.
     * 
     * @return int
     */
    public function getPromoterCount(): int;

    /**
     * Returns the number of responses that
     * were passives.
     * 
     * @return int
     */
    public function getPassiveCount(): int;

    /**
     * Returns the number of responses that
     * were detractors.
     * 
     * @return int
     */
    public function getDetractorCount(): int;

    /**
     * Returns the total number of responses.
     * 
     * @return int
     */
    public function getTotalResponseCount(): int;
}