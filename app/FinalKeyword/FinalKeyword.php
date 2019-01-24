<?php

namespace App\FinalKeyword;

class FinalKeyword 
{
    public function test() 
    {
        echo "BaseClass::test() called\n";
    }
   
    final public function moreTesting() 
    {
        return "BaseClass::moreTesting() called\n";
    }
}