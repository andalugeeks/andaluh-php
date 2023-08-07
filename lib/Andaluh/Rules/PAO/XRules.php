<?php

namespace Andaluh\Rules\PAO;

class XRules extends BaseRule
{

    public static function apply(string $text, string $vaf_s = self::VAF_S, string $vaf_z = self::VAF_Z): string
    {
        # If the text begins with /ks/
        # Xilófono roto => Çilófono roto
        if ($text[0] == "X") {
            $text = self::toUpperCase($vaf_s) . mb_substr($text, 1);
        } else if ($text[0] == "x") {
            $text = $vaf_s . mb_substr($text, 1);
        }

        return preg_replace_callback_array(
            [
                # If the /ks/ sound is between vowels
                # Axila => Aççila | Éxito => Éççito | Sexy => Çeççy
                '/(a|e|i|o|u|á|é|í|ó|ú)(x)(a|e|i|o|u|y|á|é|í|ó|ú)/iu' => function ($match) use ($vaf_s) {
                    $prevChar = $match[1]; // self::getVowelCircumflexs($match[1]);
                    $xChar = $match[2];
                    $nextChar = $match[3];

                    if (self::isUpperCase($xChar)) {
                        $upperVaf = self::toUpperCase($vaf_s);
                        return "{$prevChar}{$upperVaf}{$upperVaf}{$nextChar}";
                    }
                    return $prevChar . str_repeat($vaf_s, 2) . $nextChar;
                },
                // Every word starting with /ks/
                // un çilófono Xungo. => un çilófono Chungo
                '/\b(x)/iu' => function ($match) use ($vaf_s) {
                    $xChar = $match[1];
                    return self::keepCase($xChar, $vaf_s);
                },
            ],
            $text
        );
    }
}
