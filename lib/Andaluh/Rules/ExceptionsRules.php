<?php

namespace Andaluh\Rules;

class ExceptionsRules extends BaseRule
{
    const EXCEPTIONS = [
        # Exceptions to digraph rules with nm
        'biêmmandao' => 'bienmandao',
        'biêmmeçabe' => 'bienmeçabe',
        'buêmmoço' => 'buenmoço',
        'çiêmmiléçima' => 'çienmiléçima',
        'çiêmmiléçimo' => 'çienmiléçimo',
        'çiêmmilímetro' => 'çienmilímetro',
        'çiêmmiyonéçima' => 'çienmiyonéçima',
        'çiêmmiyonéçimo' => 'çienmiyonéçimo',
        'çiêmmirmiyonéçima' => 'çienmirmiyonéçima',
        'çiêmmirmiyonéçimo' => 'çienmirmiyonéçimo',
        # Exceptions to l rules
        'marrotadôh' => 'mârrotadôh',
        'marrotâh' => 'mârrotâh',
        'mirrayâ' => 'mîrrayâ',
        # Exceptions to psico pseudo rules
        'herôççiquiatría' => 'heroçiquiatría',
        'herôççiquiátrico' => 'heroçiquiátrico',
        'farmacôççiquiatría' => 'farmacoçiquiatría',
        'metempçícoçî' => 'metemçícoçî',
        'necróçico' => 'necróççico',
        'pampçiquîmmo' => 'pamçiquîmmo',
        # Other exceptions
        'antîççerôttármico' => 'antiçerôttármico',
        'eclampçia' => 'eclampçia',
        'pôttoperatorio' => 'pôççoperatorio',
        'çáccrito' => 'çánccrito',
        'manbîh' => 'mambîh',
        'cômmelináçeo' => 'commelináçeo',
        'dîmmneçia' => 'dînneçia',
        'todo' => 'tó',
        'todô' => 'tôh',
        'toda' => 'toa',
        'todâ' => 'toâ',
        # Other exceptions monosyllables
        'as' => 'âh',
        'clown' => 'claun',
        'crack' => 'crâh',
        'down' => 'daun',
        'es' => 'êh',
        'ex' => 'êh',
        'ir' => 'îh',
        'miss' => 'mîh',
        'muy' => 'mu',
        'ôff' => 'off',
        'os' => 'ô',
        'para' => 'pa',
        'ring' => 'rin',
        'rock' => 'rôh',
        'spray' => 'êppray',
        'sprint' => 'êpprín',
        'wau' => 'guau'
    ];

    public static function apply(string $text): string
    {
        return preg_replace_callback(
            '/\b(' .  implode('|', array_keys(self::EXCEPTIONS)) . ')\b/iu',
            function ($match) {
                $word = $match[1];
                return self::keepCase($word, self::EXCEPTIONS[self::toLowerCase($word)]);
            },
            $text
        );
    }
}
