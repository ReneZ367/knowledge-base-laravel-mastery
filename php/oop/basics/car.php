<?php

namespace KnowledgeBase\Php\Oop;

class Car
{
    private static int $count = 0;

    public function __construct(
        public readonly string $model,
        public string $color,
        protected int $speed
    ) {
        self::$count++;
    }

    public function displayInfo(): void
    {
        $speed = $this->getSpeed();
        echo "The {$this->model} in the color {$this->color} has a speed of {$speed}\n";
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public static function getCount(): void
    {
        echo static::$count . " instances were created.\n\n";
    }
}

class ElectricCar extends Car
{

    public function __construct(
        string $model,
        string $color,
        int $speed,
        private float $batteryCapacity
    ) {
        parent::__construct($model, $color, $speed);
    }

    public function displayBatteryInfo(): void
    {
        echo "Your {$this->model} has {$this->batteryCapacity}% battery capacity.\n";
    }

    public function chargeBattery(): void
    {
        $this->batteryCapacity = 100.0;
    }
}

/* Class Car */
$carOne = new Car("mazda", "gray", 70);

$carOne->displayInfo();
$carOne->color = "yellow";
$carOne->displayInfo();

echo $carOne->model . "\n";
// echo $carOne->speed does not work because $speed is private; use a getter instead.
echo $carOne->getSpeed() . "\n";

$carTwo = new Car("mazda", "gray", 70);
Car::getCount();


/* Class ElectricCar */
$electricCar = new ElectricCar("Tesla", "black", 85, 75.89);
$electricCar->displayInfo();
$electricCar->displayBatteryInfo();
$electricCar->chargeBattery();
$electricCar->displayBatteryInfo();

ElectricCar::getCount(); // same as Car::getCount()