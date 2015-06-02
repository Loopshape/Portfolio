htaccess file
^^^^^^^^^^^^^

There are four example .htaccess configurations stored in the 'doc' directory. They are named:

- gzip.htaccess – use if you enabled gzipping and use realurl or simulateStatic
- plain.htaccess – use if you have not enabled gzipping and use realurl or simulateStatic

The .htaccess files use an optimized rewrite configuration as is explained here: http://www.typofree.org/article/archive/2008/june/title/rethinking-the-realurl-mod-rewrite-rules/

Here is a part of the gzip.realurl version:

.. code-block:: bash

   #------------------------------------------------------------------------------
   # beginning of static file cache rulesets

   # Set gzip extension into an environment variable if the visitors browser can handle gzipped content.
   RewriteCond %{HTTP:Accept-Encoding} gzip [NC]
   RewriteRule .* - [E=TX_NCSTATICFILECACHE_GZIP:.gz]


   # Don't cache HTTPS traffic. You may choose to comment out this
   # option if your site runs fully on https. If your site runs mixed, you will
   # not want https traffic to be cached in the same typo3temp folder where it can
   # be requested over http.
   # Enable this if you use a mixed setup.
   #RewriteCond %{HTTPS} off

   # We only redirect URI's without query strings
   RewriteCond %{QUERY_STRING} ^$

   # It only makes sense to do the other checks if a static file actually exists.
   RewriteCond %{DOCUMENT_ROOT}/typo3temp/tx_ncstaticfilecache/%{HTTP_HOST}/%{REQUEST_URI}index.html%{ENV:TX_NCSTATICFILECACHE_GZIP} -f

   # NO frontend user is logged in. Logged in frontend users may see different
   # information than anonymous users. But the anonymous version is cached. So
   # don't show the anonymous version to logged in frontend users.
   RewriteCond %{HTTP_COOKIE} !nc_staticfilecache [NC]

   # Uncomment the following line if you use MnoGoSearch
   #RewriteCond %{HTTP:X-TYPO3-mnogosearch} ^$

   # We only redirect GET requests
   RewriteCond %{REQUEST_METHOD} GET

   # NO backend user is logged in. Please note that the be_typo_user cookie expires at the
   # end of the browser session. If you have logged out of the TYPO3 backend and are expecting to see cached pages but don't. Please close this browser settion first or remove the cookie manually or use another browser to hit your frontend.
   RewriteCond %{HTTP_COOKIE} !be_typo_user [NC]

   # Check for Ctrl Shift reload
   RewriteCond %{HTTP:Pragma} !no-cache
   RewriteCond %{HTTP:Cache-Control} !no-cache

   # Rewrite the request to the static file.
   RewriteRule .* typo3temp/tx_ncstaticfilecache/%{HTTP_HOST}/%{REQUEST_URI}/index.html%{ENV:TX_NCSTATICFILECACHE_GZIP} [L]

   # Set proper content type and encoding for gzipped html.
   <Files *.html.gz>
   	ForceType text/html
   	<IfModule mod_headers.c>
   		Header set Content-Encoding gzip
   	</IfModule>
   </Files>

   # end of static file cache ruleset
   #------------------------------------------------------------------------------


If you use the oldschool .htaccess rewrite rules that come with the TYPO3 dummy, then the relevant static file cache configuration should be inserted in the .htaccess file just before these lines:

.. code-block:: bash

   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteCond %{REQUEST_FILENAME} !-l
   RewriteRule .* index.php [L]

If the TYPO3 Installation isn´t in your root directory (say your site lives in http://some.domain.com/t3site/), then you have to add the '/t3site' part to the configuration snippet. It must be placed right after %{DOCUMENT_ROOT}. Here are two lines of the ruleset to illustrate:

.. code-block:: bash

   RewriteCond %{DOCUMENT_ROOT}/t3site/typo3temp/tx_ncstaticfilecache/%{HTTP_HOST}/%{REQUEST_URI}index.html -f
   RewriteRule .* t3site/typo3temp/tx_ncstaticfilecache/%{HTTP_HOST}/%{REQUEST_URI} [L]

You are of course free to make the rules as complex as you like.

There might be some files you never want to pull from cache even if they are indexed. For example you might have some custom realurl rules that make your RSS feed accessible as rss.xml. You can skip rewriting to static file with the following condition:

.. code-block:: bash

   RewriteCond %{REQUEST_FILENAME} !^.*\.xml$