<?php

namespace Andaluh\Rules\PAO;

class ExceptionsRules extends BaseRule
{
    const EXCEPTIONS = [
        'todo' => 'to',
        'todoh' => 'toh',
        'toda' => 'toa',
        'todah' => 'toah',
        'es' => 'eh',
        'ex' => 'eh',
        'ir' => 'î',
        'muy' => 'mu',
        'os' => 'oh',
        'para' => 'pa',
    ];

    public static function apply(string $text): string
    {
        return preg_replace_callback(
            '/\b(' .  implode('|', array_keys(self::EXCEPTIONS)) . ')\b/iu',
            function ($match) {
                $word = $match[1];
                return self::keepCase($word, self::EXCEPTIONS[self::toLowerCase($word)]);
            },
            $text
        );
    }
}
