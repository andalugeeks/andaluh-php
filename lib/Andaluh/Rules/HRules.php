<?php

namespace Andaluh\Rules;

class HRules extends BaseRule
{
    public static function apply(string $text): string
    {
        return preg_replace_callback_array(
            [
                '/(?<!c)(h)(ua)/' => function ($matches) {
                    return self::isLowerCase($matches[1])
                        ? "g{$matches[2]}"
                        : "g{$matches[2]}";
                },
            ],
            $text
        );
    }
}
