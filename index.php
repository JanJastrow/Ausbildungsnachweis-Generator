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
      .....           .....
  ,ad8PPPP88b,     ,d88PPPP8ba,
 d8P"      "Y8b, ,d8P"      "Y8b
dP'           "8a8"           `Yd
8(              "              )8
I8                             8I
 Yb,                         ,dP
  "8a,                     ,a8"
    "8a,                 ,a8"
      "Yba             adP"			Love you, guys!
        `Y8a         a8P'
          `88,     ,88'
            "8b   d8"
             "8b d8"
              `888'
                "
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
<td><input type="text" name="userinput[Name]" value="Ein Mensch" onblur="if(this.value == '') { this.value='Ein Mensch'}" onfocus="if (this.value == 'Ein Mensch') {this.value=''}"/></td>
</tr>
<tr>
<td>Ausbildungsjahr:</td>
<td><input type="text" name="userinput[Lehrjahr]" value="1" onblur="if(this.value == '') { this.value='1'}" onfocus="if (this.value == '1') {this.value=''}"/></td>
</tr>
<tr>
<td>Ausbildene Abteilung:</td>
<td><input type="text" name="userinput[Abtlg]" value="EDV-Abteilung" onblur="if(this.value == '') { this.value='EDV-Abteilung'}" onfocus="if (this.value == 'EDV-Abteilung') {this.value=''}"/></td>
</tr>
<tr>
<td>Ausbildungswoche:</td>
<td><input type="number" name="userinput[Woche]"  value="1" onblur="if(this.value == '') { this.value='1'}" onfocus="if (this.value == '1') {this.value=''}"/></td>
</tr>
<tr>
<td>Gesamte Arbeitszeit pro Woche:</td>
<td><input type="text" name="userinput[stdWche]" value="38.5" onclick="this.value='';" onblur="if(this.value == '') { this.value='38.5'}" onfocus="if (this.value == '38.5') {this.value=''}" /></td>
</tr>
<tr>
<td>Ausbildungsnachweis-Nr:</td>
<td><input type="number" step="1" min="1" name="userinput[ABNr]"  value="1" onblur="if(this.value == '') { this.value='1'}" onfocus="if (this.value == '1') {this.value=''}"/></td>
</tr>
<tr>
<td>Urlaub in dieser Woche (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput[stdUrlaub]" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Betriebliche Tätigkeiten:</td>
<td><textarea name="userinput[taetigkeiten]" cols="29" rows="8" ></textarea></td>
</tr>
<tr>
<td>CSV-Import von Tätigkeiten:</td>
<td><input type="file" name="userinput_csv" /></td>
</tr>
<tr>
<td>Berufsschule (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput[stdSchule]" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Themen des Berufsschulunterrichts:</td>
<td><textarea name="userinput[schuleText]" cols="29" rows="8" ></textarea></td>
</tr>
<tr>
<td>Betriebliche Unterweisungen (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput[stdUnterw]" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Betriebliche Unterweisungen:</td>
<td><textarea name="userinput[unterwText]" cols="29" rows="8" ></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Bericht erstellen" /></td>
</tr>
</table>

</form>


<footer><p class="footer">Ausbildungsnachweis-Generator v0.2.0 by <a href="http://schwerkraftlabor.de/blog/kontact" target="_blank">@Gehirnfussel</a> — <a href="https://github.com/Gehirnfussel/Ausbildungsnachweis-Generator" target="_blank">source</a> — <a href="http://opensource.org/licenses/mit-license.php" target="_blank">license</a></p></footer>
</body>
</html>