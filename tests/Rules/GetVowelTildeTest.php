<?php

namespace Tests;

use Andaluh\Rules\BaseRule;
use PHPUnit\Framework\TestCase;

class GetVowelTildeTest extends TestCase
{
    /** @test */
    public function it_can_get_vowel_tilde_from_tilde_vowel()
    {
        $vowels = "áéíóúÁÉÍÓÚ";

        $tilde_vowels = array_reduce(
            str_split($vowels),
            function (string $res, string $vowel) {
                return  $res . BaseRule::getVowelTilde($vowel);
            },
            ""
        );

        $this->assertEquals($vowels, $tilde_vowels);
    }

    /** @test */
    public function it_can_get_vowel_tilde_from_no_tilde_vowel()
    {
        $vowels = str_split("aeiouAEIOU");

        $tilde_vowels = array_reduce(
            $vowels,
            function (string $res, string $vowel) {
                return  $res . BaseRule::getVowelTilde($vowel);
            },
            ""
        );

        $this->assertEquals("áéíóúÁÉÍÓÚ", $tilde_vowels);
    }

    /** @test */
    public function it_can_get_vowel_tilde_from_circumflex_vowel()
    {
        $vowels = "âêîôûÂÊÎÔÛ";

        $tilde_vowels = array_reduce(
            str_split($vowels),
            function (string $res, string $vowel) {
                return  $res . BaseRule::getVowelTilde($vowel);
            },
            ""
        );

        $this->assertEquals($vowels, $tilde_vowels);
    }
}
