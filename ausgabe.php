<?php

// Zahlen-String in Float wandeln
// Quelle: http://xfragger.de/231/werteingabe-geld-in-gultiges-float-umwandeln

	function price2float($string){
	    $string = trim($string);
		if(preg_match('/([0-9\.,-]+)/', $string, $matches)){
			// Zahl gefunden also können wir weitermachen
			$string = $matches[0];

			if(preg_match('/^[0-9.-\s]*[\,]{1}[0-9-]{0,2}$/', $string)){
				// Komma als Dezimal Separator
				// Alle Punkte entfernen und anschließend das Komma in einen Punkt umwandeln
				$string = str_replace(' ', '', $string);
				$string = str_replace('.', '', $string);
				$string = str_replace(',', '.', $string);
				return floatval($string);
			}
			elseif(preg_match('/^[0-9,-\s]*[\.]{1}[0-9-]{0,2}$/', $string)){
				// Punkt als Dezimal Separator
				// Alle Kommata entfernen
				$string = str_replace(' ', '', $string);
				$string = str_replace(',', '', $string);
				return floatval($string);
			}
			elseif(preg_match('/^[0-9.-\s]*[\.]{1}[0-9-]{0,3}$/', $string)){
				// Es gibt nur Tausender Separatoren
				// Alle Punkte enfernen
				$string = str_replace(' ', '', $string);
				$string = str_replace('.', '', $string);
				return floatval($string);
			}
			elseif(preg_match('/^[0-9,-\s]*[\,]{1}[0-9-]{0,3}$/', $string)){
				// Es gibt nur Tausender Separatoren
				// Alle Kommata enfernen
				$string = str_replace(' ', '', $string);
				$string = str_replace(',', '', $string);
				return floatval($string);
			}
			else{
				return floatval($string);
			}
		}
		else{
			return 0;
		}
	}


// Variablen setzen

$berichtnr = $_POST['userinput_ABNr'];
$name = $_POST['userinput_name'];
$abteilung = $_POST['userinput_Abtlg'];
$lehrjahr = $_POST['userinput_Lehrjahr'];
$stunden_gesamt = price2float($_POST['userinput_stdWche']);
$stunden_unterw = price2float($_POST['userinput_stdUnterw']);
$stunden_schule = price2float($_POST['userinput_stdSchule']);
$stunden_urlaub = price2float($_POST['userinput_stdUrlaub']);
$stunden_arbeit = $stunden_gesamt - $stunden_unterw - $stunden_schule - $stunden_urlaub;

$unterwText = nl2br($_POST['userinput_unterwText']);

//Kalenderwoche und Speiseplan
	$kw = (int)date('W');
	// wenn Kalenderwoche <= 9 dann füge eine 0 vorne dran.
	if ($kw <= 9)
		$kw = "0".$kw;

$stat = array("St. 01", "St. 11", "St. 15",
"St. 23", "Stroke Unit", "Chir. Amb", "ZNA", "St. 31",
"St. 34", "St. 41", "St. 44", "St. 55", "St. 51", "St. 65",
"St. 71", "St. 74", "St. 75", "St. 76", "St. 81", "St. 82",
"St. 83", "St. 84", "St. 85", "St. 86");

$rand_Station = $stat[(rand(0, 23))];
$taetigkeit = array("[$rand_Station] Aufbau eines neuen PC-Arbeitsplatzes; ",
"[$rand_Station] Austausch eines alten PC gegen einen neuen PC; ",
"[$rand_Station] Austausch PC wegen Problem; ",
"[$rand_Station] Behebung Drucker-Problem; ",
"[$rand_Station] Zusätzliches Papierfach für Drucker; ",
"[$rand_Station] Behebung PC-Problem; ",
"[$rand_Station] Austausch Drucker wegen Problem; ",
"[$rand_Station] Austausch Monitor; ",
"[$rand_Station] Austausch Fotoleitertrommel; ",
"[$rand_Station] Neuverkabelung PC-Arbeitsplatz; ",
"[$rand_Station] Aufrüsten PC mit zusätzlichem RAM; ",
"Aufnahme und Installation neuer PCs; ",
"Bearbeitung Internetauftritt; ",
"Telefonat mit DELL bezüglich Austausch Hardware; ",
"Reinigen der Werkstatt; ",
"Installation von Software für PC-Austausch; ",
"Schreiben des Wochenberichts; ",
"WLAN-Controller User-Verwaltung & Dokumentation; ");

$taetigkeitenDauer = array(0.75, 0.75, 1, 0.666, 0.5, 0.666, 0.75, 0.5, 0.333, 0.75, 0.333, 2, 2, 0.5, 1, 1, 0.75, 1.25);
$Z_stunden_arbeit = 0;

?>
<!DOCTYPE html>
<html lang="de">
<head>
		<meta charset="utf-8">
		<title>Berichtsheft-Generator</title>
		<link href="./css/yay_beauty.css" media="all" rel="stylesheet" />
</head>
<body>
<h1>Ausbildungsnachweis</h1>

<table border="0">
	<tr>
	<td width="250">Nummer:</td>
	<td colspan="3" width="380"><?php echo $berichtnr ?></td>
	</tr>
	<tr>
	<td>Name des/der Auszubildenden:</td>
	<td colspan="3"><?php echo $name ?></td>
	</tr>
	<tr>
	<td>Ausbildungsjahr:</td>
	<td colspan="3"><?php echo $lehrjahr ?></td>
	</tr>
	<tr>
	<td>Ggf. ausbildende Abteilung:</td>
	<td colspan="3"><?php echo $abteilung ?></td>
	</tr>
	<tr>
	<td>Ausbildungswoche vom:</td>
	<td>22.07.2013</td>
	<td>bis:</td>
	<td>28.07.2013</td>
	</tr>
</table>

<br />

<table>
	<tr>
	<td class="grey t_l">Betriebliche Tätigkeiten</td>
	<td class="grey t_r">Stunden</td>
	</tr>
	<tr>
	<td class="t_l text">
<?php

while ($Z_stunden_arbeit < $stunden_arbeit){
	$stat = $rand_Station;
	$taetigkeitNr = rand (0, 17);
	$rand_Station = rand (0, 23);
	
	echo $taetigkeit[$taetigkeitNr];
	$Z_stunden_arbeit = $Z_stunden_arbeit + $taetigkeitenDauer[$taetigkeitNr];
}

?>
	</td>
	<td class="t_r"><?php echo $stunden_arbeit ?> Stunden</td>
	</tr>
	<tr>
	<td class="grey t_l">Unterweisungen bzw. überbetriebliche Unterweisungen (z. B. im Handwerk),<br />betrieblicher Unterricht, sonstige Schulungen</td>
	<td class="grey t_r">Stunden</td>
	</tr>
	<tr>
	<td class="t_l text"><?php echo $unterwText ?></td>
	<td class="t_r"><?php echo $stunden_unterw ?> Stunden</td>
	</tr>
	<tr>
	<td class="grey t_l">Themen des Berufsschulunterrichts</td>
	<td class="grey t_r">Stunden</td>
	</tr>
	<tr>
	<td class="t_l text"><?php if ($stunden_schule == 0) { echo "Kein Berufsschulunterricht - Ferien"; }else{ echo "Wir nahmen folgende Themen in der Berufsschule durch."; } ?></td>
	<td class="t_r"><?php echo $stunden_schule ?> Stunden</td>
	</tr>
</table>

<p>Durch die nachfolgende Unterschrift wird die Richtigkeit und Vollständigkeit der obigen Angaben bestätigt.</p>


<div style="float: left; border-top: 2px solid black; margin-top: 50px;">
Datum, Unterschrift Auszubildende/r</div>

<div style="float: right; border-top: 2px solid black; margin-top: 50px;">
Datum, Unterschrift Ausbilder/in</div>

</body>
</html>