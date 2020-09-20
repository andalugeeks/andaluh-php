<?php

namespace Tests;

use Andaluh\Rules\BaseRule;
use PHPUnit\Framework\TestCase;

class BaseRuleTest extends TestCase
{

    /** @test */
    public function it_keep_lower_case()
    {
        $this->assertEquals(
            "replace converted to lower",
            BaseRule::keepCase("this is lower case", "REPLACE CONVERTED TO LOWER")
        );
    }

    /** @test */
    public function it_keep_upper_case()
    {
        $this->assertEquals(
            "REPLACE CONVERTED TO UPPER",
            BaseRule::keepCase("THIS IS UPPER CASE", "replace converted to upper")
        );
    }

    /** @test */
    public function it_keep_title_case()
    {
        $this->assertEquals(
            "Replace Converted To Title",
            BaseRule::keepCase("This Is Title Case", "replace converted to title")
        );
    }
}
