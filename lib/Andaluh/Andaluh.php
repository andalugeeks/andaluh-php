<?php

namespace Andaluh;

// Rules EPA
use Andaluh\Rules\EPA\BaseRule as BaseRule_EPA;
use Andaluh\Rules\EPA\ChRules as ChRules_EPA;
use Andaluh\Rules\EPA\DigraphRules as DigraphRules_EPA;
use Andaluh\Rules\EPA\ExceptionsRules as ExceptionsRules_EPA;
use Andaluh\Rules\EPA\GJRules as GJRules_EPA;
use Andaluh\Rules\EPA\HRules as HRules_EPA;
use Andaluh\Rules\EPA\LlRules as LlRules_EPA;
use Andaluh\Rules\EPA\LRules as LRules_EPA;
use Andaluh\Rules\EPA\PsicoPseudoRules as PsicoPseudoRules_EPA;
use Andaluh\Rules\EPA\VAFRules as VAFRules_EPA;
use Andaluh\Rules\EPA\VRules as VRules_EPA;
use Andaluh\Rules\EPA\WordEndingRules as WordEndingRules_EPA;
use Andaluh\Rules\EPA\WordInteractionRules as WordInteractionRules_EPA;
use Andaluh\Rules\EPA\XRules as XRules_EPA;
// Rules PAO
use Andaluh\Rules\PAO\BaseRule as BaseRule_PAO;
use Andaluh\Rules\PAO\ChRules as ChRules_PAO;
use Andaluh\Rules\PAO\DigraphRules as DigraphRules_PAO;
use Andaluh\Rules\PAO\ExceptionsRules as ExceptionsRules_PAO;
use Andaluh\Rules\PAO\GJRules as GJRules_PAO;
use Andaluh\Rules\PAO\HRules as HRules_PAO;
use Andaluh\Rules\PAO\LlRules as LlRules_PAO;
use Andaluh\Rules\PAO\LRules as LRules_PAO;
use Andaluh\Rules\PAO\PsicoPseudoRules as PsicoPseudoRules_PAO;
use Andaluh\Rules\PAO\VAFRules as VAFRules_PAO;
use Andaluh\Rules\PAO\VRules as VRules_PAO;
use Andaluh\Rules\PAO\WordEndingRules as WordEndingRules_PAO;
use Andaluh\Rules\PAO\WordInteractionRules as WordInteractionRules_PAO;
use Andaluh\Rules\PAO\XRules as XRules_PAO;

class Andaluh
{
    private $rules_EPA = [
        HRules_EPA::class,
        XRules_EPA::class,
        ChRules_EPA::class,
        GJRules_EPA::class,
        VRules_EPA::class,
        LlRules_EPA::class,
        LRules_EPA::class,
        PsicoPseudoRules_EPA::class,
        VAFRules_EPA::class,
        WordEndingRules_EPA::class,
        DigraphRules_EPA::class,
        ExceptionsRules_EPA::class,
        WordInteractionRules_EPA::class
    ];
    private $rules_PAO = [
        HRules_PAO::class,
        XRules_PAO::class,
        ChRules_PAO::class,
        GJRules_PAO::class,
        VRules_PAO::class,
        LlRules_PAO::class,
        LRules_PAO::class,
        PsicoPseudoRules_PAO::class,
        VAFRules_PAO::class,
        WordEndingRules_PAO::class,
        DigraphRules_PAO::class,
        ExceptionsRules_PAO::class,
        WordInteractionRules_PAO::class
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
    public function transliterate_Epa(
        string $text,
        string $vaf = BaseRule_EPA::VAF,
        string $vvf = BaseRule_EPA::VVF,
        bool $escape_links = false, //TODO
        bool $debug = false //TODO
    ): string {

        return array_reduce(
            $this->rules_EPA,
            function ($text, $ruleClass) use ($vaf, $vvf) {
                if ($ruleClass === XRules_EPA::class || $ruleClass == VAFRules_EPA::class) {
                    return $ruleClass::apply($text, $vaf);
                }
                if ($ruleClass === GjRules_EPA::class) {
                    return $ruleClass::apply($text, $vvf);
                }
                return $ruleClass::apply($text);
            },
            $text
        );
    }

    public function transliterate_Pao(
        string $text,
        string $vaf_s = BaseRule_PAO::VAF_S,
        string $vaf_z = BaseRule_PAO::VAF_Z,
        string $vvf = BaseRule_PAO::VVF,
        bool $escape_links = false, //TODO
        bool $debug = false //TODO
    ): string {

        return array_reduce(
            $this->rules_PAO,
            function ($text, $ruleClass) use ($vaf_s, $vaf_z, $vvf) {
                if ($ruleClass === XRules_PAO::class || $ruleClass == VAFRules_PAO::class) {
                    return $ruleClass::apply($text, $vaf_s, $vaf_z);
                }
                if ($ruleClass === GjRules_PAO::class) {
                    return $ruleClass::apply($text, $vvf);
                }
                return $ruleClass::apply($text);
            },
            $text
        );
    }
}
