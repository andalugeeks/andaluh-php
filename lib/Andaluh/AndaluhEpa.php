<?php

namespace Andaluh;

use Andaluh\Rules\BaseRule;
use Andaluh\Rules\ChRules;
use Andaluh\Rules\DigraphRules;
use Andaluh\Rules\ExceptionsRules;
use Andaluh\Rules\GJRules;
use Andaluh\Rules\HRules;
use Andaluh\Rules\LlRules;
use Andaluh\Rules\LRules;
use Andaluh\Rules\PsicoPseudoRules;
use Andaluh\Rules\VAFRules;
use Andaluh\Rules\VRules;
use Andaluh\Rules\WordEndingRules;
use Andaluh\Rules\WordInteractionRules;
use Andaluh\Rules\XRules;

class AndaluhEpa
{
    private $rules = [
        HRules::class,
        XRules::class,
        ChRules::class,
        GJRules::class,
        VRules::class,
        LlRules::class,
        LRules::class,
        PsicoPseudoRules::class,
        VAFRules::class,
        WordEndingRules::class,
        DigraphRules::class,
        ExceptionsRules::class,
        WordInteractionRules::class
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
        string $vaf = BaseRule::VAF,
        string $vvf = BaseRule::VVF,
        bool $escape_links = false, //TODO
        bool $debug = false //TODO
    ): string {
        return array_reduce(
            $this->rules,
            function ($text, $ruleClass) use ($vaf, $vvf) {
                if ($ruleClass === XRules::class || $ruleClass == VAFRules::class) {
                    return $ruleClass::apply($text, $vaf);
                }
                if ($ruleClass === GjRules::class) {
                    return $ruleClass::apply($text, $vvf);
                }
                return $ruleClass::apply($text);
            },
            $text
        );
    }
}
