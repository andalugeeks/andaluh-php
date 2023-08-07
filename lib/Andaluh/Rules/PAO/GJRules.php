<?php

namespace Andaluh\Rules\PAO;

class GJRules extends BaseRule
{
    const EXCEPTIONS = [
        'gin' => 'yin',
        'jazz' => 'yâh',
        'jet' => 'yêh'
    ];

    public static function apply(string $text, string $vvf = self::VVF): string
    {
           if ($vvf=='') {
                $vvf = "j";
           }


        # Replacement rules for /∫/ (voiceless postalveolar fricative)
        return preg_replace_callback_array(
            [
                //TODO missing test cases
                '/\b(\w*?)(g|j)(e|i|é|í)(\w*?)\b/iu'
                => function ($match) use ($vvf) {
                    return self::replaceWithHCase($match, $vvf);
                },
                // Gijarrito => hiharrito
                '/\b(\w*?)(j)(a|o|u|á|ó|ú)(\w*?)\b/iu'
                => function ($match) use ($vvf) {
                    return self::replaceWithHCase($match, $vvf);
                },
                /*
                // GUE,GUI replacement
                '/(g)u(e|i|é|í)/iu' => function ($match) {
                    return "{$match[1]}{$match[2]}";
                },
                // GÜE,GÜI replacement
                '/(g)(ü)(e|i|é|í)/iu' => function ($match) {
                    $middle_u = self::keepCase($match[2], 'u');
                    return "{$match[1]}{$middle_u}{$match[3]}";
                },
                */
                // buen  => guen
                '/(bu)(en)/iu' => function ($match) {
                    return self::isLowerCase($match[1])
                        ? "gü{$match[2]}"
                        : "GÜ{$match[2]}";
                },
                // abuel => aguel 
                // sabues => sagues
                '/(?P<s>s?)(?P<a>a?)(?<!m)(?P<b>b)(?P<ue>ue)(?P<const>l|s)/iu' => function ($match) {
                    $replacedB = self::keepCase($match['b'], 'g');
                    return "{$match['s']}{$match['a']}{$replacedB}üe{$match['const']}";
                    // return "{$match['s']}{$match['a']}{$replacedB}{$match['ue']}{$match['const']}";
                },
            ],
            $text
        );
    }

    private static function replaceWithHCase(array $match, string $vvf = self::VVF): string
    {
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
                '/(g|j)(e|i|é|í)/iu' => function ($match) use ($vvf) {
                    return self::isLowerCase($match[1])
                        ? "{$vvf}{$match[2]}"
                        : self::toUpperCase($vvf) . $match[2];
                },
                '/(j)(a|o|u|á|ó|ú)/iu' => function ($match) use ($vvf) {
                    return self::isLowerCase($match[1])
                        ? "{$vvf}{$match[2]}"
                        : self::toUpperCase($vvf) . $match[2];
                },
            ],
            $word
        );
    }
}
