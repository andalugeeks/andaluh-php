<?php

namespace Andaluh\Rules\EPA;

class PsicoPseudoRules extends BaseRule
{

    public static function apply(string $text): string
    {
        return preg_replace('/p(sic|seud)/iu', '$1', $text);
    }
}
