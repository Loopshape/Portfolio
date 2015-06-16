.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _Apps:

Apps anlegen
============


Twitter
-------

1. Bei Twitter Anmelden und https://apps.twitter.com/app/new aufrufen.
2. Die 4 Eingabefelder ausfüllen.
   Neben den Pflichtfeldern ist die Callback URL sehr wichtig!
   Hier einfach die URL der Webseite angeben.
3. Im Tab Permissions *Read and Write* aktivieren 
   und die Änderung mit einem Klick auf *Update settings* bestätigen.
4. Nach dem Speichern in den Tab *API Keys* wechseln.
5. Den Button *Create my access token*
   unter Umständen muss dies wiederholt werden,
   bis der Bereich *Your access token* gefüllt ist.
6. Für eine reibungslose Übertragung der Daten 
   werden folgende Schlüssel
   benötigt: *API key*, *API secret*, *Access token*, *Access token secret*


XING
----

1. Bei XING anmelden und https://dev.xing.com/applications/ aufrufen
2. Über den Button *Create app* eine neue Applikation anlegen.
3. Den Namen über den Stift anpassen.
4. *Get a production key* klicken.
5. Die Berechtigung *Status message* aktivieren.
6. Alle weiteren Felder ausfüllen (wieder auf die Callback URL achten).
7. Für den nächsten Schritt ist die Bestellung des Production Keys notwendig.
   Diese wird von XING Manuell geprüft und freigegeben.
   Alternativ ist das Nutzen der App über den Test Key ebenfalls möglich.
   in diesem Fall werden folgende Schlüssel
   benötigt: *Consumer key*, *Consumer secret*


Facebook
--------

1. Bei Facebook anmelden und https://developers.facebook.com/apps/ aufrufen
2. Auf *Create New App* klicken und die Felder ausfüllen
3. Über den Button *+ Platform hinzufügen* die Webseite-URL ergänzen.
4. Für die Konfiguration werden folgende Schlüssel
   benötigt: *App-ID*, *Anwendungs-Geheimcode*

pushd
-----

Installieren Sie den Dienst auf ihrem Server.
Download: https://github.com/rs/pushd
Die Absicherung der Zugriffe erfolgt in der Konfiguration von pushd. Mit 
folgendem Eintrag in der settings.coffee limitieren Sie das Posten von 
Nachrichten auf den lokalen Server: 

.. code-block:: ts

   exports.server =
       acl:
           # restrict publish access to private networks
           publish: ['127.0.0.1']
Im Account-Datensatz muss dann lediglich die URI des Servers im Feld 
*Configurations* eingeben werden:

.. code-block:: ts

   pushd {
     connection = tx_t3socials_network_pushd_Connection
     url = http://localhost:8180/
