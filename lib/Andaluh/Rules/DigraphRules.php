<?php

namespace Andaluh\Rules;

class DigraphRules extends BaseRule
{
    const DIGRAPHS =
    [
        'bb', 'bc', 'bç', 'bÇ', 'bd', 'bf', 'bg', 'bh', 'bm', 'bn', 'bp', 'bq', 'bt', 'bx', 'by', 'cb', 'cc',
        'cç', 'cÇ', 'cd', 'cf', 'cg', 'ch', 'cm', 'cn', 'cp', 'cq', 'ct', 'cx', 'cy',
        'db', 'dc', 'dç', 'dÇ', 'dd', 'df', 'dg', 'dh', 'dl', 'dm', 'dn', 'dp', 'dq', 'dt', 'dx', 'dy',
        'fb', 'fc', 'fç', 'fÇ', 'fd', 'ff', 'fg', 'fh', 'fm', 'fn', 'fp', 'fq', 'ft', 'fx', 'fy',
        'gb', 'gc', 'gç', 'gÇ', 'gd', 'gf', 'gg', 'gh', 'gm', 'gn', 'gp', 'gq', 'gt', 'gx', 'gy',
        'jb', 'jc', 'jç', 'jÇ', 'jd', 'jf', 'jg', 'jh', 'jl', 'jm', 'jn', 'jp', 'jq', 'jr', 'jt', 'jx', 'jy',
        'lb', 'lc', 'lç', 'lÇ', 'ld', 'lf', 'lg', 'lh', 'll', 'lm', 'ln', 'lp', 'lq', 'lr', 'lt', 'lx', 'ly',
        'mm', 'mn',
        'nm', 'nn',
        'pb', 'pc', 'pç', 'pÇ', 'pd', 'pf', 'pg', 'ph', 'pm', 'pn', 'pp', 'pq', 'pt', 'px', 'py',
        'rn',
        'sb', 'sc', 'sç', 'sÇ', 'sd', 'sf', 'sg', 'sh', 'sk', 'sl', 'sm', 'sn', 'sñ', 'sp', 'sq', 'sr', 'st', 'sx', 'sy',
        'tb', 'tc', 'tç', 'tÇ', 'td', 'tf', 'tg', 'th', 'tl', 'tm', 'tn', 'tp', 'tq', 'tt', 'tx', 'ty',
        'xb', 'xc', 'xç', 'xÇ', 'xd', 'xf', 'xg', 'xh', 'xl', 'xm', 'xn', 'xp', 'xq', 'xr', 'xt', 'xx', 'xy',
        'zb', 'zc', 'zç', 'zÇ', 'zd', 'zf', 'zg', 'zh', 'zl', 'zm', 'zn', 'zp', 'zq', 'zr', 'zt', 'zx', 'zy'
    ];

    public static function apply(string $text): string
    {
        # Replacement of consecutive consonant with EPA VAF
        return preg_replace_callback_array(
            [
                // intersticial  => interttiçiâh 
                // solsticio  =>  sortticio
                // superstición  => superttición 
                // cárstico => cárttico

                '/(a|e|i|o|u|á|é|í|ó|ú)(l|r)s(t)/iu' => [self::class, 'replaceLstrstWithCase'],
                // aerotransporte => aerotrâpporte 
                // translado => trâl-lado 
                // transcendente => trâccendente 
                // postpalatal =>  pôppalatal
                '/(tr|p)(a|o)(?:ns|st)(b|c|ç|d|f|g|h|j|k|l|m|n|p|q|s|t|v|w|x|y|z)/iu' => [self::class, 'replaceTranspostWithCase'],
                // abstracto => âttrâtto 
                // adscrito => âccrito 
                // perspectiva => perppêttiva
                '/(a|e|i|o|u|á|é|í|ó|ú)(b|d|n|r)(s)(b|c|ç|Ç|d|f|g|h|j|k|l|m|n|p|q|s|t|v|w|x|y|z)/iu' => [self::class, 'replaceBdnrSWithCase'],
                // atlántico => âl-lántico 
                // orla => ôl-la 
                // adlátere => âl-látere 
                // tesla => têl-la 
                '/(a|e|i|o|u|á|é|í|ó|ú)(d|j|r|s|t|x|z)(l)/iu' => [self::class, 'replaceLWithCase'],
                // General digraph rules (postperatorio => pôttoperatorio)
                '/(a|e|i|o|u|á|é|í|ó|ú)(' .  implode('|', self::DIGRAPHS) . ')/iu' => [self::class, 'replaceDigraphWithCase'],
            ],
            $text
        );
    }

    private static function replaceLstrstWithCase(array $match): string
    {
        [
            //$word,
            ,
            $vowelChar,
            $lrChar,
            $tChar
        ] = $match;

        $lrChar = self::toLowerCase($lrChar) === 'l'
            ? self::keepCase($lrChar, 'r')
            : $lrChar;

        return "${vowelChar}{$lrChar}${tChar}${tChar}";
    }

    private static function replaceTranspostWithCase(array $match): string
    {
        [
            //$word,
            ,
            $initChar,
            $vowelChar,
            $consChar,
        ] = $match;

        return self::toLowerCase($consChar) === 'l'
            ? $initChar . self::getVowelCircumflexs($vowelChar) . "{$consChar}-{$consChar}"
            : $initChar . self::getVowelCircumflexs($vowelChar) . "{$consChar}{$consChar}";
    }

    private static function replaceBdnrSWithCase(array $match): string
    {
        [
            //$word,
            ,
            $vowelChar,
            $consChar,
            $sChar,
            $digraphChar,
        ] = $match;

        return self::toLowerCase($consChar) === 'r' && self::toLowerCase($sChar) === 's'
            ? "${vowelChar}{$consChar}${digraphChar}${digraphChar}"
            : self::getVowelCircumflexs($vowelChar) . "{$digraphChar}{$digraphChar}";
    }

    private static function replaceLWithCase(array $match): string
    {
        $vowelChar = $match[1];
        $digraphChar = $match[3];

        return self::getVowelCircumflexs($vowelChar) . "{$digraphChar}-{$digraphChar}";
    }

    private static function replaceDigraphWithCase(array $match): string
    {
        $vowelChar = $match[1];
        $digraphChar = mb_substr($match[2], 1, 1);

        return self::getVowelCircumflexs($vowelChar) . "{$digraphChar}{$digraphChar}";
    }
}
