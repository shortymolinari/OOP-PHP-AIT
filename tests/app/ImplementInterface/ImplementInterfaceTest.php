<?php

namespace Tests\App\ImplementInterface;

use PHPUnit\Framework\TestCase;
use App\ImplementInterface\iTemplate;
use App\ImplementInterface\Template;


class ImplementInterfaceTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->implements = new Template;
        $this->declaredInterfaceArray = get_declared_interfaces();
        $this->implementInterfacesArray = class_implements($this->implements); 
    }



    /**
     * @group interface
     * @test
     */
    public function the_iTemplate_interface_exist()
    {
       $this->assertTrue(interface_exists('App\ImplementInterface\iTemplate'));
    }

    /**
     * @group interface
     * @test
     */
    public function the_iTemplate_interface_was_declared()
    {
       $this->assertContains('App\ImplementInterface\iTemplate', $this->declaredInterfaceArray);
    }

    /**
     * @group interface
     * @test
     */
    public function is_template_implements_iTemplate_interface()
    {
       $this->assertContains('App\ImplementInterface\iTemplate', $this->implementInterfacesArray);
    }

    /**
     * @group interface
     * @test
     */
    public function the_interface_method_setVariable_is_implemented()
    {
        $this->assertTrue(method_exists($this->implements, 'setVariable'));
    }

    /**
     * @group interface
     * @test
     */
    public function the_interface_method_getHtml_is_implemented()
    {
        $this->assertTrue(method_exists($this->implements, 'getHtml'));
    }

    /**
     * @group interface
     * @test
     */
    public function child_class_may_define_optional_arguments_not_in_the_parents_signature()
    {
        $this->assertSame('<div> Template </div>', $this->implements->getHtml("<div> Template </div>", "optioal parameter"));
    }

    /**
     * @group interface
     * @test
     */
    public function the_constant_was_inherited()
    {
        $this->assertSame('Interface constant', $this->implements::b);
    }
}