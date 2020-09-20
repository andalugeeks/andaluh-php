<?php

namespace Andaluh\Rules;

class VAFRules extends BaseRule
{
    public static function apply(string $text): string
    {
        return preg_replace_callback_array(
            [
                // NV -> NB -> MB (i.e.: envidia -> embidia)
                '/(z|s)(a|e|i|o|u|á|é|í|ó|ú|â|ê|î|ô|û)/i' => [self::class, 'replaceVAF'],
                '/(c)(e|i|é|í|ê|î)/i' => [self::class, 'replaceVAF'],
            ],
            $text
        );
    }

    public static function replaceVAF(array $match): string
    {
        $lChar = $match[1];
        $nextChar = $match[2];

        if (self::isLowerCase($lChar)) {
            return self::VAF . $nextChar;
        }

        return self::toUpperCase(self::VAF) . $nextChar;
    }
}
