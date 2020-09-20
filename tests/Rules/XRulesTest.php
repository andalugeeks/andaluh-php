<?php

namespace Tests;

use Andaluh\Rules\XRules;
use PHPUnit\Framework\TestCase;

class XRulesTest extends TestCase
{
    /** @test */
    public function it_converts_xilófono_to_çilofono()
    {
        $xRules = new XRules(); //
        $this->assertEquals('çilófono', $xRules->apply('xilófono'));
        $this->assertEquals('Çilófono', $xRules->apply('Xilófono'));
        $this->assertEquals('un çilófono Chungo', $xRules->apply('un xilófono Chungo'));
    }

    /** @test */
    public function it_converts_axila_to_âççila()
    {
        $xRules = new XRules();
        $this->assertEquals('âççila', $xRules->apply('axila'));
        $this->assertEquals('Âççila', $xRules->apply('Axila'));
    }

    /** @test */
    public function it_converts_éxito_to_éççito()
    {
        $xRules = new XRules();
        $this->assertEquals('éççito', $xRules->apply('éxito'));
        $this->assertEquals('Éççito', $xRules->apply('Éxito'));
    }

    /** @test */
    public function it_converts_sexy_to_sêççy()
    {
        $xRules = new XRules();
        $this->assertEquals('sêççy', $xRules->apply('sexy'));
        $this->assertEquals('Sêççy', $xRules->apply('Sexy'));
    }
}
