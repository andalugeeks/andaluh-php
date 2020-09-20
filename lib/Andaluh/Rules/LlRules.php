<?php

namespace Andaluh\Rules;

class LlRules extends BaseRule
{
    const EXCEPTIONS = [
        'grill' => 'grîh'
    ];

    public static function apply(string $text): string
    {
        return preg_replace_callback(
            '/\b(\w*?)(l)(l)(\w*?)\b/iu',
            function ($match) {
                $word = $match[0];
                $wordLower = self::toLowerCase($word);

                if (array_key_exists($wordLower, self::EXCEPTIONS)) {
                    return self::keepCase(
                        $wordLower,
                        self::EXCEPTIONS[$wordLower]
                    );
                }
                return preg_replace_callback(
                    '/(l)(l)/iu',
                    function ($match) {
                        return self::isLowerCase($match[1])
                            ? 'y'
                            : 'Y';
                    },
                    $word
                );
            },
            $text
        );
    }
}
