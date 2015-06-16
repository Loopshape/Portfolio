.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _developer-manual:

Developer manual
================

Dieser Abschnitt soll einen kurzen Überblick über die technische Umsetzung
und mögliche Erweiterungen von T3 SOCIALS zeigen. Das soll am Beispiel
des implementierten automatischen Versands der News-Meldungen 
über das Netzwerk Twitter erfolgen.

Um den Automatismus kümmert sich komplett T3 SOCIALS.
Neue Netzwerke oder Trigger müssen dies nicht mit beachten!

Der Service wird von einem Trigger über eine neue Nachricht informiert.

Beispielsweise fängt der Trigger für News beim Speichern einer neuen
Nachricht diese ab, wandelt den Datensatz in eine generische Message um 
und gibt diese Message an den Service weiter. Dies geschieht nur,
wenn der Datensatz nicht gelöscht, nicht versteckt
und noch nicht über einen Account verteilt wurde.

Der Service nimmt die Message entgegen, bereitet diese auf
und verteilt diese an alle konfigurierten Netzwerke.
Dies sind alle Netzwerke deren :ref:`accounts` für diesen 
Trigger definiert sind.

Die Netzwerke nehmen die Message wiederum entgegen, bauen die Statusmeldung 
zusammen und geben diese an die entsprechenden Dienste weiter.

Das Zusammenbauen der Nachricht macht jedes Netzwerk speziell für den 
verwendeten Dienst.
Für Twitter darf die Nachricht beispielsweise nur 160 Zeichen groß sein.
Für die Umwandlung der Nachricht verwendet die Netzwerk-Instanz einen
Message-Builder. Man kann per Konfiguration in dem Account
auch einen eigenen Message-Builder definieren.

.. code-block:: ts

   pushd.liveticker.builder = tx_more4t3sports_util_PushdMessageBuilder

Nach dem Versand markiert der Service diesen Datensatz als versendet. Er
wird damit automatisch nicht erneut verteilt.


Die Network-Instanz hat nun die Aufgabe, die generische Message in eine konkrete,
für das jeweilige Netzwerk sinnvolle Nachricht zu übersetzen.
Die Twitter-Instanz wird also aus den Daten der Nachricht einen 160 Zeichen 
langen String, ggf. mit Link erstellen.
Die Instanz für pushd wird dagegen keine Links verschicken,
da dies für die Notifications nicht sinnvoll ist.

Für die Umwandlung der Nachrichten verwenden die Network-Instanzen MessageBuilder.
Es wird immer ein Default-Builder mitgeliefert!
Zumindest bei den in T3 SOCIALS integrierten Netzwerken ist es möglich,
in speziellen Fällen weitere Builder per Konfiguration festzulegen.


.. toctree::
   :maxdepth: 5
   :titlesonly:
   :glob:

   Network
   Trigger
