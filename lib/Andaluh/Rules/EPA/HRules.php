<?php

namespace Andaluh\Rules\EPA;

class HRules extends BaseRule
{
    const EXCEPTIONS = [
        'haz' => 'âh', 'hez' => 'êh', 'hoz' => 'ôh',
        'oh' => 'ôh',
        'yihad' => 'yihá',
        'h' => 'h'  # Keep an isolated h as-is
    ];

    public static function apply(string $text): string
    {
        return preg_replace_callback_array(
            [
                # chihuahua => chiguagua
                '/(?<!c)(h)(ua)/iu' => function ($match) {
                    return self::isLowerCase($match[1])
                        ? "g{$match[2]}"
                        : "G{$match[2]}";
                },
                # cacahuete => cacagüete ,at the end will be cacagûete
                '/(?<!c)(h)(u)(e)/iu' => function ($match) {
                    $transformed = self::keepCase($match[2], 'ü') . $match[3];
                    return self::isLowerCase($match[1])
                        ? "g{$transformed}"
                        : "G{$transformed}";
                },
                # General /h/ replacements
                '/\b(\w*?)(h)(\w*?)\b/iu' => function ($match) {
                    $word = $match[0];
                    $wordLower = self::toLowerCase($word);
                    if (array_key_exists($wordLower, self::EXCEPTIONS)) {
                        return self::keepCase(
                            $wordLower,
                            self::EXCEPTIONS[$wordLower]
                        );
                    }
                    return preg_replace_callback(
                        '/(?<!c)(h)(\w?)/iu',
                        function ($match) {
                            $hChar = $match[1];
                            $nextChar = $match[2];

                            if ($nextChar && self::isUpperCase($hChar)) {
                                return self::toUpperCase($nextChar);
                            }
                            if ($nextChar && self::isLowerCase($hChar)) {
                                return self::toLowerCase($nextChar);
                            }

                            return '';
                        },
                        $word
                    );
                }
            ],
            $text
        );
    }
}
