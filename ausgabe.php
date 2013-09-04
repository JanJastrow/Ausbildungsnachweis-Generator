<?php
error_reporting (E_ALL | E_STRICT);
ini_set ('display_errors' , 1);

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

$berichtnr = $_POST['userinput']['ABNr'];
$name = $_POST['userinput']['Name'];
$abteilung = $_POST['userinput']['Abtlg'];
$lehrjahr = $_POST['userinput']['Lehrjahr'];
$woche = $_POST['userinput']['Woche'];

date_default_timezone_set('Europe/Berlin');
$dt = new DateTime; 

$stunden_gesamt = price2float($_POST['userinput']['stdWche']);
$stunden_unterw = price2float($_POST['userinput']['stdUnterw']);
$stunden_schule = price2float($_POST['userinput']['stdSchule']);
$stunden_urlaub = price2float($_POST['userinput']['stdUrlaub']);
$stunden_arbeit = $stunden_gesamt - $stunden_unterw - $stunden_schule - $stunden_urlaub;

$unterwText = nl2br($_POST['userinput']['unterwText']);
$schuleText = nl2br($_POST['userinput']['schuleText']);
$taetigkeiten = nl2br($_POST['userinput']['taetigkeiten']);


// Soll CSV importiert werden?
if (isset($_POST['Generate'])) {
	$generate = $_POST['Generate'];
} else {
	$generate = "Nein";
}

// CVS Import for the random data
$csv = "imland.csv";
if (isset($_GET['userinput_csv'])) {

} else {
	if ($_FILES['userinput_csv']['tmp_name'] != "") {
		$csv = $_FILES['userinput_csv']['tmp_name'];
	}
}

// CSV in $csvdata Array importieren

if (($handle = fopen($csv, "r")) !== FALSE) {
    # Set the parent multidimensional array key to 0.
    $nn = 0;
    while (($data = fgetcsv($handle, 200, ";")) !== FALSE) {
        # Count the total keys in the row.
        $c = count($data);
        # Populate the multidimensional array.
        for ($x=0;$x<$c;$x++)
        {
            $csvdata[$nn][$x] = $data[$x];
        }
        $nn++;
    }
    # Close the File.
    fclose($handle);
}


// Cookies
// Check ob Cookie gesetzt werden soll
if (isset($_POST['Kekse'])) {
	$kekse = $_POST['Kekse'];
} else {
	$kekse = "Nein";
}
// Cookie mit Daten des Formulars setzen
if ($kekse == "Ja") {
	setcookie("Data", "$berichtnr ✙ $name ✙ $abteilung ✙ $lehrjahr ✙ $woche ✙ $stunden_gesamt ✙ $stunden_unterw ✙ $stunden_schule ✙ $stunden_urlaub");
}


?>
<!DOCTYPE html>
<html lang="de">
<head>
		<meta charset="utf-8">
		<title>Berichtsheft-Generator</title>
		<link href="./css/yay_beauty.css" media="all" rel="stylesheet" />
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<!--[if lt IE 9]>
			<script src="components/html5shiv/html5shiv.js"></script>
		<![endif]-->
</head>
<!--
                    `@@@@@@@@@@@@@@@@@@@@@@@,
                   #@@@@@@@@@@@@@@@@@@@@@@@@@@
                   @@@                     @@@
                   ;@@@#',              ;#@@@@
                     '#@@'             `@@@+´
                       @@+             `@@:
                       @@+             .@@:
                      `@@+             .@@:
 Schwerkraftlabor.de  `@@+             .@@:
                      `@@+             .@@;
                      .@@'             `@@;
                      .@@'             `@@'
                      .@@'             `@@'
                      .@@'             `@@+
                      '@@'             `@@@
                     @@@@`              @@@@
                    @@@#                 ;@@@,
                  ,@@@,                   `@@@+
                 '@@@                       @@@@
                #@@@                         @@@@
               @@@@                           +@@@
              @@@@                             ;@@@
             @@@#                               :@@@
            @@@#                                 :@@@
           @@@#                                   :@@@
          #@@@                                     ;@@@
         +@@@                                       +@@@
        ,@@@                             @@          @@@+
        @@@                      ,@@@@   @'           @@@,
       @@@                +@@@.  @@ '@+ +@  ,,         @@@
      @@@:         `     @@+;@@# @@  @@ @@:@@@@`        @@@
     ,@@@        :@@#   +@@   @@``@@`@@.@`@@  @@        ;@@#
     @@@        '@@@@   '@@   @@@ `@@' @@ :@# @@         @@@.
    @@@`       ;@# @@.   @@   .@@      @'  @@#@@          @@@
   `@@#            @@@   @@@   @@     '@    .;`      `,::,,@@;
   @@@             ,@@   `@@: :@@     #:       `,::::::::: @@@
  .@@:              @@;   `@@@@@         `.:::::::::::::::: @@\
  @@@               @@@            `.::::::::::::::::::::::`@@@
 .@@;               `;`       .,:::::::::::::::::::::::::::: @@\
 @@@                    .,:::::::::::::::::::::::::::::::::: @@@
 @@@              .,::::::::::::::::::::::::::::::::::::::::,'@@\
:@@;        `,::::::::::::::::::::::::::::::::::::::::::::::: @@#
#@@.  `,::::::::::::::::::::::::::::::::::::::::::::::::::::: @@@
+@@.::::::::::::::::::::::::::::::::::::::::::::::::::::::::: @@@
 @@@ :::::::::::::::::::::::::::::::::::::::::::::::::::::::`#@@'
 +@@@ .:::::::::::::::::::::::::::::::::::::::::::::::::::, #@@@
  ;@@@@. ,::::::::::::::::::::::::::::::::::::::::::::::``#@@@#
    #@@@@@'` `,::::::::::::::::::::::::::::::::::::.  ;@@@@@@
      :@@@@@@@@#;.  ``.,,::::::::::::::::,..`  .:+@@@@@@@@'
         `+@@@@@@@@@@@@@@@###++'''++###@@@@@@@@@@@@@@@#.
               .:+#@@@@@@@@@@@@@@@@@@@@@@@@@@@@+;.
                           ``.......´´
-->
<body>
<h1>Ausbildungsnachweis</h1>

<div id="output">
<table border="0" id="output">
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
	<td><?php $dt->setISODate(date('Y'), $woche, 1); echo $dt->format('d.m.Y '); ?></td>
	<td>bis:</td>
	<td><?php $dt->setISODate(date('Y'), $woche, 7); echo $dt->format('d.m.Y '); ?></td>
	</tr>
</table>
<br />

<table>
	<tr>
	<td class="grey t_l">Betriebliche Tätigkeiten</td>
	<td class="grey t_r">Stunden</td>
	</tr>
	<tr>
	<td class="t_l">
<?php

if ($taetigkeiten == "" && $generate == "Ja"){

	$Z_stunden_arbeit = 0;
	while ($Z_stunden_arbeit < $stunden_arbeit){
		$taetigkeitNr = rand (0, 17);
		if ($csvdata[$taetigkeitNr][3] == 0) {
			echo $csvdata[$taetigkeitNr][0]."; ";
		} else {
			$statnr = rand (0, 23);
			$stat = array("St. 01", "St. 11", "St. 15",
							"St. 23", "Stroke Unit", "Chir. Amb", "ZNA", "St. 31",
							"St. 34", "St. 41", "St. 44", "St. 55", "St. 51", "St. 65",
							"St. 71", "St. 74", "St. 75", "St. 76", "St. 81", "St. 82",
							"St. 83", "St. 84", "St. 85", "St. 86");

			echo "[$stat[$statnr]] ".$csvdata[$taetigkeitNr][0]."; ";
		}
		$Z_stunden_arbeit = $Z_stunden_arbeit + $csvdata[$taetigkeitNr][1];
	}
} else {
	echo $taetigkeiten;
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
	<td class="t_l"><?php if ($stunden_unterw == 0) { echo "-"; }else{ echo $unterwText; } ?></td>
	<td class="t_r"><?php echo $stunden_unterw ?> Stunden</td>
	</tr>
	<tr>
	<td class="grey t_l">Themen des Berufsschulunterrichts</td>
	<td class="grey t_r">Stunden</td>
	</tr>
	<tr>
	<td class="t_l"><?php if ($stunden_schule == 0) { echo "Kein Berufsschulunterricht - Ferien"; }else{ echo $schuleText; } ?></td>
	<td class="t_r"><?php echo $stunden_schule ?> Stunden</td>
	</tr>
</table>
</div>

<p>Durch die nachfolgende Unterschrift wird die Richtigkeit und Vollständigkeit der obigen Angaben bestätigt.</p>

<div style="float: left; border-top: 2px solid black; margin-top: 50px;">
Datum, Unterschrift Auszubildende/r</div>

<div style="float: right; border-top: 2px solid black; margin-top: 50px;">
Datum, Unterschrift Ausbilder/in</div>

</body>
</html>