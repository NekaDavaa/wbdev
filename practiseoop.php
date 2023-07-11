<?php

class Car {
    
    public $brand;
    public $color;
    public $price;
    
    
    public function startEngine() {
        echo "Engine started!";
    }
    
    public function stopEngine() {
        echo "Engine stopped!";
    }
    
    public function drive() {
        echo "Driving the car!";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $car = new Car();
    $car->brand = $_POST['brand'];
    $car->color = $_POST['color'];
    $car->price = $_POST['price'];

    
    echo "Car: " . $car->brand . ", " . $car->color . ", $" . $car->price . "<br>";
    $car->startEngine();
    echo "<br>";
    $car->drive();
    echo "<br>";
}

?>


<form method="POST" action="">
    <label for="brand">Brand:</label>
    <input type="text" name="brand" id="brand" required><br>
    
    <label for="color">Color:</label>
    <input type="text" name="color" id="color" required><br>
    
    <label for="price">Price:</label>
    <input type="number" name="price" id="price" required><br>
    
    <input type="submit" value="Submit">
</form>
