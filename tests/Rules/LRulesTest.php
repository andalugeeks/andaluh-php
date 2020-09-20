<?php

namespace Tests;

use Andaluh\Rules\LRules;
use PHPUnit\Framework\TestCase;

class LRulesTest extends TestCase
{
    /** @test */
    public function it_converts_culto_to_culto()
    {
        $lRules = new LRules();
        $this->assertEquals('curto', $lRules->apply('culto'));
        $this->assertEquals('CURTO', $lRules->apply('CULTO'));
    }

    /** @test */
    public function it_converts_altercado_to_artercado()
    {
        $lRules = new LRules();
        $this->assertEquals('artercado', $lRules->apply('altercado'));
        $this->assertEquals('ARTERCADO', $lRules->apply('ALTERCADO'));
    }
}
