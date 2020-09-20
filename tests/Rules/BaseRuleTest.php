<?php

namespace Tests;

use Andaluh\Rules\BaseRule;
use PHPUnit\Framework\TestCase;

class BaseRuleTest extends TestCase
{

    /** @test */
    public function it_keep_lower_case()
    {
        $rule = $this->getMockForAbstractClass(BaseRule::class);
        $this->assertEquals(
            "replace converted to lower",
            $rule::keepCase("this is lower case", "REPLACE CONVERTED TO LOWER")
        );
    }

    /** @test */
    public function it_keep_upper_case()
    {
        $rule = $this->getMockForAbstractClass(BaseRule::class);
        $this->assertEquals(
            "REPLACE CONVERTED TO UPPER",
            $rule::keepCase("THIS IS UPPER CASE", "replace converted to upper")
        );
    }

    /** @test */
    public function it_keep_title_case()
    {
        $rule = $this->getMockForAbstractClass(BaseRule::class);
        $this->assertEquals(
            "Replace Converted To Title",
            $rule::keepCase("This Is Title Case", "replace converted to title")
        );
    }
}
