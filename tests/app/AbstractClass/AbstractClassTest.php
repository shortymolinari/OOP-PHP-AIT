<?php

namespace Tests\App\AbstractClass;

use PHPUnit\Framework\TestCase;
use App\AbstractClass\AbstractClass;
use App\AbstractClass\ConcreteClass1;
use App\AbstractClass\ConcreteClass2;
//@testdox is subclass of abstract class

class AbstractClassTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->extendAbstract = new ConcreteClass1;
        $this->extendAbstract2 = new ConcreteClass2;
        $this->declaredClassesArray = get_declared_classes();
    }


    /**
     * @group abstract
     * @test
     */
    public function is_subclass_of_abstract_class()
    {
       $this->assertTrue(is_subclass_of($this->extendAbstract, AbstractClass::class));
    }

    /**
     * @group abstract
     * @test
     */
    public function is_son_of_abstract_class()
    {
        $this->assertSame(AbstractClass::class, get_parent_class($this->extendAbstract));
    }

    /**
     * @group abstract
     * @test
     */
    public function the_getValue_method_of_the_parent_exists()
    {
        $this->assertTrue(method_exists($this->extendAbstract, 'getValue'));
    }

    /**
     * @group abstract
     * @test
     */
    public function the_prefixValue_method_of_the_parent_exists()
    {
        $this->assertTrue(method_exists($this->extendAbstract, 'prefixValue'));
    }

    /**
     * @group abstract
     * @test
     */
    public function the_printOut_method_of_the_parent_was_inherited()
    {
        $this->assertTrue(method_exists($this->extendAbstract, 'printOut'));
    }

    /**
     * @group abstract
     * @test
     */
    public function the_name_of_the_parent_class_of_this_object_is_not_abstract_class()
    {
        $this->assertNotSame('AbstractClass', get_class($this->extendAbstract));
    }

    /**
     * @group abstract
     * @test
     */
    public function between_the_instantiated_classes_there_is_no_abstract_class()
    {
        $this->assertNotContains('AbstractClass', $this->declaredClassesArray);
    }

    /**
     * @group abstract
     * @test
     */
    public function child_class_may_define_optional_arguments_not_in_the_parents_signature()
    {
        $this->assertSame('Mr: Pacman', $this->extendAbstract2->prefixName("Pacman", ':'));
    }
}