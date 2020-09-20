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

    static function toLowerCase(string $word): string
    {
        return mb_convert_case($word, MB_CASE_LOWER, "UTF-8");
    }

    static function isLowerCase(string $word): bool
    {
        return self::toLowerCase($word) === $word;
    }

    static function toUpperCase(string $word): string
    {
        return mb_convert_case($word, MB_CASE_UPPER, "UTF-8");
    }

    static function isUpperCase(string $word): bool
    {
        return self::toUpperCase($word) === $word;
    }

    static function toTitleCase(string $word): string
    {
        return mb_convert_case($word, MB_CASE_TITLE, "UTF-8");
    }

    static function isTitleCase(string $word): bool
    {
        return self::toTitleCase($word) === $word;
    }
}
