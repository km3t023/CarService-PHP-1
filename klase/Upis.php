<?php
class Upis extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
// METODE

// konstruktor nasledjuje od bazne klase Tabela

public function DaLiJeDatumZaPopust($DatumPocetkaRadova)
{
	//Uzima danasnji datum i datum prosledjen parametrom funkcije, formatira ih, a zatim poredi razliku izmedju godina
//Nakon toga preuzima parametar u kome se nalazi broj godina i poredi ga sa prethodno dobijenom vrednoscu
$popust="NE";

$pocetakPopusta = new DateTime('2023-04-01');
$datumObj = new DateTime($DatumPocetkaRadova);

$interval = $pocetakPopusta->diff($datumObj);
$razlikaDana = $interval->days;

$xml=simplexml_load_file(dirname(__DIR__)."/klase/ParametarGodina.xml") or die("Ne moze da se ucita XML fajl");
$parametarGodine = $xml->dana;

if($razlikaDana>= 0 && $razlikaDana <= $parametarGodine){
     return $popust="NE";
                            }
else{
    return $popust="DA";;
    }
}
}
?>