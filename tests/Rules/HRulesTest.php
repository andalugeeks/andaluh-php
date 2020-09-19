<?php

namespace Tests;

use Andaluh\Rules\HRules;
use PHPUnit\Framework\TestCase;

class HRulesTest extends TestCase
{
    /** @test */
    public function it_converts_chihuahua_with_chiguagua()
    {
        $hRules = new HRules();
        $this->assertEquals('chiguagua', $hRules->apply('chihuahua'));
    }
}
