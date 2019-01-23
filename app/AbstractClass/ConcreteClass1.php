<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 22/01/2019
 * Time: 9:41 PM
 */

namespace App\AbstractClass;

require 'vendor/autoload.php';

use App\AbstractClass\AbstractClass;

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {
        return "{$prefix}ConcreteClass1";
    }
}

/* no implementar los metodos abstratos del pade causa un Fatal error:
 * Fatal error:
 * Class App\AbstractClass\ConcreteClass1 contains 2
 * abstract methods and must therefore be declared abstract
 * or implement the remaining methods
 * (App\AbstractClass\AbstractClass::getValue, App\AbstractClass\AbstractClass::prefixValue)
 *
 * */

/*$class1 = new ConcreteClass1;
$class1->printOut();
echo $class1->prefixValue('FOO_') ."\n";
*/