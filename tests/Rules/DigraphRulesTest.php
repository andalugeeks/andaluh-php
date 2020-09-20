<?php

namespace Tests;

use Andaluh\Rules\DigraphRules;
use PHPUnit\Framework\TestCase;

class DigraphRulesTest extends TestCase
{
    /** @test */
    public function it_converts_intersticial_to_intertticial()
    {
        $rules = new DigraphRules();
        $this->assertEquals('intertticial', $rules->apply('intersticial'));
        $this->assertEquals('INTERTTICIAL', $rules->apply('INTERSTICIAL'));
    }

    /** @test */
    public function it_converts_solsticiol_to_sortticio()
    {
        $rules = new DigraphRules();
        $this->assertEquals('sortticio', $rules->apply('solsticio'));
        $this->assertEquals('SORTTICIO', $rules->apply('SOLSTICIO'));
    }

    /** @test */
    public function it_converts_superstición_to_superttición()
    {
        $rules = new DigraphRules();
        $this->assertEquals('superttición', $rules->apply('superstición'));
        $this->assertEquals('SUPERTTICIÓN', $rules->apply('SUPERSTICIÓN'));
    }

    /** @test */
    public function it_converts_cárstico_to_cárttico()
    {
        $rules = new DigraphRules();
        $this->assertEquals('cárttico', $rules->apply('cárstico'));
        $this->assertEquals('CÁRTTICO', $rules->apply('CÁRSTICO'));
    }

    /** @test */
    public function it_converts_aerotransporte_to_aerotrâpporte()
    {
        $rules = new DigraphRules();
        $this->assertEquals('aerotrâpporte', $rules->apply('aerotransporte'));
        $this->assertEquals('AEROTRÂPPORTE', $rules->apply('AEROTRANSPORTE'));
    }

    /** @test */
    public function it_converts_translado_to_trâllado()
    {
        $rules = new DigraphRules();
        $this->assertEquals('trâl-lado', $rules->apply('translado'));
        $this->assertEquals('TRÂL-LADO', $rules->apply('TRANSLADO'));
    }

    /** @test */
    public function it_converts_transcendente_to_trâccendente()
    {
        $rules = new DigraphRules();
        $this->assertEquals('trâccendente', $rules->apply('transcendente'));
        $this->assertEquals('TRÂCCENDENTE', $rules->apply('TRANSCENDENTE'));
    }

    /** @test */
    public function it_converts_postpalatal_to_pôppalatal()
    {
        $rules = new DigraphRules();
        $this->assertEquals('pôppalatal', $rules->apply('postpalatal'));
        $this->assertEquals('PÔPPALATAL', $rules->apply('POSTPALATAL'));
    }


    /** @test */
    public function it_converts_abstracto_to_âttrâtto()
    {
        $rules = new DigraphRules();
        $this->assertEquals('âttrâtto', $rules->apply('abstracto'));
        $this->assertEquals('ÂTTRÂTTO', $rules->apply('ABSTRACTO'));
    }

    /** @test */
    public function it_converts_perspectiva_to_perppêttiva()
    {
        $rules = new DigraphRules();
        $this->assertEquals('perppêttiva', $rules->apply('perspectiva'));
        $this->assertEquals('PERPPÊTTIVA', $rules->apply('PERSPECTIVA'));
    }

    /** @test */
    public function it_converts_adscrito_to_âccrito()
    {
        $rules = new DigraphRules();
        $this->assertEquals('âccrito', $rules->apply('adscrito'));
        $this->assertEquals('ÂCCRITO', $rules->apply('ADSCRITO'));
    }

    /** @test */
    public function it_converts_atlántico_to_âllántico()
    {
        $rules = new DigraphRules();
        $this->assertEquals('âl-lántico', $rules->apply('atlántico'));
        $this->assertEquals('ÂL-LÁNTICO', $rules->apply('ATLÁNTICO'));
    }

    /** @test */
    public function it_converts_orla_to_ôlla()
    {
        $rules = new DigraphRules();
        $this->assertEquals('ôl-la', $rules->apply('orla'));
        $this->assertEquals('ÔL-LA', $rules->apply('ORLA'));
    }

    /** @test */
    public function it_converts_adlátere_to_âllátere()
    {
        $rules = new DigraphRules();
        $this->assertEquals('âl-látere', $rules->apply('adlátere'));
        $this->assertEquals('ÂL-LÁTERE', $rules->apply('ADLÁTERE'));
    }

    /** @test */
    public function it_converts_tesla_to_têlla()
    {
        $rules = new DigraphRules();
        $this->assertEquals('têl-la', $rules->apply('tesla'));
        $this->assertEquals('TÊL-LA', $rules->apply('TESLA'));
    }

    /** @test */
    public function it_converts_postoperatorio_to_pôttoperatorio()
    {
        $rules = new DigraphRules();
        $this->assertEquals('pôttoperatorio', $rules->apply('postoperatorio'));
        $this->assertEquals('PÔTTOPERATORIO', $rules->apply('POSTOPERATORIO'));
    }
}
