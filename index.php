
<!DOCTYPE html>
<html lang="de">
<head>
		<meta charset="utf-8">
		<title>Berichtsheft-Generator</title>
		<link href="./css/yay_beauty.css" media="all" rel="stylesheet" />
</head>
<body>
<header>
	<h1 class="title">Ausbildungsnachweis-Generator</h1>
</header>

<form action="ausgabe.php" method="post">
<table>
<tr>
<td>Vor- und Nachname:</td>
<td><input type="text" name="userinput_name" value="Ein Mensch" onblur="if(this.value == '') { this.value='Ein Mensch'}" onfocus="if (this.value == 'Ein Mensch') {this.value=''}"/></td>
</tr>
<tr>
<td>Ausbildungsjahr:</td>
<td><input type="text" name="userinput_Lehrjahr" value="1" onblur="if(this.value == '') { this.value='1'}" onfocus="if (this.value == '1') {this.value=''}"/></td>
</tr>
<tr>
<td>Ausbildene Abteilung:</td>
<td><input type="text" name="userinput_Abtlg" value="EDV-Abteilung" onblur="if(this.value == '') { this.value='EDV-Abteilung'}" onfocus="if (this.value == 'EDV-Abteilung') {this.value=''}"/></td>
</tr>
<tr>
<td>Ausbildungswoche:</td>
<td><input type="week" name="userinput_Woche"  value="1" onblur="if(this.value == '') { this.value='1'}" onfocus="if (this.value == '1') {this.value=''}"/></td>
</tr>
<tr>
<td>Gesammte Arbeitszeit pro Woche:</td>
<td><input type="text" name="userinput_stdWche" value="38.5" onclick="this.value='';" onblur="if(this.value == '') { this.value='38.5'}" onfocus="if (this.value == '38.5') {this.value=''}" /></td>
</tr>
<tr>
<td>Ausbildungsnachweis-Nr:</td>
<td><input type="number" step="1" min="1" name="userinput_ABNr"  value="1" onblur="if(this.value == '') { this.value='1'}" onfocus="if (this.value == '1') {this.value=''}"/></td>
</tr>
<tr>
<td>Urlaub in dieser Woche (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput_stdUrlaub" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Berufsschule (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput_stdSchule" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Themen des Berufsschulunterrichts:</td>
<td><textarea name="userinput_schuleText" cols="29" rows="8" ></textarea></td>
</tr>
<tr>
<td>Betriebliche Unterweisungen (in Stunden):</td>
<td><input type="number" step="any" min="0"  name="userinput_stdUnterw" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Betriebliche Unterweisungen:</td>
<td><textarea name="userinput_unterwText" cols="29" rows="8" ></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Bericht erstellen" /></td>
</tr>
</table>

</form>


<footer><p>version 0.1.2 — Last change: 2013-08-29</p></footer>
</body>
</html>