<?php

namespace Tests;

use Andaluh\AndaluhEpa;
use PHPUnit\Framework\TestCase;

class AndaluhEpaTest extends TestCase
{

    /** @test */
    public function it_pass_basic_test()
    {
        $andaluh = new AndaluhEpa();

        $this->assertEquals(
            'Tó Çenomorfo diçe: [abêh], que el Éççito y el éttaçî âffîççian, çi no erê un çilófono Xungo.',
            $andaluh->transliterate('Todo Xenomorfo dice: [haber], que el Éxito y el éxtasis asfixian, si no eres un xilófono Chungo.')
        );

        $this->assertEquals(
            'Yeba un Giharrito el AGuelo, ¡Qué Gueno! ¡pa la BERGUENÇA!',
            $andaluh->transliterate('Lleva un Guijarrito el ABuelo, ¡Qué Bueno! ¡para la VERGÜENZA!')
        );

        $this->assertEquals(
            'BAYA baya, çi bâ toa de EMBIDIA',
            $andaluh->transliterate('VALLA valla, si vas toda de ENVIDIA')
        );

        $this->assertEquals(
            'Arrededôh de la Arpaca abía un ARfabeto ARTIBO de barkiriâ mânnaçidâ',
            $andaluh->transliterate('Alrededor de la Alpaca había un ALfabeto ALTIVO de valkirias malnacidas')
        );

        $this->assertEquals(
            'En la Çaragoça y er Hapón açêççuâh çe Çabía ÇÉriamente çIRBÂH con er CÔççî',
            $andaluh->transliterate('En la Zaragoza y el Japón asexual se Sabía SÉriamente sILBAR con el COxis')
        );

        $this->assertEquals(
            'Trâpportandonô a la cônnotaçión perppicâh del âttrâtto çorttiçio de Alâkka, el aîl-lante pláttico âççorbente âffîççió al ânnéçico çeudoêccritôh granadino de côttituçionê, pa CôMMemorâh broncâ âccritâ',
            $andaluh->transliterate('Transportandonos a la connotación perspicaz del abstracto solsticio de Alaska, el aislante plástico adsorvente asfixió al aMnésico pseudoescritor granadino de constituciones, para ConMemorar broncas adscritas')
        );

        $this->assertEquals(
            'En la pômmodênnidá, er trâccurço de lô trâpportê y trâl-láô en pôttoperatoriô trâççienden a la pôttre unâ pôttiyâ pôppalatalê apôttiyâh çe trâffieren',
            $andaluh->transliterate('En la postmodernidad, el transcurso de los transportes y translados en postoperatorios transcienden a la postre unas postillas postpalatales apostilladas se transfieren')
        );

        $this->assertEquals(
            'Benîh tôh a corrêh en anorâh de biçón a Cádî con âttitûh y mardá, pa êccuxâh er tríçê de Arbénî tocâh ápû con birtûh de laûh.',
            $andaluh->transliterate('Venid todos a correr en anorak de visón a Cádiz con actitud y maldad, para escuchar el tríceps de Albéniz tocar ápud con virtud de laúd.')
        );

        $this->assertEquals(
            'Una comida fabada con fado, y çin dêccuido çerá caçá y amarrá al acorxao roío.',
            $andaluh->transliterate('Una comida fabada con fado, y sin descuido será casada y amarrada al acolchado roido.')
        );

        $this->assertEquals(
            'Lô ÇAGueçô XiGuaGUA comían cacaGuETê, FramBuEÇâ y Eno, ¡y ABLAN con álito de ÊPPANGLÎ!',
            $andaluh->transliterate('Los SABuesos ChiHuaHUA comían cacaHuETes, FramBuESas y Heno, ¡y HABLAN con hálito de ESPANGLISH!')
        );

        // TODO implement ignore links
        /*  $this->assertEquals(
            'Oye çêççy @miguel, la wêh HTTPS://andaluh.es no çale en google.es pero çi en http://google.com #porqueseñor',
            $andaluh->transliterate(
                'Oye sexy @miguel, la web HTTPS://andaluh.es no sale en google.es pero si en http://google.com #porqueseñor',
                '',
                '',
                true
            )
        ); */

        # Lemario test
    }

    /** @test */
    public function it_pass_lemario_test()
    {
        $testCSVPath = __DIR__ . '/lemario_cas_and.csv';
        $handle = fopen($testCSVPath, 'r');
        ini_set('auto_detect_line_endings', TRUE);

        $transcriptions = [];
        $transcriptionErrors = [];
        $stats = [
            "total" => 0,
            "ok" => 0,
            "fail" => 0
        ];

        $andaluh = new AndaluhEpa();
        $testCase = fgetcsv($handle);
        while (($testCase = fgetcsv($handle)) !== FALSE) {
            $caste = $testCase[0];
            $andal = $testCase[1];
            $trans = $andaluh->transliterate($caste);

            if ($andal !== $trans) {
                $transcriptionErrors[] = compact(['caste', 'andal', 'trans']);
                $stats["fail"] += 1;
            } else {
                $stats["ok"] += 1;
            }

            $transcriptions[] = compact(['caste', 'andal', 'trans']);
            $stats["total"] += 1;
        }

        var_dump($stats);
        $this->assertEquals(0, $stats['fail']);
    }
}
