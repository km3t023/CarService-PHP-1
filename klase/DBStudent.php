<?php
class DBStudent extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $IDServisa;
public $BrojSasije;
public $Radovi;
public $ImePrezimeKlijenta;
public $BrRadnihSati;
public $DatumPocetkaRadova;
public $DatumKrajaRadova;
public $Cena;

// METODE

// konstruktor

public function DajKolekcijuSvihevidencijausluge()
{
$SQL = "select * from `izvrsenirad` ORDER BY IDServisa ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

public function UcitajIzvrseneRadovePoIDServisu($IDParametar)
{
$SQL = "select * from `izvrsenirad` where `IDServisa`='".$IDParametar."'";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
// raspolazemo sa:
// $Kolekcija;
//  $
}

public function DodajIzvrseneRadove()
{
	$SQL = "INSERT INTO `izvrsenirad` (IDServisa, BrojSasije, Radovi, ImePrezimeKlijenta, BrRadnihSati, DatumPocetkaRadova, DatumKrajaRadova, Cena) VALUES ('$this->IDServisa','$this->BrojSasije', '$this->Radovi', '$this->ImePrezimeKlijenta', '$this->BrRadnihSati',, '$this->DatumPocetkaRadova', '$this->DatumKrajaRadova', '$this->Cena')";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}



public function ObrisiIzvrseneRadove($IdZaBrisanje)
{
	$SQL = "DELETE FROM `izvrsenirad` WHERE IDServisa='".$IdZaBrisanje."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// TO DO
public function IzmeniIzvrseneRadove($StariIDServisa, $IDServisa, $BrojSasije, $Radovi, $ImePrezimeKlijenta, $BrRadnihSati, $DatumPocetkaRadova, $DatumKrajaRadova, $Cena)
{
	$SQL = "UPDATE `izvrsenirad` SET IDServisa='".$IDServisa."', BrojSasije='".$BrojSasije."', Radovi='".$Radovi."', ImePrezimeKlijenta='".$ImePrezimeKlijenta."', BrRadnihSati='".$BrRadnihSati."', DatumPocetkaRadova='".$DatumPocetkaRadova."', DatumKrajaRadova='".$DatumKrajaRadova."', Cena='".$Cena."' WHERE IDServisa='".$IDServisa."'";
	$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	return $greska;
}

// ostale metode 




}
?>