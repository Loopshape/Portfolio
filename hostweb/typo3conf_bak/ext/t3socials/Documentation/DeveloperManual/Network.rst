.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _netzwerke:

Netzwerke
=========

Ein Netzwerk in T3 SOCIALS ist die Schnittstelle zwischen T3 SOCIALS und dem
Service des entgegennehmenden Dienstes, wie die Twitter API.

Für die bereits implementierten Dienste, nutzt T3 SOCIALS,
abgesehen von pushed,
die freie Open Source Bibliothek HybridAuth in Version 2.1.2:
http://hybridauth.sourceforge.net/


Um ein Netzwerk für T3 SOCIALS zu registrieren, sind aktuell 3 Dinge notwendig:

1. :ref:`network-connection`
2. :ref:`network-message-builder`
3. :ref:`network-config`


.. _network-connection:

Connection
----------

Für die eigentliche Connection hat man nun mehrere Möglichkeiten.
Entweder nutzt man einen bereits in der HybridAuth enthaltenen Provider
oder man kümmert sich selbst um Dinge wie die Authentifizierung und 
das Posten von Meldungen.

Aktuell bei HybridAuth enthaltene Provider sind unter
EXT:t3socials/lib/hybridauth/Hybrid/Providers
zu finden.

Eine weitere Option wäre, eine komplett eigenständige Connection zu erstellen.
Diese muss dann lediglich das Interface *tx_t3socials_network_IConnection*
implementieren. Auf diese Möglichkeit wird hier allerdings nicht weiter 
eingegangen.

HybridAuth
^^^^^^^^^^

Für die erste Variante ist der geringste Aufwand notwendig.
Hierfür müssen wir lediglich eine Klasse erzeugen,
welche von der Basisklasse *tx_t3socials_network_hybridauth_Connection*
erbt und die aktuell einzig notwenige Methode *getBuilderClass* besitzt.
Die Methode *getBuilderClass* muss den Klassennamen des Message-Builder
liefern. Mehr dazu im Abschnitt :ref:`network-message-builder`.

.. code-block:: php

   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_network_hybridauth_Connection');
   class tx_t3socials_network_tritter_Connection
      extends tx_t3socials_network_hybridauth_Connection {
      protected function getBuilderClass() {
         return 'tx_t3socials_network_twitter_MessageBuilder';
      }
   }

Alles weitere wird von der Basisklasse und
der noch anzulegenden Konfiguration erledigt.


Classic
^^^^^^^

Für die zweite Variante ist etwas mehr zu tun.
Dafür müssen wir eine neue Klasse anlegen,
welche von der Basisklasse *tx_t3socials_network_Connection* erbt.
Unsere neue Klasse muss nun die Methoden *getBuilderClass*
und *setUserStatus* besitzen.
Die Methode *setUserStatus* ist letztendlich dafür zuständig,
eine von T3 SOCIALS bzw. vom Message-Builder erzeugte Nachricht
an den Dienst zu verteilen:


.. code-block:: php

   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_network_Connection');
   class tx_t3socials_network_twitter_Connection
      extends tx_t3socials_network_Connection {
      protected function getBuilderClass() {
         return 'tx_t3socials_network_twitter_MessageBuilder';
      }
      public function setUserStatus($message) {
         // POST
         //     https://api.twitter.com/1.1/statuses/update.json
         // POST Data
         //     status=$message
      }
   }


.. _network-message-builder:

Message-Builder
---------------

Der Message-Builder ist dafür zuständig,
aus der von T3 SOCIALS erzeugten generischen Nachricht,
eine für den Dienst verarbeitbare Nachricht zu erzeugen.
In den meisten Fällen wird dies direkt ein String
mit der enthaltenen Nachricht sein.
Für einige Dienste ist es allerdings auch möglich, andere Datentypen
wie ein Array zu erzeugen.
Ein Beispiel dafür ist Facebook, da wird die Nachricht separat zur URL versendet.

Ein Message-Builder ist nicht zwingend notwendig, wenn eine eigene Connection,
ohne Ableitung einer bereits existierenden Basisklasse genutzt wird.

Ein Message-Builder muss immer von
der Klasse *tx_t3socials_network_MessageBuilder* ableiten.
Wenn keine weiteren Anforderungen an die zu sendende Nachricht besteht,
kann auch direkt diese Basisklasse als Message-Builder nutzen.

Die Basisklasse baut die Nachricht bereits aus allen vorhandenen Daten
wie Headline, Intro, Message und URL zusammen.

Dabei werden bereits Angaben wie contentDelimiter, maxContentLength
und cropAfterString beachtet.
Mit dem contentDelimiter werden die einzelnen Daten zusammengefügt.
Mit maxContentLength wird die Maximallänge definiert.
Bei Twitter sind dies 140 Zeichen.
Bei cropAfterString kann ein String angegeben werden,
welcher nach dem Abschneiden der Daten an die Nachricht angehängt wird.

Hier ein Beispiel des Builders für Twitter:

.. code-block:: php

   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_network_MessageBuilder');
   class tx_t3socials_network_twitter_MessageBuilder
      extends tx_t3socials_network_MessageBuilder {
      protected function getContentDelimiter(tx_t3socials_models_IMessage $message) {
         return ': ';
      }
      protected function getMaxContentLength(tx_t3socials_models_IMessage $message) {
         $url = trim($message->getUrl());
         return $url ? 120 : 140;
      }
   }



Bei den in T3 SOCIALS integrierten Netzwerken und allen Netzwerken,
welche von der Basisklasse *tx_t3socials_network_Connection* erben,
ist es möglich in speziellen Fällen
weitere Builder per Konfiguration festzulegen.

Die Konfiguration für einen speziellen Message-Builder für ein Account
würde wie folgt Aussehen:

.. code-block:: ts

   twitter {
      builder = Tx_Myext_Builder_SpecialTwitter  
   }

Die Klasse *Tx_Myext_Builder_SpecialTwitter* muss existieren und von
der Klasse *tx_t3socials_network_MessageBuilder* erben.


.. _network-config:

Configuration
-------------

Eine Netzwerkkonfiguration wird zum einen dafür verwendet,
um die Connection zu konfigurieren.
Und zum anderen, um das Netzwerk bei T3 SOCIALS zu registrieren.

Die Konfiguration muss immer über das Basismodel
*tx_t3socials_models_NetworkConfig* geschehen.

Entweder man legt nun eine eigene Klasse an, welche von dem Basismodel erbt
und die Konfiguration enthält, oder man nutzt einfach das Basismodel
und setzt darin die Konfiguration.


Hier ein Beispiel mit eigener Klasse:

.. code-block:: php

   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_models_NetworkConfig');
   class tx_t3socials_network_twitter_NetworkConfig
      extends tx_t3socials_models_NetworkConfig {
      protected function initConfig() {
         parent::initConfig();
         $this->setProperty('provider_id', $this->uid = 'twitter');
         $this->setProperty('hybridauth_provider', 'Twitter');
         $this->setProperty('connector', 'tx_t3socials_network_twitter_Connection');
         $this->setProperty('description',
            'Please enter the customer key into the field "Username"' .
            ' and the customer secret into the field "Password".'
         );
         $this->setProperty('default_configuration',
            'twitter {' . CRLF .
               '  access_token =' . CRLF .
               '  access_token_secret =' . CRLF .
            '}'
         );
      }
   }



Mögliche Optionen der Konfiguration:

.. container:: table-row

    Property
        provider_id *
   
    Default
        NULL
        
    Description
        Eine eindeutige unique ID für das Netzwerk.

.. container:: table-row

    Property
        hybridauth_provider
   
    Default
        NULL
        
    Description
         Der Name des HybridAuth Providers.
         Dies ist nur notwendig, wenn der Connector von der Basisklasse
         *tx_t3socials_network_hybridauth_Connection* erbt.

.. container:: table-row

    Property
        connector *
   
    Default
        NULL
        
    Description
         Enthält den Klassennamen des Connectors. Siehe :ref:`network-connection`.

.. container:: table-row

    Property
        communicator
   
    Default
        NULL
        
    Description
         Enthält den Klassennamen des Communicators.
         Der Communicator wird für das Modul von T3 SOCIALS verwendet,
         um direkt Nachrichten nur an diesen einen Dienst zu versenden.
         Dieser ist Optional und nicht notwendig.

.. container:: table-row

    Property
        description
   
    Default
        Please enter the customer key into the field "Username"
        and the customer secret into the field "Password".
        ###MORE###
        To authenticate with a specific account, you have to
        put the customer token in the fields "access_token" and
        "access_token_secret" of the Configuration.
        You can go to the T3Socials User Tools to autehtificate.
        A customer end get the tokens from there.
        
    Description
         Enthält eine Beschreibung zum Netzwerk und dessen Konfiguration.
         Diese Beschreibung wird beim Editieren (TCE-FORM)
         für den Nutzer als Info ausgegeben.
         Durch den Marker ###MORE### wird der darauffolgende versteckt
         und mit einem "Mehr Anzeigen" Link ersetzt,
         welcher den Inhalt dann bei Klick ausgibt.

.. container:: table-row

    Property
        default_configuration
   
    Description
         Enthält die vordefinierte Konfiguration.
         Diese Konfiguration wird beim initialen Anlegen eines Accounts
         in das Feld *Configurations* eingefügt.

Mit * Markierte Felder sind Pflichtangaben!


.. _network-registrierung:

Registrierung
-------------

Um ein Netzwerk zu registrieren, wird die Konfiguration benötigt.
Diese Konfiguration muss über die ext_localconf.php bei T3 SOCIALS
registriert werden.

Beispiel der Registrierung mit eigenem Configurationsmodel:

.. code-block:: php

   /* *** **************************** *** *
    * *** Register T3 SOCIALS Networks *** *
    * *** **************************** *** */
   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_network_Config');
   tx_t3socials_network_Config::registerNetwork(
      'tx_t3socials_network_twitter_NetworkConfig'
   );

Hier ein Beispiel der Registrierung direkt mit der Basisklasse:


.. code-block:: php

   /* *** **************************** *** *
    * *** Register T3 SOCIALS Networks *** *
    * *** **************************** *** */
   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_network_Config');
   tx_t3socials_network_Config::registerNetwork(
      tx_rnbase::makeInstance(
         'tx_t3socials_models_NetworkConfig',
         array (
            'provider_id' => 'twitter',
            'hybridauth_provider' => 'Twitter',
            'connector' => 'tx_t3socials_network_twitter_Connection',
            'description' =>
               'Please enter the customer key into the field "Username"' .
               ' and the customer secret into the field "Password".'
            ,
            'default_configuration' =>
               'twitter {' . CRLF .
               '  useHybridAuthLib = 1' . CRLF .
               '  access_token =' . CRLF .
               '  access_token_secret =' . CRLF .
               '}'
            ,
         )
      )
   );
