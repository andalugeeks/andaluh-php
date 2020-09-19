<?php

namespace Tests;

use Andaluh\AndaluhEpa;
use PHPUnit\Framework\TestCase;

class GetVowelTildeTest extends TestCase
{
    /** @test */
    public function it_can_get_vowel_tilde_from_tilde_vowel()
    {
        $vowels = "áéíóúÁÉÍÓÚ";
        $andaluh = new AndaluhEpa();

        $tilde_vowels = array_reduce(
            str_split($vowels),
            function (string $res, string $vowel) use ($andaluh) {
                return  $res . $andaluh->getVowelTilde($vowel);
            },
            ""
        );

        $this->assertEquals($vowels, $tilde_vowels);
    }

    /** @test */
    public function it_can_get_vowel_tilde_from_no_tilde_vowel()
    {
        $vowels = str_split("aeiouAEIOU");
        $andaluh = new AndaluhEpa();

        $tilde_vowels = array_reduce(
            $vowels,
            function (string $res, string $vowel) use ($andaluh) {
                return  $res . $andaluh->getVowelTilde($vowel);
            },
            ""
        );

        $this->assertEquals("áéíóúÁÉÍÓÚ", $tilde_vowels);
    }

    /** @test */
    public function it_can_get_vowel_tilde_from_circumflex_vowel()
    {
        $vowels = "âêîôûÂÊÎÔÛ";
        $andaluh = new AndaluhEpa();

        $tilde_vowels = array_reduce(
            str_split($vowels),
            function (string $res, string $vowel) use ($andaluh) {
                return  $res . $andaluh->getVowelTilde($vowel);
            },
            ""
        );

        $this->assertEquals($vowels, $tilde_vowels);
    }
}
