<?php

    class Farm {

        static $id = 1;
        public $numberAnimal = 0;
        
        public function getProduct() {}

        public function getNameClass() {
            
            return get_class($this); 
            
        }

    }

    class Chicken extends Farm {

        public function __construct() {

            $this -> numberAnimal = parent::$id++;
        }

        public function getProduct() {

            return rand(0,1);
        }
    }

    class Cow extends Farm {

        public function __construct() {

            $this -> numberAnimal = parent::$id++;
        }

        public function getProduct() {

            return rand(8,12);
        }
    }

    class CreateAnimal {

        public function createChicken(): Chicken {

            return new Chicken;
        }

        public function createCow(): Cow {

            return new Cow;
        }
    }

    $animal = new CreateAnimal();

    $barn = array();

    for ($i=0; $i<10; $i++) { 
        $barn[] = $animal->createCow(); 
    }

    for ($i=0; $i<20; $i++) { 
        $barn[] = $animal->createChicken();
    }

$milk = 0;
$egg = 0;

foreach ($barn as $value) {
    
    switch ($value -> getNameClass() ) {
        case 'Chicken':
            $egg += $value -> getProduct();
            
        case 'Cow':
            $milk += $value -> getProduct();   
    }

}

echo "Egg = $egg<br/>";
echo "Milk = $milk";
