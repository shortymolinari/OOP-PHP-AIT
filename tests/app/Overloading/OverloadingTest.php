<?php

namespace Tests\App\Overloading;

use PHPUnit\Framework\TestCase;
use App\Overloading\Overloading;


class OverloadingTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->overloading = new Overloading();
    }

    /**
     * @group overloading
     * @test
     */
    public function a_property_can_be_created_without_using_the_set_method()
    {
        $this->overloading->name = 'Edwin Rincón';
        $this->assertSame('Edwin Rincón', $this->overloading->__get('name'));
    }

    /**
     * @group overloading
     * @test
     */
    public function a_property_can_be_created_using_the_set_method()
    {
        $this->overloading->__set('name', 'Edwin Rincón');
        $this->assertSame('Edwin Rincón', $this->overloading->__get('name'));
    }

    /**
     * @group overloading
     * @test
     */
    public function the_property_can_be_an_array()
    {
        $this->overloading->__set('skills', ['PHP', 'javascript', 'HTML', 'CSS']);
        $this->assertContains('HTML', $this->overloading->__get('skills'));
    }
}