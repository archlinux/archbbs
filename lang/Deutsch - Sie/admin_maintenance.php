<?php

// Sprachdefinitionen, die in admin_maintenance.php verwendet werden
$lang_admin_maintenance = array(

'Maintenance head'				=>	'Foren-Wartung',
'Rebuild index subhead'			=>	'Suchindex neu erstellen',
'Rebuild index info'			=>	'Wenn Sie in der Datenbank manuell Beiträge gelöscht, bearbeitet oder entfernt haben oder Probleme mit der Suche haben, sollten Sie den Suchindex neu erstellen. Für eine optimale Performance sollten Sie das Forum während der Neuerstellung des Suchindex in den Wartungsmodus versetzen. <strong>Die Neuerstellung des Suchindex kann längere Zeit in Anspruch nehmen und wird dabei die Auslastung des Servers erhöhen!</strong>',
'Posts per cycle label'			=>	'Beiträge pro Durchlauf',
'Posts per cycle help'			=>	'Die Anzahl der Beiträge, die pro Seitenansicht verarbeitet werden sollen. Wenn Sie zum Beispiel 100 eingeben, werden die ersten einhundert Beiträge verarbeitet und dann die Seite neu geladen. Dies verhindert einen Zeitüberschreitungsfehler während der Neuindizierung.',
'Starting post label'			=>	'Mit Beitrags-ID beginnen',
'Starting post help'			=>	'Die Beitrags-ID, bei der mit der Neuerstellung des Suchindex begonnen werden soll. Der voreingestellte Wert ist die erste, in der Datenbank vorhandene ID. Normalerweise müssen Sie diesen Wert nicht ändern.',
'Empty index label'				=>	'Index löschen',
'Empty index help'				=>	'Aktivieren Sie dieses Kontrollfeld, wenn der Suchindex vor dessen Neuerstellung geleert werden soll.',
'Rebuild completed info'		=>	'Wenn der Prozess abgeschlossen ist, werden Sie auf diese Seite weitergeleitet. Bevor Sie mit der Neuindizierung beginnen, sollten Sie unbedingt JavaScript aktivieren (für die automatische Weiterleitung, wenn ein Durchlauf abgeschlossen wurde). Wenn Sie die Neuindizierung abbrechen möchten, notieren Sie sich die zuletzt verarbeitete Beitrags-ID und geben diese ID+1 dann im Feld "Mit dieser Beitrags-ID beginnen" ein, wenn Sie die Neuindizierung fortsetzen (Das Kontrollfeld "Index löschen" darf dann nicht aktiviert werden).',
'Rebuild index'					=>	'Index neu erstellen',
'Rebuilding search index'		=>	'Der Suchindex wird neu erstellt',
'Rebuilding index info'			=>	'Der Suchindex wird jetzt neu erstellt. Daher haben Sie nun etwas Zeit für eine kleine Kaffeepause :-)',
'Processing post'				=>	'Der Beitrag <strong>%s</strong> im Thema <strong>%s</strong> wird verarbeitet',
'Click here'					=>	'Hier klicken',
'Javascript redirect failed'	=>	'Die JavaScript-Weiterleitung ist fehlgeschlagen. %s um weiterzumachen …',

);
