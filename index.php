
<!doctype html>
<html>
<head>
		<meta charset="utf-8">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<title>Berichtsheft-Generator</title>
		<link href="yay_beauty.css" media="all" rel="stylesheet" />
</head>
<body>
<h1>Ausbildungsnachweis-Generator</h1>

<form action="ausgabe.php" method="post">
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="userinput_name" value="Mensch" onblur="if(this.value == '') { this.value='Mensch'}" onfocus="if (this.value == 'Mensch') {this.value=''}"/></td>
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
<td><input type="text" name="userinput_stdWche" value="38.5" onclick="this.value='';" /></td>
</tr>
<tr>
<td>Ausbildungsnachweis-Nr:</td>
<td><input type="text" name="userinput_ABNr"  value="1" onblur="if(this.value == '') { this.value='1'}" onfocus="if (this.value == '1') {this.value=''}"/></td>
</tr>
<tr>
<td>Urlaub in dieser Woche (in Stunden):</td>
<td><input type="number" name="userinput_stdUrlaub" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Betriebliche Unterweisungem (in Stunden):</td>
<td><input type="number" name="userinput_stdUnterw" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Berufsschule (in Stunden):</td>
<td><input type="number" name="userinput_stdSchule" value="0" onblur="if(this.value == '') { this.value='0'}" onfocus="if (this.value == '0') {this.value=''}"/></td>
</tr>
<tr>
<td>Text:</td>
<td><textarea name="userinput_unterwText" cols="30" rows="8"></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Bericht erstellen" /></td>
</tr>
</table>



</form>


<footer><p>version 0.1.1 • Last change: 2013-08-29</p></footer>
</body>
</html>