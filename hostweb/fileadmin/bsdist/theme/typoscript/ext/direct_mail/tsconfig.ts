
# The following page and be group UIDs are defined on the page which includes this file.
#
#TCEMAIN.permissions.groupid
#TCEFORM.pages.backend_layout.PAGE_TSCONFIG_ID
#TCEFORM.pages.backend_layout_next_level.PAGE_TSCONFIG_ID
#TCEFORM.tt_content.tx_gridelements_backend_layout.PAGE_TSCONFIG_ID
#TCEFORM.tt_content.module_sys_dmail_category.PAGE_TSCONFIG_IDLIST

# --- Module config ---
#
mod.web_modules.dmail {

    # ---------------------------------- change ------------------------------
    # from, reply-to, return path
    organisation = Firmenname
	from_name = Firma
	from_email = newsmail@example.com
	replyto_name = Company
	replyto_email = newsmail@example.com
	return_path = media@example.com
    # ---------------------------------- change ------------------------------

	# subject keyword for testmails
	testmail = TEST

    # encoding
	quick_mail_encoding = 8bit
	direct_mail_encoding = 8bit
	# charset
	quick_mail_charset = utf-8
	direct_mail_charset = iso-8859-1

	priority = 3
	sendOptions = 3
	includeMedia = 0
	flowedFormat = 0
	plainParams =&type=99
	use_rdct = 0
	enable_jump_url = 1
	enable_mailto_jump_url = 1

	use_domain = 0
	long_link_mode = 1
}


# --- Page config ---
#
TCEFORM.pages {
    # Custom or default header images
    layout {
        # remove
        #removeItems = 3
        # ...or use and change labels
        altLabels.0 = Default Header Images
        altLabels.1 = Header Images from this page
        removeItems = 2,3
    }
}