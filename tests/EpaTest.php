<?php

namespace Tests;

use Andaluh\AndaluhEpa;
use PHPUnit\Framework\TestCase;

class EpaTest extends TestCase
{
    /** @test */
    public function it_can_get_vowel_circumflex_from_circumflex()
    {
        $vowels = "âêîôûÂÊÎÔÛ";
        $andaluh = new AndaluhEpa();

        $circumflexed_vowels = array_reduce(
            str_split($vowels),
            function (string $res, string $vowel) use ($andaluh) {
                return  $res . $andaluh->getVowelCircumflexs($vowel);
            },
            ""
        );

        $this->assertEquals($vowels, $circumflexed_vowels);
    }

    /** @test */
    public function it_can_get_vowel_circumflex_from_no_tilde_vowel()
    {
        $vowels = str_split("aeiouAEIOU");
        $andaluh = new AndaluhEpa();

        $circumflexed_vowels = array_reduce(
            $vowels,
            function (string $res, string $vowel) use ($andaluh) {
                return  $res . $andaluh->getVowelCircumflexs($vowel);
            },
            ""
        );

        $this->assertEquals("âêîôûÂÊÎÔÛ", $circumflexed_vowels);
    }

    /** @test */
    public function it_can_get_vowel_circumflex_from_tilde_vowel()
    {
        $vowels = "áéíóúÁÉÍÓÚ";
        $andaluh = new AndaluhEpa();

        $circumflexed_vowels = array_reduce(
            str_split($vowels),
            function (string $res, string $vowel) use ($andaluh) {
                return  $res . $andaluh->getVowelCircumflexs($vowel);
            },
            ""
        );

        $this->assertEquals($vowels, $circumflexed_vowels);
    }
}
