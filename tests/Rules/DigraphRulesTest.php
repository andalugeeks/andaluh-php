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

    /** @test */
    public function it_converts_aerotransporte_to_aerotrapporte()
    {
        $rules = new DigraphRules();
        $this->assertEquals('aerotrapporte', $rules->apply('aerotransporte'));
        $this->assertEquals('AEROTRAPPORTE', $rules->apply('AEROTRANSPORTE'));
    }

    /** @test */
    public function it_converts_translado_to_trâllado()
    {
        $rules = new DigraphRules();
        $this->assertEquals('trâl-lado', $rules->apply('translado'));
        $this->assertEquals('trâl-lado', $rules->apply('TRANSLADO'));
    }

    /** @test */
    public function it_converts_transcendente_to_trâççendente()
    {
        $rules = new DigraphRules();
        $this->assertEquals('trâççendente', $rules->apply('transcendente'));
        $this->assertEquals('TRÂÇÇENDENTE', $rules->apply('TRANSCENDENTE'));
    }

    /** @test */
    public function it_converts_postpalatal_to_pôppalatal()
    {
        $rules = new DigraphRules();
        $this->assertEquals('pôppalatal', $rules->apply('postpalatal'));
        $this->assertEquals('PÔPPALATAL', $rules->apply('POSTPALATAL'));
    }
}
