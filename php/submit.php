<h3>$_GET:</h3>
<pre><?php print_r($_GET);?></pre>
<br>
<h3>$_POST:</h3>
<pre><?php print_r($_POST);?></pre>


<!--


Die GET-Methode erzeugt eine lange Zeichenkette, die in den Serverprotokollen im Feld Location: 
des Browsers erscheint.
Die GET-Methode ist auf das Senden von bis zu 1024 Zeichen beschränkt.
Verwende niemals die GET-Methode, wenn du ein Passwort oder andere sensible 
Informationen an den Server senden willst.
GET kann nicht verwendet werden, um binäre Daten, wie Bilder oder Word-Dokumente, 
an den Server zu senden.
Auf die von der GET-Methode gesendeten Daten kann über die Umgebungsvariable 
QUERY_STRING zugegriffen werden.
Das PHP stellt $_GET assoziatives Array zur Verfügung, um auf alle 
gesendeten Informationen mit der GET-Methode zuzugreifen.

Die POST-Methode hat keine Einschränkung der zu sendenden Datenmenge.
Die POST-Methode kann sowohl zum Senden von ASCII- als auch von Binärdaten verwendet werden.
Die von der POST-Methode gesendeten Daten durchlaufen den HTTP-Header, so dass die Sicherheit 
vom HTTP-Protokoll abhängt. Durch die Verwendung von Secure HTTP kannst du sicherstellen, 
dass deine Daten sicher sind.
Das PHP stellt $_POST assoziatives Array zur Verfügung, um auf alle gesendeten Informationen 
mit der POST-Methode zuzugreifen.

-->