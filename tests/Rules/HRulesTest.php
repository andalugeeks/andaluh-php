<?php

namespace Tests;

use Andaluh\Rules\HRules;
use PHPUnit\Framework\TestCase;

class HRulesTest extends TestCase
{
    /** @test */
    public function it_converts_chihuahua_to_chiguagua()
    {
        $hRules = new HRules();
        $this->assertEquals('chiguagua', $hRules->apply('chihuahua'));
        $this->assertEquals('Chiguagua', $hRules->apply('Chihuahua'));
    }

    /** @test */
    public function it_converts_cacahuete_to_cacagüete()
    {
        $hRules = new HRules();
        $this->assertEquals('cacagüete', $hRules->apply('cacahuete'));
        $this->assertEquals('Cacagüete', $hRules->apply('Cacahuete'));
    }

    /** @test */
    public function it_converts_huelga_to_güelga()
    {
        $hRules = new HRules();
        $this->assertEquals('güelga', $hRules->apply('huelga'));
        $this->assertEquals('Güelga', $hRules->apply('Huelga'));
    }

    /** @test */
    public function it_converts_hueco_to_güeco()
    {
        $hRules = new HRules();
        $this->assertEquals('güeco', $hRules->apply('hueco'));
        $this->assertEquals('Güeco', $hRules->apply('Hueco'));
    }

    /** @test */
    public function it_runs_general_h_replacements()
    {
        $hRules = new HRules();
        $this->assertEquals('ola', $hRules->apply('hola'));
        $this->assertEquals('Acendado', $hRules->apply('Hacendado'));
        $this->assertEquals('Acha', $hRules->apply('Hacha'));
        $this->assertEquals('Ache', $hRules->apply('Hache'));
    }
}
