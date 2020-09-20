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
    }

    /** @test */
    public function it_converts_cacahuete_to_cacagüete()
    {
        $hRules = new HRules();
        $this->assertEquals('cacagüete', $hRules->apply('cacahuete'));
    }
}
