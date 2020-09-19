<?php

namespace Andaluh\Rules;


abstract class BaseRule
{
    public function keepCase(string $word, string $replacementWord): string
    {
        if (mb_convert_case($word, MB_CASE_LOWER, "UTF-8") === $word) {
            return mb_convert_case($replacementWord, MB_CASE_LOWER, "UTF-8");
        }
        if (mb_convert_case($word, MB_CASE_UPPER, "UTF-8") === $word) {
            return mb_convert_case($replacementWord, MB_CASE_UPPER, "UTF-8");
        }
        if (mb_convert_case($word, MB_CASE_TITLE, "UTF-8") === $word) {
            return mb_convert_case($replacementWord, MB_CASE_TITLE, "UTF-8");
        }

        return $replacementWord;
    }
}
