<?php

namespace App\Traits;

require 'vendor/autoload.php';

use App\Traits\Base;
use App\Traits\SayWorld;

class MyHelloWorld extends Base 
{
    public function noOverwrites() 
    {
        //parent::sayHello();
        return 'YEAHH!';
    }

    use SayWorld;

    public function sayHelloLegacy() 
    {
        //parent::sayHello();
        return 'Legacy World!, but from the class';
    }

}

//$o = new MyHelloWorld();
//$o->sayHello();