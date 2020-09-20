<?php

namespace Tests;

use Andaluh\Rules\LlRules;
use PHPUnit\Framework\TestCase;

class LlRulesTest extends TestCase
{
    /** @test */
    public function it_converts_llamada_to_yamada()
    {
        $llRules = new LlRules();
        $this->assertEquals('yamada', $llRules->apply('llamada'));
        $this->assertEquals('YAMADA', $llRules->apply('LLAMADA'));
    }

    /** @test */
    public function it_converts_lloviendo_to_yoviendo()
    {
        $llRules = new LlRules();
        $this->assertEquals('yoviendo', $llRules->apply('lloviendo'));
        $this->assertEquals('YOVIENDO', $llRules->apply('LLOVIENDO'));
    }
}
