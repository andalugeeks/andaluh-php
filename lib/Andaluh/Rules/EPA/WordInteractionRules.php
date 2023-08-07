<?php

namespace Andaluh\Rules\EPA;

class WordInteractionRules extends BaseRule
{
    public static function apply(string $text): string
    {
        // Rotating word ending /l/ with /r/ if first next word char is non-r
        // consonant
        return preg_replace_callback(
            '/\b(\w*?)(l)(\s)(b|c|ç|d|f|g|h|j|k|l|m|n|ñ|p|q|s|t|v|w|x|y|z)/iu',
            function ($match) {
                [
                    //$word,
                    ,
                    $prefix,
                    $lChar,
                    $whitespaceChar,
                    $nextWordChar
                ] = $match;

                $rChar = self::keepCase($lChar, 'r');
                return "{$prefix}{$rChar}{$whitespaceChar}{$nextWordChar}";
            },
            $text
        );
    }
}
