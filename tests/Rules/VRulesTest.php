<?php

namespace Tests;

use Andaluh\Rules\VRules;
use PHPUnit\Framework\TestCase;

class VRulesTest extends TestCase
{
    /** @test */
    public function it_converts_envidia_to_embidia()
    {
        $vRules = new VRules();
        $this->assertEquals('embidia', $vRules->apply('envidia'));
        $this->assertEquals('EMBIDIA', $vRules->apply('ENVIDIA'));
    }

    /** @test */
    public function it_converts_verguenza_to_berguenza()
    {
        $vRules = new VRules();
        $this->assertEquals('berguenza', $vRules->apply('verguenza'));
        $this->assertEquals('BERGUENZA', $vRules->apply('VERGUENZA'));
    }

    /** @test */
    public function it_converts_benévolo_to_benébolo()
    {
        $vRules = new VRules();
        $this->assertEquals('benébolo', $vRules->apply('benévolo'));
        $this->assertEquals('BENÉBOLO', $vRules->apply('BENÉVOLO'));
    }
}
