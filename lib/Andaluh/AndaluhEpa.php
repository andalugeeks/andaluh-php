<?php

namespace Andaluh;

use Andaluh\Rules\HRules;
use Andaluh\Rules\XRules;

class AndaluhEpa
{
    public $rules = [
        'h' => HRules::class,
        'x' => XRules::class,
    ];

    /**
     * Transliterate español (spanish) spelling to andaluz proposals
     *
     * @param string $text
     * @param string $vaf
     * @param string $vvf
     * @param boolean $escape_links
     * @param boolean $debug
     * @return string trnasliterated string 
     */
    public function transliterate(
        string $text,
        string $vaf = '',
        string $vvf = '',
        bool $escape_links = false,
        bool $debug = false
    ): string {
        return $text;
    }
}
