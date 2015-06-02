.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _trigger:

Trigger
=======

Trigger bilden in T3 SOCIALS die Schnittstelle zwischen einem 
Datensatz aus der TYPO3-Datenbank und T3 SOCIALS. Der Trigger für tt_news 
beispielsweise, überwacht das System auf neue News, um diese an T3 SOCIALS 
zu übergeben und ggf. an ein oder mehrere Accounts zu verteilen.

Um ein Trigger für T3 SOCIALS zu registrieren, sind aktuell 2 Dinge notwendig:

1. :ref:`trigger-config`
2. :ref:`trigger-message-builder`


.. _trigger-config:

Configuration
-------------

Eine Konfiguration enthält im Wesentlichen die zu überwachende Tabelle und
einen Message-Builder.
Weiter wird die Konfiguration dazu verwendet,
den Trigger bei T3 SOCIALS zu registrieren.

Die Konfiguration muss immer über das Basismodel
*tx_t3socials_models_TriggerConfig* geschehen.

Entweder man legt nun eine eigene Klasse an, welche von dem Basismodel erbt
und die Konfiguration enthält, oder man nutzt einfach das Basismodel
und setzt darin die Konfiguration.

Die Verwendung ist dabei identisch zu der :ref:`network-config` eines Netzwerks.

.. code-block:: php

   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_models_NetworkConfig');
   class tx_t3socials_network_twitter_NetworkConfig
      extends tx_t3socials_models_NetworkConfig {
      protected function initConfig() {
         parent::initConfig();
         $this->setProperty('trigger_id', 'news');
         $this->setProperty('table', 'tt_news');
         $this->setProperty(
            'message_builder',
            'tx_t3socials_trigger_news_MessageBuilder'
         );
      }
   }

Mögliche Optionen der Konfiguration:

.. container:: table-row

    Property
        trigger_id
        
    Default
        Default ist der Wert der Eigenschaft *table*
        
    Description
        Eine eindeutige ID für den Trigger.

.. container:: table-row

    Property
        table *
        
    Default
        NULL
   
    Description
        Der Tabellenname, wessen Datensätze überwacht und genutzt werden sollen.

.. container:: table-row

    Property
        resolver
   
    Default
        tx_t3socials_util_ResolverT3DB
   
    Description
        Der Resolver ist dafür Zuständig,
        aus einem Identifier (UID) und einem Tabellennamen
        einen Datensatz zu bilden.
        Der Resolver muss das Interface
        *tx_t3socials_util_IResolver* implementieren.
        Defaultwert ist *tx_t3socials_util_ResolverT3DB*.
                
        Der T3DB Resolver sollte für die meisten Zwecke ausreichen.
        Er besorgt sich aus der Datenbank
        den Datensatz mit einer bestimmten UID
        aus einer bestimmten Tabelle.
        
        Der gelieferte Datensatz muss in einem Model verpackt zurückgegeben werden.
        Das Modell muss eine Instanz der Klasse *tx_t3socials_models_Base* sein.
        Beispielaufruf:

         .. code-block:: php
         
            $model = tx_rnbase::makeInstance('tx_t3socials_models_Base', array(/* Record */))
            $model->setTableName($tableName);

.. container:: table-row

    Property
        message_builder *
   
    Default
        NULL
   
    Description
        Der Klassenname des Message Builders.
        Mehr dazu im Abschnitt :ref:`trigger-message-builder`

Mit * markierte Felder sind Pflichtangaben!


.. _trigger-message-builder:

Message-Builder
---------------

Der Message-Builder ist dafür zuständig, aus einem speziellen Datensatz,
wie beispielsweise einer News,
ein generisches Message-Model zu erzeugen und zu befüllen.

Der Message-Builder muss entweder von der Basisklasse
*tx_t3socials_trigger_MessageBuilder* erben, oder das Interface
*tx_t3socials_trigger_IMessageBuilder* implementieren.

Wir empfehlen, das direkt von der Basisklasse geerbt wird,
da man sich dann nur noch um das Befüllen der Message kümmern muss.

Dazu muss dann lediglich die Methode *buildMessage* angelegt werden.

Hier ein kleines Beispiel für einen tt_news Datensatz:

.. code-block:: php

   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_trigger_MessageBuilder');
   class tx_t3socials_trigger_news_MessageBuilder
      extends tx_t3socials_trigger_MessageBuilder {
      protected function buildMessage(
         tx_t3socials_models_Message $message,
         tx_t3socials_models_Base $model
      ) {
         $message->setHeadline($model->getTitle());
         $message->setIntro($model->getShort());
         $message->setMessage($model->getBodytext());
         $message->setData($model);
         return $message;
      }
   }

Wenn beim Bauen der Message spezielle Anpassungen für Netzwerke
oder deren Konfiguration durchgeführt werden müssen,
kann dies über die Methode prepareMessageForNetwork geschehen.

Ein Beispiel dafür ist die Generierung der URL.
Die URL kann im Falle einer News automatisiert nur anhand
einer TypoScript Konfiguration erzeugt werden,
da wir auf eine Detailseite mit dem tt_news Detail Plugin verlinken müssen.

Die Konfiguration eines Links wird im Abschnitt :ref:`accounts` erklärt.

Wie im MessageBuilder auf diese Konfiguration zugegriffen
und eine dynamische URL zusammen gebaut werden kann, zeigt folgendes Beispiel:

.. code-block:: php

   require_once t3lib_extMgm::extPath('rn_base', 'class.tx_rnbase.php');
   tx_rnbase::load('tx_t3socials_trigger_MessageBuilder');
   class tx_t3socials_trigger_news_MessageBuilder
      extends tx_t3socials_trigger_MessageBuilder {

      ...

      public function prepareMessageForNetwork(
         tx_t3socials_models_IMessage &$message,
         tx_t3socials_models_Network $network,
         tx_t3socials_models_TriggerConfig $trigger
      ) {
         $confId = $network->getNetwork() . '.' . $trigger->getTrigerId() . '.';
   
         tx_rnbase::load('tx_rnbase_util_Misc');
         $tsfe = tx_rnbase_util_Misc::prepareTSFE();
   
         $news = $message->getData();
         $config = $network->getConfigurations();
         $link = $config->createLink();
         // tx_ttnews[tt_news]
         $link->designator('tx_ttnews');
         // Den Link anhand des Typoscripten initialisieren
         // und den Parameter für den News Datensatz mitgeben
         $link->initByTS($config, $confId . 'link.show.', array('tt_news' => $news->getUid()));
         // wenn nicht anders konfiguriert, immer eine absoplute url setzesetzen!
         if (!$config->get($confId . 'link.show.absurl')) {
            $link->setAbsUrl(TRUE);
         }
         // wenn realURL oder eine ähnliche Extension installiert ist
         // müssen wir uns im BE um die Umwandlung der URL kümmern!
         tx_rnbase::load('tx_t3socials_util_Link');
         $url = tx_t3socials_util_Link::getRealUrlAbsUrlForLink($link);
   
         $message->setUrl($url);
      }
   }


.. _trigger-registrierung:

Registrierung
-------------

Um ein Trigger zu registrieren, wird die Konfiguration benötigt.
Diese Konfiguration muss über die ext_localconf.php bei T3 SOCIALS
registriert werden.

Mit der Registrierung werden alle Änderungen
an der, in der Konfiguration angegebenen Tabelle, überwacht.

Je nach Konfiguration der angelegten Accounts
und Status des Datensatzes,
wird dieser nun automatisch an die Netzwerke verteilt
oder man erhält nach dem Speichern eine Infomeldung,
das der Datensatz über die :ref:`manual-dispatch-news` verteilt werden kann.

Beispiel der Registrierung:

.. code-block:: php

   /* *** **************** *** *
    * *** Register Trigger *** *
    * *** **************** *** */
   tx_rnbase::load('tx_t3socials_trigger_Config');
   tx_t3socials_trigger_Config::registerTrigger(
      'tx_t3socials_trigger_news_TriggerConfig'
   );

