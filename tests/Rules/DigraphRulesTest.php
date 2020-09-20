<?php

namespace Tests;

use Andaluh\Rules\DigraphRules;
use PHPUnit\Framework\TestCase;

class DigraphRulesTest extends TestCase
{
    /** @test */
    public function it_converts_intersticial_to_intertticial()
    {
        $rules = new DigraphRules();
        $this->assertEquals('intertticial', $rules->apply('intersticial'));
        $this->assertEquals('INTERTTICIAL', $rules->apply('INTERSTICIAL'));
    }

    /** @test */
    public function it_converts_solsticiol_to_sortticio()
    {
        $rules = new DigraphRules();
        $this->assertEquals('sortticio', $rules->apply('solsticio'));
        $this->assertEquals('SORTTICIO', $rules->apply('SOLSTICIO'));
    }

    /** @test */
    public function it_converts_superstición_to_superttición()
    {
        $rules = new DigraphRules();
        $this->assertEquals('superttición', $rules->apply('superstición'));
        $this->assertEquals('SUPERTTICIÓN', $rules->apply('SUPERSTICIÓN'));
    }

    /** @test */
    public function it_converts_cárstico_to_cárttico()
    {
        $rules = new DigraphRules();
        $this->assertEquals('cárttico', $rules->apply('cárstico'));
        $this->assertEquals('CÁRTTICO', $rules->apply('CÁRSTICO'));
    }
}
