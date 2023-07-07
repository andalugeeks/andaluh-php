<?php

namespace Andaluh\Rules\EPA;

class ChRules extends BaseRule
{

    public static function apply(string $text): string
    {
        # Replacement rules for /∫/ (voiceless postalveolar fricative)
        return preg_replace_callback(
            '/(c)(h)/iu',
            function ($match) {
                return self::isLowerCase($match[1])
                    ? 'x'
                    : 'X';
            },
            $text
        );
    }
}
