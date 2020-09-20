<?php

namespace Andaluh\Rules;

class PsicoPseudoRules extends BaseRule
{

    public static function apply(string $text): string
    {
        return preg_replace('/p(sic|seud)/i', '$1', $text);
    }
}
