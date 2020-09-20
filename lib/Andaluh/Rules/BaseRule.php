<?php

namespace Andaluh\Rules;


abstract class BaseRule
{
    static function keepCase(string $word, string $replacementWord): string
    {
        if (self::isLowerCase($word)) {
            return mb_convert_case($replacementWord, MB_CASE_LOWER, "UTF-8");
        }
        if (self::isUpperCase($word)) {
            return mb_convert_case($replacementWord, MB_CASE_UPPER, "UTF-8");
        }
        if (self::isTitleCase($word)) {
            return mb_convert_case($replacementWord, MB_CASE_TITLE, "UTF-8");
        }

        return $replacementWord;
    }

    static function isLowerCase(string $word): bool
    {
        return mb_convert_case($word, MB_CASE_LOWER, "UTF-8") === $word;
    }

    static function isUpperCase(string $word): bool
    {
        return mb_convert_case($word, MB_CASE_UPPER, "UTF-8") === $word;
    }

    static function isTitleCase(string $word): bool
    {
        return mb_convert_case($word, MB_CASE_TITLE, "UTF-8") === $word;
    }
}
