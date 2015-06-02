
# ------------------ Subscription --------------------------------
#
formhandler.nlsubscr {

	# cat=Newsletter Subscription - DirectMail/basic/10; type=string; label=Root path: Path where the templates are.
	rootPath = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/direct_mail/formhandler

	# cat=Newsletter Subscription - DirectMail/basic/11; type=string; label=Language file: Path to the language file.
	langFile = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/direct_mail/locallang_newsletter.xml

	email {
		admin {
			# cat=Newsletter Subscription/Unsubscription - DirectMail/basic/20; type=string; label=User email sender: Email address to use as sender address for the user email.
			sender_email = newsletter@example.com
			# cat=Newsletter Subscription/Unsubscription - DirectMail/basic/21; type=string; label=User email sender: Name to use as sender name for the user email.
			sender_name = Newsletter xyz
		}
	}

	# cat=Newsletter Subscription - DirectMail/basic/41; type=string; label=Usergroup UID: Default usergroup for direct_mail recipients.
	usergroup.uid = 2
	# cat=Newsletter Subscription - DirectMail/basic/40; type=string; label=PageUID: Page ID to where to store the feusers.
	feusers.pid = 38
	# cat=Newsletter Subscription - DirectMail/basic/50; type=string; label=Success page: Page ID to redirect to if the authentication code is valid.
	preProcessors.redirectPage = 31
	# cat=Newsletter Subscription - DirectMail/basic/51; type=string; label=Error page: Page ID to redirect to if the authentication code is not valid.
	preProcessors.errorRedirectPage = 30
}

