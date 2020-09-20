<?php

namespace Andaluh\Rules;

class XRules extends BaseRule
{

    public static function apply(string $text, string $vaf = self::VAF): string
    {
        # If the text begins with /ks/
        # Xilófono roto => Çilófono roto
        if ($text[0] == "X") {
            $text = self::toUpperCase($vaf) . mb_substr($text, 1);
        } else if ($text[0] == "x") {
            $text = $vaf . mb_substr($text, 1);
        }

        return preg_replace_callback_array(
            [
                # If the /ks/ sound is between vowels
                # Axila => Aççila | Éxito => Éççito | Sexy => Çeççy
                '/(a|e|i|o|u|á|é|í|ó|ú)(x)(a|e|i|o|u|y|á|é|í|ó|ú)/iu' => function ($match) use ($vaf) {
                    $prev_char = $match[1];
                    $x_char = $match[2];
                    $next_char = $match[3];
                    $prev_char = self::getVowelCircumflexs($prev_char);

                    if (self::isUpperCase($x_char)) {
                        $upperVaf = self::toUpperCase($vaf);
                        return "{$prev_char}{$upperVaf}{$upperVaf}{$next_char}";
                    }
                    return $prev_char . str_repeat($vaf, 2) . $next_char;
                },
            ],
            $text
        );
    }
}
