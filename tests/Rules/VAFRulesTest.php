<?php

namespace Tests;

use Andaluh\Rules\VAFRules;
use PHPUnit\Framework\TestCase;

class VAFRulesTest extends TestCase
{
    /** @test */
    public function it_converts_servilleta_to_servilleta()
    {
        $rules = new VAFRules();
        $this->assertEquals('çervilleta', $rules->apply('servilleta'));
        $this->assertEquals('ÇERVILLETA', $rules->apply('SERVILLETA'));
    }

    /** @test */
    public function it_converts_zarzamora_to_zarzamora()
    {
        $rules = new VAFRules();
        $this->assertEquals('çarçamora', $rules->apply('zarzamora'));
        $this->assertEquals('ÇARÇAMORA', $rules->apply('ZARZAMORA'));
    }

    /** @test */
    public function it_converts_gasoducto_to_gasoducto()
    {
        $rules = new VAFRules();
        $this->assertEquals('gaçoducto', $rules->apply('gasoducto'));
        $this->assertEquals('GAÇODUCTO', $rules->apply('GASODUCTO'));
    }

    /** @test */
    public function it_converts_cecina_to_çeçina()
    {
        $rules = new VAFRules();
        $this->assertEquals('çeçina', $rules->apply('cecina'));
        $this->assertEquals('ÇEÇINA', $rules->apply('CECINA'));
    }
}
