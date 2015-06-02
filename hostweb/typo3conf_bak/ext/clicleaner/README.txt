This extension provides a lowlevel script to clear cache tables.
Please read the lowlevel documentation before using this extension!!!



##########################################################################
#
#	DELETE CACHE:
#

Test:
[path_to]/php [doc_root]/typo3/cli_dispatch.phpsh lowlevel_cleaner tx_clicleaner_cache --[all|pages] -r --dryrun

Clear cache:
[path_to]/php [doc_root]/typo3/cli_dispatch.phpsh lowlevel_cleaner tx_clicleaner_cache --[all|pages] -r --AUTOFIX --YES




##########################################################################
#
#	DELETE INDEXED_SEARCH INDEX:
#

Test:
[path_to]/php [doc_root]/typo3/cli_dispatch.phpsh lowlevel_cleaner tx_clicleaner_index --index -r --dryrun

Clear index:
[path_to]/php [doc_root]/typo3/cli_dispatch.phpsh lowlevel_cleaner tx_clicleaner_cache --index -r --AUTOFIX --YES