<?php 

require "header.php"; 
require_once "car.php";
require_once "connect.php";

// create a new Car object
$myCar = new Car("Toyota", "Matrix", 2014);

// display car info in browser
echo "<h2>Car Information</h2>";
echo $myCar->getCarInfo();

require "footer.php"; 

/*
I found creating the Car class and displaying the object information
in the browser was fairly easy. I am already comfortable with things like properties, constructors, and methods.

The challenging part was actually getting used to the structure of the language and its syntax. I kept forgetting to use $ for variables so it took me a while to get used to using it so often.
*/