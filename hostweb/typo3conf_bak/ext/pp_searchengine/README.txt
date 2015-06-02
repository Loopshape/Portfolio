If you just want to include the basic search engine (wich search in tt_content) you must include a static template (valled "tt_content search engine" and clear the cache).
The search Form and advanced options are not implemented yet, but the engineget search words from this POST/GET parameters : sword, tx_ppsearchengine_pi1[sword]

Please note that this extension is still in development and it is not sure that it works everytimes, and is no as complete as the indexed_search


There is not tutorial for now, but if you want an exemple, you can see the function tx_ppsearchengine_pi1->tt_content_search (Carreful, this is a special type of engine, because the plugin refers to itself)


Section I : How to add a search engine ?

You have to add some typoscript configuration to the plugin tx_ppsearchengine_pi1 like this :

plugin.tx_ppsearchengine_pi1.engines.mySearchEngine {
  //*** Here we put the engine title. label is stdWraped
  // This is an example
  #Var name=label type=stdWrap
  label.data=LLL:EXT:myext/locallang_db.php:mySearchEngine.title

  //*** When this option is enabled, the tx_ppsearchengine_pi1 plugin will clean and explode
  //       the search words before giving it to your search engine
  #Var name=parseSWord type=boolean
  parseSWord=1

  //*** This option is required ! It will determine how the result must be interpreted
  #Var name=returnType type=string (could be array,serialize or anything else. @see Section III : What about returnType ? )
  returnType=array

  //*** This option is required ! It will determine how the engine must be called
  #Var name=type type=string (could be URL,simulatePi,object. @see Section II : What about type ? )
  type=object

  //*** Other propreties are depends of the type, see Section II
  // Example :
  userFunc = tx_myext_pi1->doSearch
}


Section II : What about type ?
The proprety type defines how the engine will be called

  Type : URL
    This means that the tx_ppsearchengine_pi1 plugin will call an URL to get the result (for example, to fet results from another website )

    Propreties :
    - baseUrl = url of the results (ex: http://www.example.com/search.php?) INCLUDING the ? !!!!
    - prefix = prefix of the get vars (ex: tx_myext_pi1, then the burl will become http://www.example.com/search.php?&tx_myext_pi1[param1]&tx_myext_pi1[param2])
    - addParams = if you need to add some parameters at end of the url (ex: &foo=bar&foo2=bar -> including the & at beginning !)

  Type : object
    The engine will be called by using the function t3lib_div::callUserFunction

    Propreties :
    - userFunc = the function name who will be called (ex: tx_myext_pi1->doSearch). It musts receive 1 param

  Type : simulatePi
    The engine will be called by a tslib_cObj (like a fe pi) with its own $conf array and $this->cObj->data filled, but this cObject must be a USER/USER_INT ! (the plugin will call the userFunc proprety regardless of the cObject type !!)

    Propreties :
    - record = The record to load. String pattern : <table>:<comma separated list of uids>
        Warning : If you specifie more than one uid, your return type MUST BE AN ARRAY in order to be merged
    - cObject = the $conf array of your engine. Note that propreties found in cObject. will overrule imported propreties (import by this way : cObject=<plugin.tx_myext_pi1)
        The search params will be passed in the $conf array at key "searchParams.". Userfunc musts receive 2 params

  Type : multiplePis
    Works exactly like the simulatePi, BUT with this you don't need to enter an uid list. The plugin will get the records by a simple query. Return type MUST BE 'array'

    Propreties :
    - table = table containing record (typically : tt_content, default value : tt_content)
    - where = WHERE statement used in query (example :  list_type='pp_fetasks_pi1' AND tx_ppsearchengine_isengine=1).
      Note that there's a new field added to tt_content : tx_ppsearchengine_isengine
    - cObject = the $conf array of your engine. Note that propreties found in cObject. will overrule imported propreties (import by this way : cObject=<plugin.tx_myext_pi1)
        The search params will be passed in the $conf array at key "searchParams.". Userfunc musts receive 2 params


Section III : What about returnType ?
The proprety returnType defines how the result will be parsed

  returnType : array
    The result is a PHP Array, so no need to parse result

  returnType : serialize
    The result is a serialized PHP Array, so it will be unserialized

  returnType : <somethingElse>
    This is a custom returnType, so it will be parsed by the method you have configured

    To configure a custom returnType, just add this in the typoscript configuration of tx_ppsearchengine_pi1 :
    plugin.tx_ppsearchengine_pi1.resultParsers.myCustomResultParser {
      //Here you can put what you want, only one proprety is required : this one
      userFunc = tx_myCustomResultParser->parse
    }

    The userfunc will be called with t3lib_div::callUserFunction.
    It will receive a $conf array containing plugin.tx_ppsearchengine_pi1.resultParsers.myCustomResultParser.
    Note that key "additionalConfig." will be filled by config found in "returnType." and the key "data" with the result

    This userFunc MUST return an array

Section IV : Result-array Structure
  Each value of the array is a result, and must be structured like this :

  key title: Title of the result. May be the page title or something else
  key link: The url of the result. It will NOT be completed, so make sure they are not relative when calling an external website engine...
  key pertinence: the number of search words found in this result (ex: i search "foo" "bar" in the text "foo. A little scrat on the snow... foo". This text has a pertinence of 1, because only one word has been found)
  key count: the number of occurencies of the search words in the result (the previous example has a count of 2)
  key description: The description of the result (a quotation or the full text, you decide). It will be cropped when displaying.


  example (search word: example): array(
        "title"=>"Example",
        "link"=>"http://example.com",
        "pertinence"=>1,
        "count"=>3,
        "description"=>"You have reached this web page by typing example.com, example.net, or example.org into your web browser. These domain names are reserved for use in documentation and are not available for registration. See RFC 2606, Section 3."
        );


