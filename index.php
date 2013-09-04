<?php

if(isset($_COOKIE['Data'])) {
	$rawdata = ($_COOKIE['Data']);
	$data = explode(" ✙ ", $rawdata);
} else {
	$data = array(1, 	#0 Berichtsnummer
	"Dein Name", 		#1 Name
	"EDV-Abteilung",	#2 Abteilung
	1,					#3 Lehrjahr
	1,					#4 Kalenderwoche
	38.5,				#5 Gesamt-Arbeitsstunden pro Woche
	0,					#6 Arbeitsstunden Unterweisung
	0,					#7 Arbeitsstunden Schule
	0);					#8 Arbeitsstunden Urlaub
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
<header>
	<h1 class="title">Ausbildungsnachweis-Generator</h1>
</header>
<article class="info cf">
	<img src="logo.svg" class="logo" />
	<p>Diese Software ist nicht zur tatsächlichen Verwendung in einer Ausbildung bestimmt.<br />
	Ich übernehme keine Verantwort für die Verwendung der Software oder deren Ergebnisse.</p>
	<p>Dies ist ein freies <a href="http://schwerkraftlabor.de/">Schwerkraftlabor</a>-Projekt und ist unter der MIT Lizenz veröffentlicht.</p>
</article>

<form action="ausgabe.php" method="post" enctype="multipart/form-data">
<table>
<tr>
<td>Vor- und Nachname:</td>
<td><input type="text" name="userinput[Name]" value="<?php echo $data[1]; ?>"/></td>
</tr>
<tr>
<td>Ausbildungsjahr:</td>
<td><input type="text" name="userinput[Lehrjahr]" value="<?php echo $data[3]; ?>"/></td>
</tr>
<tr>
<td>Ausbildene Abteilung:</td>
<td><input type="text" name="userinput[Abtlg]" value="<?php echo $data[2]; ?>"/></td>
</tr>
<tr>
<td>Kalenderwoche:</td>
<td><input type="number" name="userinput[Woche]" value="<?php echo $data[4]; ?>"/></td>
</tr>
<tr>
<td>Gesamte Arbeitszeit pro Woche:</td>
<td><input type="text" name="userinput[stdWche]" value="<?php echo $data[5]; ?>"/></td>
</tr>
<tr>
<td>Ausbildungsnachweis-Nr:</td>
<td><input type="number" step="1" min="1" name="userinput[ABNr]" value="<?php echo $data[0]; ?>"/></td>
</tr>
<tr>
<td>Urlaub in dieser Woche (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput[stdUrlaub]" value="<?php echo $data[8]; ?>"/></td>
</tr>
<tr>
<td>Betriebliche Tätigkeiten:</td>
<td><textarea name="userinput[taetigkeiten]" cols="29" rows="8" ></textarea></td>
</tr>
<tr>
<td>Tätigkeiten autom. aus CSV generieren?</td>
<td><input type="checkbox" name="Generate" value="Ja" /></td>
</tr>
<tr>
<td>CSV-Import von Tätigkeiten:</td>
<td><input type="file" name="userinput_csv" /><p class="smalltext">Wenn keine Datei ausgewählt wird,<br />wird stattdessen eine lokale <a href="imland.csv" target="_blank">Beispiel-Datei</a> geladen.</p></td>
</tr>
<tr>
<td>Berufsschule (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput[stdSchule]" value="<?php echo $data[7]; ?>"/></td>
</tr>
<tr>
<td>Themen des Berufsschulunterrichts:</td>
<td><textarea name="userinput[schuleText]" cols="29" rows="8" ></textarea></td>
</tr>
<tr>
<td>Betriebliche Unterweisungen (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput[stdUnterw]" value="<?php echo $data[6]; ?>"/></td>
</tr>
<tr>
<td>Betriebliche Unterweisungen:</td>
<td><textarea name="userinput[unterwText]" cols="29" rows="8" ></textarea></td>
</tr>
<tr>
<td>Daten in Cookie speichern?</td>
<td><input type="checkbox" name="Kekse" value="Ja" /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Bericht erstellen" /></td>
</tr>
</table>

</form>


<footer><p class="footer">Ausbildungsnachweis-Generator v0.3.1 by <a href="http://schwerkraftlabor.de/blog/kontact" target="_blank">@Gehirnfussel</a> — <a href="https://github.com/Gehirnfussel/Ausbildungsnachweis-Generator" target="_blank">source</a> — <a href="http://opensource.org/licenses/mit-license.php" target="_blank">license</a></p></footer>
</body>
</html>