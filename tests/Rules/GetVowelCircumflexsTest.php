<?php

namespace Tests;

use Andaluh\AndaluhEpa;
use Andaluh\Rules\BaseRule;
use PHPUnit\Framework\TestCase;

class GetVowelCircumflexsTest extends TestCase
{
    /** @test */
    public function it_can_get_vowel_circumflex_from_circumflex()
    {
        $vowels = "âêîôûÂÊÎÔÛ";

        $circumflexed_vowels = array_reduce(
            str_split($vowels),
            function (string $res, string $vowel) {
                return  $res . BaseRule::getVowelCircumflexs($vowel);
            },
            ""
        );

        $this->assertEquals($vowels, $circumflexed_vowels);
    }

    /** @test */
    public function it_can_get_vowel_circumflex_from_no_tilde_vowel()
    {
        $vowels = str_split("aeiouAEIOU");

        $circumflexed_vowels = array_reduce(
            $vowels,
            function (string $res, string $vowel) {
                return  $res . BaseRule::getVowelCircumflexs($vowel);
            },
            ""
        );

        $this->assertEquals("âêîôûÂÊÎÔÛ", $circumflexed_vowels);
    }

    /** @test */
    public function it_can_get_vowel_circumflex_from_tilde_vowel()
    {
        $vowels = "áéíóúÁÉÍÓÚ";

        $circumflexed_vowels = array_reduce(
            str_split($vowels),
            function (string $res, string $vowel) {
                return  $res . BaseRule::getVowelCircumflexs($vowel);
            },
            ""
        );

        $this->assertEquals($vowels, $circumflexed_vowels);
    }
}
