
.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Administration
---------------

It should first be noted that currently there is no whole reference for all the
features of this extension. For the complete syntax you should take a look at
Classes/DataHandlerHook.php. Before the method "expandConfiguration" is a torough
documentation of the features.

You will find this method documentation here for the sake of completeness of this
documentation.

Simple example of usage: Put into Page/User/Group TS-Config

.. code-block:: typoscript
   :linenos:

   plugin.kb_cacherelations {
     fe_users.pid.0 {
       checkAffected = 0:\*:\*
       clearCachePages = 0:\*:\*
   }


Will clear every page ( clearCachePages = 0:\*:\* ... root-page, recursive infinite ) whenever a fe_users
record on any page ( checkAffected = 0:\*:\* ... root-page, recursive infinite ) has get modified.

So the syntax for expressions for page expansion is: *PAGE:TRAVERSAL:COLLECTION*

When you wonder what the 0 is for in "fe_users.pid.0"

This is simple: It's just an running index like in a COA. It's value doesn't
matter - you can choose whatever you like even strings are supported. It is
just so you can set more than one rule for one specific table.

The "pid" in this string means that records which reside on pages being expanded from
the "checkAffected" will get checked. So if you define a rule for the pages table you
really define what shall happen when pages residing on any of the expanded pages get
affected.

So for the pages table you would rather use "pages.uid.0" so you can give the UID
of pages which shall get watched.

An additional feature is to check any relations between records. Lets assume you have
some records (tt_content, news, your custom records) which have a relation to fe_users.
If you change the fe_user record the rendering of those records would change. It would
be easy if you know every page which can show your records having relations to fe_users.
You could simply add the TYPO3 clearCacheCmd to all those pages. But if you do not know
which pages contain relations to an fe_users record you are stuck. And if you do not
want to clear the whole page cache of all pages every time you edit an fe_users record
you have also quite some settings to make. For this the "related" option can get used.

In above configuration replace the "pid" with related leaving you with something like:

.. code-block:: typoscript
   :linenos:

   plugin.kb_cacherelations {
     fe_users.related.0.toRecords {
       checkAffected = 0:\*:\*
       clearCachePages = #
   }

The above example will do the following: If an fe_user record get changed it is checked whether any
records have relations to the fe_users record. This is done via the "sys_refindex" table so you should
take care it is always up-to-date and valid. If any records have been found relating to the fe_users
record being changed it will get determined if those other records reside on any page specified via "checkAffected".

The expansion of such an page-expression is described in detail below. Now if any page has been matched
It the "clearCachePages" expression will get expanded. In the "clearCachePages" expression the "#" will
get substituted by the affected page (The page containing any record pointing to the fe_users record).

So the "#" in above example will simply delete the caches of all pages having records on them which
have a relation to an edited fe_users record.

The "#" could get replaced by #:\*:\* which would mean to delete the cache of the affected page and
all its subpages.

The "toRecord" in above example could also get replaced by "toRecordsPage" which would mean to search
for any records having a relation to the page the fe_users records reside on.

You see the page-expression syntax is quite powerful and it will eventually take you some time to
configure your system optimally so cache clearing is reduced to the required minimum. A first step
for you should be to exactly determine what your requirements are - this is often not as easy
as it looks on the first glance.

Page-expression syntax documentation
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

As already mentioned the syntax is not completely documented right now. There is additional
documentation in the code. This is copied here for completeness:

::
    This method returns all pages configured via one of the configurations strings like "0:*"
    You could also say it "expands" the configuration string
    More than one configuration string can be put together by using a semicolon (;) to separate them
    
    Each configuration string is first split by the paragraph symbol "§".
    The configuration before the paragraph symbol defines the included pages while the configuration after it
    defines the excluded pages.
    
    The separation between expression by (;) and inclusion (possible exclusion by "§") is handled by this method itself.
    Everything else is handled by the methods below.
    
    
    Each configuration (before and after the §) can consist of multiple sub-configurations separated by comma (,)
    
    Each of the sub configurations get's expanded as following:
    This all means simply page 123: "123", "123:0", "123:0:0", "123:-0", "123:-0:*", "123:*:0"
    
    An expression looks like: "PAGE:TRAVERSAL:COLLECTION"
    
    The value "0:*:*" means "all pages" (the whole pagetree)
    
    While something like "0:*:*$" means just all last-level pages (pages having no childs)
    It will start from page 0, retrieve all subpages and collect all pages having no childs
    Something like "0:*:3$" means just all third-level pages having no childs
    
    While something like "0:*:*^" means just all first-level pages (pages having no parent - rootlevel pages)
    It will start from page 0, retrieve all subpages and collect just pages having no parent
    
    An expression like "123:*:*$" means all pages below 123 which have no child (123 itself if it has no childs)
    Something like "123:*:*" means page uid "123" AND ALL subpages
    An expression like "123:*:*^" won't return any page except 123 if it is a rootpage (has no parent)
    The last expression would start at 123, retrieve all subpages and collect just pages having no parent
    (which will result in no pages as every retrieved subpages has a parent: 123)
    
    Another example would be "123:1:*" which would mean page 123 and all direct subpages (but not sub-subpages)
    While "123:1:1" would mean only all direct subpages of 123 but not 123 itself (and neither sub-subpages)
    While "123:1:*$" would mean only those direct subpages having no childs (or 123 if it has no childs)
    While "123:1:1$" would mean only those direct subpages having no childs (exclusive 123)
    An expression of "123:-2:2" means the parent parent page of 123
    While "123:-2:*" means the page 123 AND its parent page AND its parent parent page
    An expression like "123:-*:*^" would mean the root page of the current branch
    While an expression like "123:-*:*" would mean the page 123 AND everything down the rootline till the rootpage
    
    
    So the sub-configuration is first split by ":" where:
    The first part designates: The page from which the page tree traversal begins
    This must be a page UID or 0
    
    The second part defines: In which direction and how deep the page tree get's traversed
    A prefix of "-" meaning to don't retrieve subpages but travel the rootline up to the rootpage
    And then:
    Either an asterix "*" which means to go up or down till not further possible (no childs/parents)
    Or a number which means to go down (or up if prefixed by minus) till the level specified by this number
    
    And the third part defines: The levels of which the page uid's get collected.
    This is a dot (.) separated list of items from which each item can be built up like:
    Postfixed by a modificator of "$" which means to collect a page only if it has no subpages
    Postfixed by a modificator of "^" which means to collect a page only if it has no parent
    Either an asterix "*" which means to collect any page
    OR a number which means to collect pages only if on the level specified by this number


