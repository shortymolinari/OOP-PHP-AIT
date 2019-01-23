<?php

namespace App\ImplementInterface;

interface iTemplate
{
    //public $canHasVariables; 
    //una interface no puede declarar propiedades

    const b = 'Interface constant';

    public function setVariable($name, $var);
    public function getHtml($template);
}
