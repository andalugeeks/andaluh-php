<?php

namespace Tests;

use Andaluh\Rules\ExceptionsRules;
use PHPUnit\Framework\TestCase;

class ExceptionsRulesTest extends TestCase
{
    /** @test */
    public function it_pass_basic_test()
    {
        $this->assertEquals('Tó', ExceptionsRules::apply('Todo'));
    }
}
