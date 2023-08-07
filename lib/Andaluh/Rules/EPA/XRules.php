<?php

namespace Andaluh\Rules\EPA;

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
                    $prevChar = self::getVowelCircumflexs($match[1]);
                    $xChar = $match[2];
                    $nextChar = $match[3];

                    if (self::isUpperCase($xChar)) {
                        $upperVaf = self::toUpperCase($vaf);
                        return "{$prevChar}{$upperVaf}{$upperVaf}{$nextChar}";
                    }
                    return $prevChar . str_repeat($vaf, 2) . $nextChar;
                },
                // Every word starting with /ks/
                // un çilófono Xungo. => un çilófono Chungo
                '/\b(x)/iu' => function ($match) use ($vaf) {
                    $xChar = $match[1];
                    return self::keepCase($xChar, $vaf);
                },
            ],
            $text
        );
    }
}
