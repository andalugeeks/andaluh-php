<?php

namespace Andaluh\Rules;

class GJRules extends BaseRule
{

    public static function apply(string $text): string
    {
        # Replacement rules for /∫/ (voiceless postalveolar fricative)
        return preg_replace_callback_array(
            [
                // GUE,GUI replacement
                '/(g)u(e|i|é|í)/iu' => function ($match) {
                    return "{$match[1]}{$match[2]}";
                },
                // GÜE,GÜI replacement
                '/(g)(ü)(e|i|é|í)/iu' => function ($match) {
                    $middle_u = self::keepCase($match[2], 'u');
                    return "{$match[1]}{$middle_u}{$match[3]}";
                },
            ],
            $text
        );
    }
}
