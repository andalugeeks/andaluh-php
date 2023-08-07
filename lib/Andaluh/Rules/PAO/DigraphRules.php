<?php

namespace Andaluh\Rules\PAO;

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
        'lb', 'lc', 'lç', 'lÇ', 'ld', 'lf', 'lg', 'lh', /* 'll', */ 'lm', 'ln', 'lp', 'lq', 'lr', 'lt', 'lx', 'ly',
        'mm', 'mn',
        'nm', 'nn',
        'pb', 'pc', 'pç', 'pÇ', 'pd', 'pf', 'pg', 'ph', 'pm', 'pn', 'pp', 'pq', 'pt', 'px', 'py',
        'rn',
        'sb', 'sc', 'sç', 'sÇ', 'sd', 'sf', 'sg', 'sh', 'sk', 'sl', 'sm', 'sn', 'sñ', 'sp', 'sq', 'sr', 'st', 'sx', 'sy',
        'tb', 'tc', 'tç', 'tÇ', 'td', 'tf', 'tg', 'th', 'tl', 'tm', 'tn', 'tp', 'tq', 'tt', 'tx', 'ty',
        'xb', 'xc', 'xç', 'xÇ', 'xd', 'xf', 'xg', 'xh', 'xl', 'xm', 'xn', 'xp', 'xq', 'xr', 'xt', 'xx', 'xy',
        'zb', 'zc', 'zç', 'zÇ', 'zd', 'zf', 'zg', 'zh', 'zl', 'zm', 'zn', 'zp', 'zq', 'zr', 'zt', 'zx', 'zy',

        "bs", "bS", "cs", "cS", "ds", "dS", "fs", "fS", "gs", "gS", "js", "jS", "ls", "lS", "ps", "pS",
        /* "ss", "sS", */ "ts", "tS", "xs", "xS", "zs", "zS",

        "bz", "bZ", "cz", "cZ", "dz", "dZ", "fz", "fZ", "gz", "gZ", "jz", "jZ", "lz", "lZ", "pz", "pZ",
        "sz", "sZ", "tz", "tZ", "xz", "xZ", /* "zz", "zZ",*/

        "sj", "zj"
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

        return "${vowelChar}{$lrChar}h${tChar}";
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
            ? $initChar . $vowelChar . "h{$consChar}"
            : $initChar . $vowelChar . "h{$consChar}";
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
            ? "${vowelChar}{$consChar}h${digraphChar}"
            : $vowelChar . "h{$digraphChar}";
    }

    private static function replaceLWithCase(array $match): string
    {
        $vowelChar = $match[1];
        $preDigraphChar = $match[2];
        $digraphChar = $match[3];

        return self::toLowerCase($preDigraphChar) === 'r'
           ? $vowelChar . "{$digraphChar}{$digraphChar}"
           : $vowelChar . "h{$digraphChar}";

    }

    private static function replaceDigraphWithCase(array $match): string
    {
        $vowelChar = $match[1];
        $preDigraphChar = mb_substr($match[2], 0, 1);
        $digraphChar = mb_substr($match[2], 1, 1);

        /* echo "1: " . $match[2] . "\n";
        echo "2: " . $preDigraphChar . "\n";
        echo "3: " . $digraphChar . "\n"; */

        if (self::toLowerCase($preDigraphChar)=='r' && self::toLowerCase($digraphChar)=='n') {
            return $vowelChar . $digraphChar . $digraphChar;
        }
        else if (self::toLowerCase($preDigraphChar)=='n' && self::toLowerCase($digraphChar)=='m') {
            return $vowelChar . $digraphChar . $digraphChar;
        }
        else if (self::toLowerCase($preDigraphChar)=='s' && self::toLowerCase($digraphChar)=='j') {
            return $vowelChar . $digraphChar;
        }
        else if (self::toLowerCase($digraphChar)=='s' || self::toLowerCase($digraphChar)=='z') {
            return $vowelChar . $digraphChar . $digraphChar;
        }
        else {
            return $vowelChar . "h{$digraphChar}";
        }
    }
}
