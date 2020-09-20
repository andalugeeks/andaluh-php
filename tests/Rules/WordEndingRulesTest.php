<?php

namespace Tests;

use Andaluh\Rules\WordEndingRules;
use PHPUnit\Framework\TestCase;

class WordEndingRulesTest extends TestCase
{
    /** @test */
    public function it_pass_ending_exceptions()
    {
        $this->assertEquals(
            'fado despido cado bûççido',
            WordEndingRules::apply('fado despido cado bûççido')
        );

        $this->assertEquals(
            'áê sonaO sonâh sáê saeps enFadá enfadáô espío despdo',
            WordEndingRules::apply('áeps sonadO sonaDas sáeps saeps enFadADa enfadaDos espío despdo')
        );

        $this->assertEquals(
            'el éxtasî',
            WordEndingRules::apply('el éxtasis')
        );
    }
}
