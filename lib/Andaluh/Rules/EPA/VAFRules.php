<?php

namespace Andaluh\Rules\EPA;

class VAFRules extends BaseRule
{
    public static function apply(string $text, string $vaf = self::VAF): string
    {
        return preg_replace_callback_array(
            [
                // servilleta => servilleta
                // zarzamora => zarzamora
                // gasoducto => gaçoducto
                '/(z|s)(a|e|i|o|u|á|é|í|ó|ú|â|ê|î|ô|û)/iu' => function ($match) use ($vaf) {
                    return self::replaceVAF($match, $vaf);
                },
                // cecina => çeçina
                '/(c)(e|i|é|í|ê|î)/iu' => function ($match) use ($vaf) {
                    return self::replaceVAF($match, $vaf);
                },
            ],
            $text
        );
    }

    public static function replaceVAF(array $match, string $vaf = self::VAF): string
    {
        $lChar = $match[1];
        $nextChar = $match[2];

        if (self::isLowerCase($lChar)) {
            return "{$vaf}{$nextChar}";
        }

        return self::toUpperCase($vaf) . $nextChar;
    }
}
