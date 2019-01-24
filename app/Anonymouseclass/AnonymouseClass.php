<?php

namespace App\Anonymouseclass;

class AnonymouseClass
{
    private $prop = 1;
    protected $prop2 = 2;

    protected function func1()
    {
        return 3;
    }

    public function func2()
    {
        // No se pueden usar propiedades de la clae externa sin enviarlar por el constructor de a clase anonima
        return new class($this->prop) extends AnonymouseClass 
        {
            private $prop3;
            
            public function __construct($prop)
            {
                $this->prop3 = $prop;
            }

            public function func3()
            {
                return $this->prop2 + $this->prop3 + $this->func1();
            }
        };
    }
}


//$obj = new AnonymouseClass;
//echo $obj->func2()->func3();

/*function clase_anonima() {
    return new class {};
}

$anonymouse = clase_anonima();//new class { };
var_dump($anonymouse);

$anonymouse2 = clase_anonima();//new class { };
var_dump($anonymouse2);

echo (get_class($anonymouse) === get_class($anonymouse2)) ? 'si' : 'no';
*/