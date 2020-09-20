<?php

namespace Andaluh\Rules;

class XRules extends BaseRule
{
    const VAF = 'ç';

    public static function apply(string $text, string $vaf = self::VAF): string
    {
        if ($text[0] == "X") {
            $text = self::toUpperCase($vaf) . mb_substr($text, 1);
        } else if ($text[0] == "x") {
            $text = $vaf . mb_substr($text, 1);
        }

        return $text;
    }
}
