
<meta charset="UTF-8">
<!--==================================== SADRZAJ STRANICE DESNO pocinje ovde ------------------------------>
<img src="images/sredinagore.jpg" width="100%" height="3" alt="" class="flt1 rp_topcornn" /> 

<table style="width:100%;style="width:100%; padding:0" align="center" cellspacing="0" cellpadding="0" border="0"  bgcolor="#D8E7F4">

<tr>
<td style="width:5%;">
</td>

<td>
<font face="Trebuchet MS" color="darkblue" size="4px">
<b>СПИСАК ИЗ ЕВИДЕНЦИЈЕ ИЗВРШЕНИХ РАДОВА МАЈСТОРА ЗА КУЋУ</br> </font>
<form action="" method="GET">
Врста посла: <input type="text" name="filter" />
<input type="submit" name="filtriraj" value="FILTRIRAJ" />
<input type="submit" name="svi" value="SVI" />

</form>


</td>

<td style="width:5%;">
</td>
</tr>


<tr>
<td style="width:5%;">
</td>

<td align="left">
<br/>
<font face="Trebuchet MS" color="darkblue" size="4px">

<?php
// PRETHODNI KOD PREUZIMA PODATKE I TO JE NA INDEX.PHP

if ($RadoviViewObject->BrojZapisa==0)
	{
		echo "НЕМА ЗАПИСА У ТАБЕЛИ!";
	}
else
	{
	echo "УКУПАН БРОЈ ЗАПИСА:".$RadoviViewObject->BrojZapisa;
		// ------------ zaglavlje ----------------
		echo "<table style=\"width:100%;padding:0\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\"  bgcolor=\"#D8E7F4\">";
		echo "<tr>";

		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">Број шасије</font><br/>";
		echo "</td>";

		echo "<td style=\"width:10%;\">";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">Име и презиме клијента</font><br/>";
		echo "</td>";

		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">Назив рада</font><br/>";
		echo "</td>";

		echo "<td style=\"width:10%;\">";
		echo "<font face=\"Trebuchet MS\" color:#3F4534 size=\"3px\">Цена</font><br/>";
		echo "</td>";
		echo "</tr>";

		for ($RBZapisa = 0; $RBZapisa < $RadoviViewObject->BrojZapisa; $RBZapisa++) 
		{
							
		// CITANJE VREDNOSTI IZ MEMORIJSKE KOLEKCIJE $RESULT I DODELJIVANJE PROMENLJIVIM


		$BrojSasije=$RadoviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($RadoviViewObject->Kolekcija, $RBZapisa, 1);
		$ImePrezimeKlijenta=$RadoviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($RadoviViewObject->Kolekcija, $RBZapisa, 2);
		$NazivRada=$RadoviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($RadoviViewObject->Kolekcija, $RBZapisa, 3);
		$Cena=$RadoviViewObject->DajVrednostPoRednomBrojuZapisaPoRBPolja ($RadoviViewObject->Kolekcija, $RBZapisa, 4);


		// CRTANJE REDA TABELE SA PODACIMA
		echo "<tr>";

		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$BrojSasije</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$ImePrezimeKlijenta</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$NazivRada</font><br/>";
		echo "</td>";
		echo "<td>";
		echo "<b><font face=\"Trebuchet MS\" color:#3F4534 size=\"2px\">$Cena</font><br/>";
		echo "</td>";
		echo "</tr>";

		}  //za for 
		echo "</table>";
		echo "<br/>";
		echo "<br/>";
	}
$KonekcijaObject->disconnect();

?>



</td>

<td style="width:5%;">
</td>

</tr>
</table>

    