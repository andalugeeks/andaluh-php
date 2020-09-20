<?php

namespace Tests;

use Andaluh\Rules\ExceptionsRules;
use PHPUnit\Framework\TestCase;

class ExceptionsRulesTest extends TestCase
{
    /** @test */
    public function it_converts_todo_to_tó()
    {
        $this->assertEquals('tó', ExceptionsRules::apply('todo'));
        $this->assertEquals('TÓ', ExceptionsRules::apply('TODO'));
    }

    /** @test */
    public function it_converts_para_to_pa()
    {
        $this->assertEquals('pa', ExceptionsRules::apply('para'));
        $this->assertEquals('PA', ExceptionsRules::apply('PARA'));
    }
}
