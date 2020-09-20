<?php

namespace Tests;

use Andaluh\Rules\GjRules;
use PHPUnit\Framework\TestCase;

class GJRulesTest extends TestCase
{
    /** @test */
    public function it_replaces_gue_gui()
    {
        $gjRules = new GjRules();
        $this->assertEquals('ge', $gjRules->apply('gue'));
        $this->assertEquals('GE', $gjRules->apply('GUE'));

        $this->assertEquals('gé', $gjRules->apply('gué'));
        $this->assertEquals('GÉ', $gjRules->apply('GuÉ'));

        $this->assertEquals('gi', $gjRules->apply('gui'));
        $this->assertEquals('GI', $gjRules->apply('GUI'));

        $this->assertEquals('gí', $gjRules->apply('guí'));
        $this->assertEquals('GÍ', $gjRules->apply('GuÍ'));
    }

    /** @test */
    public function it_replaces_güe_güi()
    {
        $gjRules = new GjRules();
        $this->assertEquals('gue', $gjRules->apply('güe'));
        $this->assertEquals('GUE', $gjRules->apply('GÜE'));

        $this->assertEquals('gué', $gjRules->apply('güé'));
        $this->assertEquals('GuÉ', $gjRules->apply('GüÉ'));

        $this->assertEquals('gui', $gjRules->apply('güi'));
        $this->assertEquals('GUI', $gjRules->apply('GÜI'));

        $this->assertEquals('guí', $gjRules->apply('güí'));
        $this->assertEquals('GuÍ', $gjRules->apply('GüÍ'));
    }

    /** @test */
    public function it_replaces_buen_guen()
    {
        $gjRules = new GjRules();
        $this->assertEquals('guen', $gjRules->apply('buen'));
        $this->assertEquals('GUEN', $gjRules->apply('BUEN'));
    }

    /** @test */
    public function it_replaces_abuel_aguel()
    {
        $gjRules = new GjRules();
        $this->assertEquals('aguel', $gjRules->apply('abuel'));
        $this->assertEquals('AGUEL', $gjRules->apply('ABUEL'));
    }

    /** @test */
    public function it_replaces_sabues_sagues()
    {
        $gjRules = new GjRules();
        $this->assertEquals('sagues', $gjRules->apply('sabues'));
        $this->assertEquals('SAGUES', $gjRules->apply('SABUES'));
    }

    /** @test */
    public function it_replaces_gijarrito_giharrito()
    {
        $gjRules = new GjRules();
        $this->assertEquals('un hiharrito', $gjRules->apply('un gijarrito'));
        $this->assertEquals('UN HIHARRITO', $gjRules->apply('UN GIJARRITO'));
    }
}
