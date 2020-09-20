<?php

namespace Andaluh\Rules;

class LRules extends BaseRule
{
    public static function apply(string $text): string
    {
        return preg_replace_callback(
            '/(l)(b|c|ç|Ç|g|s|d|f|g|h|k|m|p|q|r|t|x|z)/iu',
            function ($match) {
                return self::isLowerCase($match[1])
                    ? "r{$match[2]}"
                    : "R{$match[2]}";
            },
            $text
        );
    }
}
