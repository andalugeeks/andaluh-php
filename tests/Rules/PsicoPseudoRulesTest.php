<?php

namespace Tests;

use Andaluh\Rules\PsicoPseudoRules;
use PHPUnit\Framework\TestCase;

class PsicoPseudoRulesTest extends TestCase
{
    /** @test */
    public function it_converts_pseudo_to_seudo()
    {
        $rules = new PsicoPseudoRules();
        $this->assertEquals('seudo', $rules->apply('pseudo'));
        $this->assertEquals('SEUDO', $rules->apply('PSEUDO'));
    }

    /** @test */
    public function it_converts_psico_to_sico()
    {
        $rules = new PsicoPseudoRules();
        $this->assertEquals('sico', $rules->apply('psico'));
        $this->assertEquals('SICO', $rules->apply('PSICO'));
    }
}
