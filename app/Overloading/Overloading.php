<?php

namespace App\Overloading;

class Overloading
{
    /**  Location for overloaded data.  */
    private $data = array();

    /**  Overloading not used on declared properties.  */
    public $declared = 1;

    /**  Overloading only used on this when accessed outside the class.  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        //echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        //echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    /**  As of PHP 5.1.0  */
    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    /**  As of PHP 5.1.0  */
    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }

    /**  Not a magic method, just here for example.  */
    public function getHidden()
    {
        return $this->hidden;
    }
}

/*$obj = new Overloading();
$obj->__set('name', 'Edwin Rincón');
$obj->__set('occupation', 'Developer');
$obj->__set('skills', ['php', 'javascript', 'html']);
$obj->salary = 550;

echo $obj->name;
echo "\n";
echo $obj->occupation;
echo "\n";

echo $obj->__get('name');
echo "\n";
echo $obj->__get('occupation');

echo "\n";
echo $obj->salary;
echo "\n";
echo $obj->skills[0];*/



