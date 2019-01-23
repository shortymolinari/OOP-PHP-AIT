<?php

namespace App\AbstractClass;

abstract class AbstractClass
{
    // Forzar la extensión de clase para definir este método
    abstract protected function getValue();
    abstract protected function prefixValue($prefix);

    // Método común
    public function printOut() {
        print $this->getValue() . "\n";
    }
}

/*
 * Esto provoca un error fatal de php se aborta
 * la ejecución y el programa deja de funcionar por completo.
*/
#$object = new AbstractClass();
