<?php

class car{
    
//variable sfor car
    public string $make; 
    public string $model;
    public int $year;
    
    // initialize the car object
    public function __construct(string $make, string $model, int $year){
        $this-> make = $make;
        $this-> model = $model;
        $this-> year = $year;
    }
    // return car info as a string
    public function getCarInfo() {
        return $this->year . " " . $this->make . " " . $this->model;
    }
  
}
