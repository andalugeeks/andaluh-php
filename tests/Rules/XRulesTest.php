<?php

namespace Tests;

use Andaluh\Rules\XRules;
use PHPUnit\Framework\TestCase;

class XRulesTest extends TestCase
{
    /** @test */
    public function it_converts_xilófono_to_çilofono()
    {
        $xRules = new XRules();
        $this->assertEquals('çilofono', $xRules->apply('xilófono'));
        $this->assertEquals('Çilófono', $xRules->apply('Xilófono'));
    }

    /** @test */
    public function it_converts_axila_to_aççila()
    {
        $xRules = new XRules();
        $this->assertEquals('aççila', $xRules->apply('axila'));
        $this->assertEquals('Aççila', $xRules->apply('Axila'));
    }

    /** @test */
    public function it_converts_éxito_to_éççito()
    {
        $xRules = new XRules();
        $this->assertEquals('éççito', $xRules->apply('éxito'));
        $this->assertEquals('Éççito', $xRules->apply('Éxito'));
    }

    /** @test */
    public function it_converts_sexy_to_çeççy()
    {
        $xRules = new XRules();
        $this->assertEquals('çeççy', $xRules->apply('sexy'));
        $this->assertEquals('Çeççy', $xRules->apply('sexy'));
    }
}
