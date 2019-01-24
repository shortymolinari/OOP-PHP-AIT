<?php

namespace Tests\App\FinalKeyword;

use PHPUnit\Framework\TestCase;
use App\FinalKeyword\FinalKeyword;
use App\FinalKeyword\ExtendsFinal;


class FinalKeywordTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->final = new ExtendsFinal;
    }

    /**
     * @group final
     * @test
     */
    public function a_class_can_inherit_a_final_method_from_the_parent()
    {
        $this->assertSame("BaseClass::moreTesting() called\n",  $this->final->moreTesting());
    }
}