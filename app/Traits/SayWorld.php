<?php

namespace App\Traits;

trait SayWorld 
{
    public function noOverwrites() 
    {
        //parent::sayHello();
        return 'NOOOO!';
    }
    
    public function sayHello() 
    {
        //parent::sayHello();
        return 'Only World!';
    }

    public function sayHelloLegacy() 
    {
        //parent::sayHello();
        return 'Legacy World!';
    }

    
}
