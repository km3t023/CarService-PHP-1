<?php
class DBStudent extends Tabela 
// rad sa stored procedurom za snimanje novog studenta
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

public function DodajIzvrseneRadove()
{
	//$SQL = "INSERT INTO `student` (IDServisa, BrojSasije, Ime, ImePrezimeKlijenta, NazivFajlaFotografije) VALUES ('$this->IDServisa','$this->BrojSasije', '$this->Ime', '$this->ImePrezimeKlijenta', '$this->NazivFajlaFotografije')";
	//$greska=$this->IzvrsiAktivanSQLUpit($SQL);
	
	
		$GreskarezultatPar1 = $this->IzvrsiAktivanSQLUpit ("SET @IDServisaParametar='".$this->IDServisa."'");
		
		$GreskarezultatPar2 = $this->IzvrsiAktivanSQLUpit ("SET @BrojSasijeParametar='".$this->BrojSasije."'");
		
		$GreskarezultatPar3 =  $this->IzvrsiAktivanSQLUpit ("SET @RadoviParametar='".$this->Radovi."'");
		
		$GreskarezultatPar4 = $this->IzvrsiAktivanSQLUpit (  "SET @ImePrezimeKlijentaParametar='".$this->ImePrezimeKlijenta."'");
		
		$GreskarezultatPar5 = $this->IzvrsiAktivanSQLUpit (  "SET @BrRadnihSatiParametar='".$this->BrRadnihSati."'");

		$GreskarezultatPar6 = $this->IzvrsiAktivanSQLUpit (  "SET @DatumPocetkaRadovaParametar='".$this->DatumPocetkaRadova."'");

		$GreskarezultatPar7 = $this->IzvrsiAktivanSQLUpit (  "SET @DatumKrajaRadovaParametar='".$this->DatumKrajaRadova."'");

		$GreskarezultatPar8 = $this->IzvrsiAktivanSQLUpit (  "SET @CenaParametar='".$this->Cena."'");
		
		$GreskarezultatCall = $this->IzvrsiAktivanSQLUpit ( "CALL `DodajIzvrseneRadove`(@IDServisaParametar,@BrojSasijeParametar,@RadoviParametar,@ImePrezimeKlijentaParametar,@BrRadnihSatiParametar, @DatumPocetkaRadovaParametar, @DatumKrajaRadovaParametar, @CenaParametar);");
		
	
	$greska=$GreskarezultatPar1.$GreskarezultatPar2.$GreskarezultatPar3.$GreskarezultatPar4.$GreskarezultatPar5.$GreskarezultatPar7.$GreskarezultatPar8.$GreskarezultatCall;
	return $greska;
}


}
?>