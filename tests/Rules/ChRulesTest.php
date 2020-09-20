<?php

namespace Tests;

use Andaluh\Rules\ChRules;
use PHPUnit\Framework\TestCase;

class ChRulesTest extends TestCase
{
    /** @test */
    public function it_converts_chorizo_to_xorizo()
    {
        $chRules = new ChRules(); //
        $this->assertEquals('xorizo', $chRules->apply('chorizo'));
        $this->assertEquals('Xorizo', $chRules->apply('Chorizo'));
    }

    /** @test */
    public function it_converts_chapuzas_to_xapuzas()
    {
        $chRules = new ChRules(); //
        $this->assertEquals('xapuzas', $chRules->apply('chapuzas'));
        $this->assertEquals('Xapuzas', $chRules->apply('Chapuzas'));
    }

    /** @test */
    public function it_converts_acechar_to_acexar()
    {
        $chRules = new ChRules(); //
        $this->assertEquals('acexar', $chRules->apply('acechar'));
        $this->assertEquals('Acexar', $chRules->apply('Acechar'));
    }
}
