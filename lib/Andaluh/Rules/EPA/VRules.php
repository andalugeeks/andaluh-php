<?php

namespace Andaluh\Rules\EPA;

class VRules extends BaseRule
{
    const EXCEPTIONS = [
        'vis' => 'bî',
        'ves' => 'bêh'
    ];

    public static function apply(string $text): string
    {
        return preg_replace_callback(
            '/\b(\w*?)(v)(\w*?)\b/iu',
            function ($match) {
                $word = $match[0];
                $wordLower = self::toLowerCase($word);

                if (array_key_exists($wordLower, self::EXCEPTIONS)) {
                    return self::keepCase(
                        $wordLower,
                        self::EXCEPTIONS[$wordLower]
                    );
                }

                return preg_replace_callback_array(
                    [
                        // NV -> NB -> MB (i.e.: envidia -> embidia)
                        '/nv/iu' => function ($match) {
                            return self::keepCase($match[0], 'mb');
                        },
                        '/v/' => function ($match) {
                            return 'b';
                        },
                        '/V/' => function ($match) {
                            return 'B';
                        },
                    ],
                    $word
                );
            },
            $text
        );
    }
}
