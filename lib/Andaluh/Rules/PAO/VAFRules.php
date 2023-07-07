<?php

namespace Andaluh\Rules\PAO;

class VAFRules extends BaseRule
{
    public static function apply(string $text, string $vaf_s = self::VAF_S, string $vaf_z = self::VAF_Z): string
    {
        return preg_replace_callback_array(
            [
                //
                '/(z)(a|e|i|o|u|á|é|í|ó|ú|â|ê|î|ô|û|ì|ù)/iu' => function ($match) use ($vaf_z) {
                    return self::replaceVAF($match, $vaf_z);
                },
                //
                '/(s)(a|e|i|o|u|á|é|í|ó|ú|â|ê|î|ô|û|ì|ù)/iu' => function ($match) use ($vaf_s) {
                    return self::replaceVAF($match, $vaf_s);
                },
                // cecina => zezina
                '/(c)(e|i|é|í|ê|î|ì)/iu' => function ($match) use ($vaf_z) {
                    return self::replaceVAF($match, $vaf_z);
                },
            ],
            $text
        );
    }

    public static function replaceVAF(array $match, string $vaf = "¿?"): string
    {
        $lChar = $match[1];
        $nextChar = $match[2];

        if (self::isLowerCase($lChar)) {
            return "{$vaf}{$nextChar}";
        }

        return self::toUpperCase($vaf) . $nextChar;
    }
}
