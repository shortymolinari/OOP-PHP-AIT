<?php

namespace Tests\App\Anonymousclass;

use PHPUnit\Framework\TestCase;
use App\Anonymouseclass\AnonymouseClass;

class AnonymouseClassTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->anonymouseOuter = new AnonymouseClass;

        $this->anonymouse = new class { };
        $this->anonymouse2 = new class { };
    }

    /**
     * @group anonymouse
     * @test
     */
    public function two_instances_are_not_of_the_same_anonymous_class()
    {
        $this->assertFalse((get_class($this->anonymouse) === get_class($this->anonymouse2)));
    }

    /**
     * @group anonymouse
     * @test
     */
    public function two_instances_are_of_the_same_anonymous_class_when_the_declaration_is_the_same()
    {
        function setTheAnonymouseClass(){
            return new class { };
        }

        $this->setTheAnonymouseClass = setTheAnonymouseClass();
        $this->assertTrue(get_class($this->setTheAnonymouseClass) === get_class($this->setTheAnonymouseClass));
    }

    /**
     * @group anonymouse
     * @test
     */
    public function the_anonymous_class_can_access_properties_from_the_external_class_by_extending_it()
    {
        $this->assertEquals(6, $this->anonymouseOuter->func2()->func3());
    }
}