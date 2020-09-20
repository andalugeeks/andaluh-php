<?php

namespace Andaluh\Rules;

class HRules extends BaseRule
{
    const EXCEPTIONS = [
        'haz' => 'âh',
        'hez' => 'êh',
        'hoz' => 'ôh',
        'oh' => 'ôh',
        'yihad' => 'yihá',
        'h' => 'h'  # Keep an isolated h as-is
    ];

    public static function apply(string $text): string
    {
        return preg_replace_callback_array(
            [
                # chihuahua => chiguagua
                '/(?<!c)(h)(ua)/i' => function ($match) {
                    return self::isLowerCase($match[1])
                        ? "g{$match[2]}"
                        : "g{$match[2]}";
                },
                # cacahuete => cacagüete ,at the end will be cacagûete
                '/(?<!c)(h)(u)(e)/i' => function ($match) {
                    $transformed = self::keepCase($match[2], 'ü') . $match[3];
                    return self::isLowerCase($match[1])
                        ? "g{$transformed}"
                        : "g{$transformed}";
                },
            ],
            $text
        );
    }
}
