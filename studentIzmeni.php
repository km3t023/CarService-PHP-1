 <?php
        
		session_start();  
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   // citanje vrednosti iz sesije - da bismo uvek proverili da li je to prijavljeni korisnik
	   $korisnik=$_SESSION["korisnik"];
      
	  // ako nije prijavljen korisnik, vraca ga na pocetnu stranicu
				if (!isset($korisnik))
				{
					header ('Location:index.php');
				}	
	   

	      // -------------------------------------

	   // preuzimanje vrednosti sa forme
	   $StariIDServisa=$_POST['StariIDServisa'];
	   $IDServisa=$_POST['IDServisa'];
	   $BrojSasije=$_POST['BrojSasije'];
	   $Radovi=$_POST['Radovi'];
	   $ImePrezimeKlijenta=$_POST['ImePrezimeKlijenta'];
	   $BrRadnihSati=$_POST['BrRadnihSati'];
	   $DatumPocetkaRadova=$_POST['DatumPocetkaRadova'];
	   $DatumKrajaRadova=$_POST['DatumKrajaRadova'];
	   $Cena=$_POST['Cena'];

	   if (isset($_POST['DatumKrajaRadova']))
	   {
		$DatumKrajaRadova=$_POST['DatumKrajaRadova'];
	   }
	   else // ako nije nista promenjeno
	   {
		$StaraCena=$_POST['StaraCena'];
		$DatumKrajaRadova=$StaraCena;
	   }
	  
	   // koristimo klasu za poziv procedure za konekciju
		require "klase/BaznaKonekcija.php";
		require "klase/BaznaTabela.php";
		$KonekcijaObject = new Konekcija('klase/BaznaParametriKonekcije.xml');
		$KonekcijaObject->connect();
		if ($KonekcijaObject->konekcijaDB) // uspesno realizovana konekcija ka DBMS i bazi podataka
		{	
			require "klase/DBStudent.php";
			$EvidencijaObject = new DBStudent($KonekcijaObject, 'evidencijausluge');
			$greska=$EvidencijaObject->IzmeniIzvrseneRadove($StariIDServisa, $IDServisa, $BrojSasije,$Radovi, $ImePrezimeKlijenta ,$BrRadnihSati,$DatumPocetkaRadova,$DatumKrajaRadova, $Cena);
		}
		else
		{
			echo "Nije uspostavljena konekcija ka bazi podataka!";
		}
		
    $KonekcijaObject->disconnect();
	   
	// prikaz uspeha aktivnosti	
	//echo "Ukupno procesirano $retval zapisa";
	//echo "Greska $greska";	

	header ('Location:StudentiLista.php');	
		
	  
      ?>

