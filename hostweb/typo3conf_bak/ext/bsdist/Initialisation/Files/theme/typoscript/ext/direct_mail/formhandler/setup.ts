
# ------------------ Subscription --------------------------------
#
plugin.Tx_Formhandler.settings.predef.nlsubscr {

	name = Newsletter Subscription
	formValuesPrefix = nlsubscr

	# master template
	masterTemplateFile = TEXT
	masterTemplateFile.value = {$formhandler.nlsubscr.rootPath}/mastertemplate.html

    # form template
	templateFile = TEXT
	templateFile.value = {$formhandler.nlsubscr.rootPath}/form_subscribe.html

    # lang file
	langFile.1 = TEXT
	langFile.1.value = {$formhandler.nlsubscr.langFile}

    # required marker
	requiredSign = TEXT
	requiredSign {
		value = *
		wrap = <span>|</span>
	}

    # used in class attrib of form-group
	isErrorMarker {
    	default = has-error
	}

    # used to show the error message
	singleErrorTemplate {
		totalWrap = <span class="help-block">|</span>
		singleWrap = |
	}

    # ajax validation
	ajax {
		class = Tx_Formhandler_AjaxHandler_JQuery
		config {
			notOk = <img src="/typo3conf/ext/formhandler/Resources/Images/notok.png" />
			ok = <img src="/typo3conf/ext/formhandler/Resources/Images/ok.png" />
			initial =
			loading = <img src="/typo3conf/ext/formhandler/Resources/Images/ajax-loader.gif" />
		}
	}

	preProcessors {
	    1.class = PreProcessor_LoadDefaultValues
	    1.config {
	        # don't preset gender (if only Herr/Frau)
	        #1.gender.defaultValue = f
	        1.language.defaultValue = 0
	        1.format.defaultValue = 1
	    }

		2.class = PreProcessor_LoadGetPost

		3.class = PreProcessor_ValidateAuthCode
		3.config {
			redirectPage = TEXT
			redirectPage.value = {$formhandler.nlsubscr.preProcessors.redirectPage}
			errorRedirectPage = {$formhandler.nlsubscr.preProcessors.errorRedirectPage}

			hiddenField = disable
		}
	}

	validators {

		1.class = Validator_Default
		1.config.fieldConf {
			email {
				errorCheck {
					1 = required
					2 = email
					3 = isNotInDBTable
					3 {
						table = fe_users
						field = email
                        additionalWhere = TEXT
						additionalWhere.value = AND pid={$formhandler.nlsubscr.feusers.pid}
                        additionalWhere.insertData = 1
					}
				}
			}

            /*
			language {
				errorCheck {
					1 = required
			    }
			}
			*/

			format {
				errorCheck {
					1 = required
			    }
			}

		    /*
			gender {
				errorCheck {
					1 = required
				}
			}
			firstname {
				errorCheck {
					1 = required
					2 = maxLength
					2.value = 50
				}
			}
			lastname {
				errorCheck {
					1 = required
					2 = maxLength
					2.value = 50
				}
			}
	        */
		}
	}

	finishers {

		1.class = Finisher_DB
		1.config {
			table = fe_users
			key = uid
			fields {
				username.mapping = email
				email.mapping = email

				title.mapping = gender
				first_name.mapping = firstname
				last_name.mapping = lastname
				# concat to name
				name.mapping = COA
				name.mapping {
				    10 = TEXT
				    10.data = GP:nlsubscr|firstname
                    20 = TEXT
                    20.data = GP:nlsubscr|lastname
                    20.noTrimWrap = | ||
				}

				# company
				company.mapping = company

                # storage folder pid
				pid.postProcessing = TEXT
				pid.postProcessing.value = {$formhandler.nlsubscr.feusers.pid}
				# default usergroup
				usergroup.postProcessing = TEXT
				usergroup.postProcessing.value = {$formhandler.nlsubscr.usergroup.uid}

                # enable newsletter
				module_sys_dmail_newsletter.ifIsEmpty = 1
				# set format html/text
				module_sys_dmail_html.mapping = format
				module_sys_dmail_html.ifIsEmpty = 1

                # used for subscription/unsubscription
				disable.ifIsEmpty = 1
				deleted.ifIsEmpty = 0

				tstamp.special = sub_tstamp
                crdate.special = sub_tstamp
			}
		}

		2.class = Finisher_GenerateAuthCode
		2.config {
			table = fe_users
		}

		3.class = Tx_Formhandler_Finisher_Mail
		3.config {
			limitMailsToUser = 1
			user {
				to_email = email
				to_name = email

				sender_email = {$formhandler.nlsubscr.email.admin.sender_email}
				sender_name = {$formhandler.nlsubscr.email.admin.sender_name}

				subject = TEXT
				subject.data = LLL:{$formhandler.nlsubscr.langFile}:email_user_subject
			}
		}

		4.class = Finisher_SubmittedOK
		4.config {
			returns = 1
		}
	}

}

# Language specific settings
#
/*
[globalVar = GP:L = 1]
    plugin.Tx_Formhandler.settings.predef.nlsubscr {
        preProcessors {
            1.config {
                # Change default language to german
                1.language.defaultValue = 1
            }
        }
    }
[global]
*/

# for Footer (not used, not working in "cached" footer or with redirect to other form)
#
plugin.Tx_Formhandler.settings.predef.nlsubscr-footer < plugin.Tx_Formhandler.settings.predef.nlsubscr
plugin.Tx_Formhandler.settings.predef.nlsubscr-footer {
    name = Newsletter Subscription (for Footer)
	templateFile.value = {$formhandler.nlsubscr.rootPath}/form_subscribe_footer.html
}

# ------------------ Unsubscription --------------------------------
#
# based on subscription
plugin.Tx_Formhandler.settings.predef.nlunsub < plugin.Tx_Formhandler.settings.predef.nlsubscr
# but with changes
plugin.Tx_Formhandler.settings.predef.nlunsub {
    # Change form name, field prefix and template
    name = Newsletter Unsubscription
    formValuesPrefix = nlunsub
    templateFile.value = {$formhandler.nlsubscr.rootPath}/form_unsubscribe.html

    # Change redirect/error page
    /*
    preProcessors {
        2.config {
            redirectPage.value = {$formhandler.nlsubscr.preProcessors.redirectPage}
        	errorRedirectPage = {$formhandler.nlsubscr.preProcessors.errorRedirectPage}
        }
    }
    */

    # Validators
    validators {
        1.config.fieldConf {
            # remove format
            format >
            # Differenct check for email
            email {
                errorCheck {
                    3 = isInDBTable
                }
            }
        }
    }

    # Remove subscription finisher
    finishers  >
    # Add new for unsubscribe function
    finishers {
    		1.class = Finisher_DB
    		1.config {
    			#debug = 1
    			table = fe_users
    			updateInsteadOfInsert = 1
    			key = email
    			fields {
    				deleted = 1
    				email.mapping = email
    				tstamp.special = sub_tstamp
    			}
    			andWhere = TEXT
    			andWhere.value = pid={$formhandler.nlsubscr.feusers.pid}
    			andWhere.insertData = 1
    		}

    		2.class = Tx_Formhandler_Finisher_Mail
    		2.config {
    			limitMailsToUser = 1
    			user {
    				to_email = email
    				to_name = email

    				sender_email = {$formhandler.nlsubscr.email.admin.sender_email}
    				sender_name = {$formhandler.nlsubscr.email.admin.sender_name}

    				subject = TEXT
    				subject.data = LLL:{$formhandler.nlsubscr.langFile}:unsub_email_user_subject
    			}
    		}

    		3.class = Finisher_SubmittedOK
    		3.config {
    			returns = 1
    		}
    }
}