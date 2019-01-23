<?php

namespace Tests\App\Traits;

use PHPUnit\Framework\TestCase;
use App\Traits\Base;
use App\Traits\SayWorld;
use App\Traits\MyHelloWorld;
use App\Traits\AliasedTalker;

class TraitTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->useTrait = new MyHelloWorld;
        $this->conflict = new AliasedTalker;
    }

    /**
     * @group traits
     * @test
     */
    public function the_SayWorld_Trait_exist()
    {
       $this->assertTrue(trait_exists('App\Traits\SayWorld'));
    }


    /**
     * @group traits
     * @test
     */
    public function the_trait_overwrites_the_legacy_method()
    {
        $this->assertSame('Only World!', $this->useTrait->sayHello());
    }


    /**
     * @group traits
     * @test
     */
    public function the_class_overwrites_the_trait_method()
    {
        $this->assertSame('Legacy World!, but from the class', $this->useTrait->sayHelloLegacy());
    }

    /**
     * @group traits
     * @test
     */
    public function the_Trait_no_overwrites_the_class_method()
    {
        $this->assertNotSame('NOOOO!', $this->useTrait->noOverwrites());
    }

    /**
     * @group traits
     * @test
     */
    public function the_traits_with_the_same_method_name_do_not_generate_conflict_using_the_operator_insteadof()
    {
        $this->assertSame('b', $this->conflict->smallTalk());
    }

    /**
     * @group traits
     * @test
     */
    public function the_traits_with_the_same_method_name_do_not_generate_conflict_using_a_alias_with_as()
    {
        $this->assertSame('B', $this->conflict->talk());
    }

    /**
     * @group traits
     * @test
     */
    public function  the_class_inherits_trait_properties()
    {
        $this->assertSame('property', $this->conflict->property);
    }

    
    /**
     * @group traits
     * @test
     */
    public function  the_class_can_change_the_visibility_of_the_trait_method()
    {
        $this->assertSame('into the protected method', $this->conflict->getProtected());
    }
}