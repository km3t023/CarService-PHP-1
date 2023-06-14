<?php
class DBSmer extends Tabela 
{
// ATRIBUTI
private $bazapodataka;
private $UspehKonekcijeNaDBMS;
//
public $Sifra;
public $NazivRada; 

// METODE

// konstruktor

public function UcitajKolekcijuSvihRadova()
{
$SQL = "select * from `rad` ORDER BY NazivRada ASC";
$this->UcitajSvePoUpitu($SQL); // puni atribut bazne klase Kolekcija
//return $this->Kolekcija; // uzima iz baznek klase vrednost atributa
}

// public function InkrementirajBrojMesta($IDMesta)
// {
// 	// izdvajanje stare vrednosti broja vozila za taj tip
// 	//$SQL = "select UkupanBrojMesta from `".$this->bazapodataka."`.`mesto` WHERE PTT=".$IDMesta;
// 	$KriterijumFiltriranja="PTT='".$IDMesta."'";
// 	$StaraVrednostUkBrMesta=$this->DajVrednostJednogPoljaPrvogZapisa ('UkupanBrojMesta', $KriterijumFiltriranja, 'UkupanBrojMesta'); 
	
// 	// izracunavanje nove vrednosti
// 	$NovaVrednostUkBrMesta=$StaraVrednostUkBrMesta + 1;
	
// 	// izvrsavanje izmene
//     $SQL = "UPDATE `".$this->NazivBazePodataka."`.`mesto` SET UkupanBrojMesta=".$NovaVrednostUkBrMesta." WHERE PTT='".$IDMesta."'";
// 	$greska= $this->IzvrsiAktivanSQLUpit($SQL);

// 	return $greska;
	
// 	}

// ########### TO DO





}
?>