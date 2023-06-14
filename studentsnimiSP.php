 <?php
        
		//session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   //$IDServisakorisnika=$_SESSION["IDServisakorisnika"];
	   
	      // -------------------------------------
	   
	   // preuzimanje vrednosti sa forme
	   $IDServisa=$_POST['IDServisa'];
	   $BrojSasije=$_POST['BrojSasije'];
	   $Radovi=$_POST['Radovi'];
	   $ImePrezimeKlijenta=$_POST['ImePrezimeKlijenta'];
	   $BrRadnihSati=$_POST['BrRadnihSati'];;
	   $DatumPocetkaRadova=$_POST['DatumPocetkaRadova'];
	   $DatumKrajaRadova=$_POST['DatumKrajaRadova'];
	   $Cena=$_POST['Cena'];
	   
	   //KONEKCIJA KA SERVERU
	
// koristimo klasu za poziv procedure za konekciju
	require "klase/BaznaKonekcija.php";
	require "klase/BaznaTabela.php";
	$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
	$KonekcijaObject->connect();
	if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
    {
    	require "klase/DBSmer.php";
		$RadObject = new DBSmer($KonekcijaObject, 'rad');
		//$greska2=$RadObject->InkrementirajBrojStudenata($OznakaSmera);

		// provera poslovne logike
		require "klase/Upis.php";
		$UnosObject = new Upis($KonekcijaObject, 'izvrsenirad');
		echo $DatumPocetkaRadova;
		$dozvoljenUpis=$UnosObject->DaLiJeDatumZaPopust($DatumPocetkaRadova);

    	if ($dozvoljenUpis=="DA")
			{
		require "klase/BaznaTransakcija.php";
		$TransakcijaObject = new Transakcija($KonekcijaObject);
		$TransakcijaObject->ZapocniTransakciju();
		
		require "klase/DBStudentSP.php";
		$RadoviObject = new DBStudent($KonekcijaObject, 'izvrsenirad');
		$RadoviObject->IDServisa=$IDServisa;
		$RadoviObject->BrojSasije=$BrojSasije;
		$RadoviObject->Radovi=$Radovi;
		$RadoviObject->ImePrezimeKlijenta=$ImePrezimeKlijenta;
		$RadoviObject->BrRadnihSati=$BrRadnihSati;
		$RadoviObject->DatumPocetkaRadova=$DatumPocetkaRadova;
		$RadoviObject->DatumKrajaRadova=$DatumKrajaRadova;
		$RadoviObject->Cena=$Cena;
		$greska1=$RadoviObject->DodajIzvrseneRadove();
		
		// zatvaranje transakcije
		//$UtvrdjenaGreska=$greska1 or $greska2;
		$UtvrdjenaGreska=$greska1.$greska2;
		$TransakcijaObject->ZavrsiTransakciju($UtvrdjenaGreska);
	}
		else
			{
				require "klase/BaznaTransakcija.php";
		$TransakcijaObject = new Transakcija($KonekcijaObject);
		$TransakcijaObject->ZapocniTransakciju();
		
		require "klase/DBStudentSP.php";
		$RadoviObject = new DBStudent($KonekcijaObject, 'izvrsenirad');
		$RadoviObject->IDServisa=$IDServisa;
		$RadoviObject->BrojSasije=$BrojSasije;
		$RadoviObject->Radovi=$Radovi;
		$RadoviObject->ImePrezimeKlijenta=$ImePrezimeKlijenta;
		$RadoviObject->BrRadnihSati=$BrRadnihSati;
		$RadoviObject->DatumPocetkaRadova=$DatumPocetkaRadova;
		$RadoviObject->DatumKrajaRadova=$DatumKrajaRadova;
		$RadoviObject->Cena=$Cena/2;
		$greska1=$RadoviObject->DodajIzvrseneRadove();
		
		// zatvaranje transakcije
		//$UtvrdjenaGreska=$greska1 or $greska2;
		$UtvrdjenaGreska=$greska1.$greska2;
		$TransakcijaObject->ZavrsiTransakciju($UtvrdjenaGreska);
			}
		} // od if db selected

      // ZATVARANJE KONEKCIJE KA DBMS
	  $KonekcijaObject->disconnect();
	
	// prikaz uspeha aktivnosti	
	
	if ($UtvrdjenaGreska) {
	echo "Greska $UtvrdjenaGreska";	
     }	
	 else
	 {
		//echo "Snimljeno!";	
		header ('Location:StudentiLista.php');		
	 }
		
	  
      ?>

