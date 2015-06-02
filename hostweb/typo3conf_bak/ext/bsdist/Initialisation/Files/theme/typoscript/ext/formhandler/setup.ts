
# Global Error Markers
plugin.Tx_Formhandler.settings {
    isErrorMarker {
         default =
         # show missing fields with red border (used as additional css classname)
         #default = formerror
     }
}

# Default PreDef Contact Form
plugin.Tx_Formhandler.settings.predef.form-simple {

    # Common configuration
    name = Contact form
    debug = 0
    addErrorAnchors = 1

    # Template file
    templateFile = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/formhandler/form_simple.html

    # Master template
    masterTemplateFile = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/formhandler/master_template.html

    # Multiple master templates
    #masterTemplateFile.1 = EXT:formhandler/Examples/MasterTemplate/master_template.html
    #masterTemplateFile.2 = theme/tmpl/formhandler/master_template.html

    langFile.1 = {$plugin.tx_bootstrapcore.theme.baseDir}/tmpl/formhandler/locallang.xml
    stylesheetFile >
    formValuesPrefix = formhandler

    # HTML wrapping by validation error
    errorListTemplate {
        totalWrap = <div class="usermsg usermsg-error"><ul>|</ul></div>
        singleWrap = <li class="error">|</li>
    }
    singleErrorTemplate {
        singleWrap = <span class="fielderr usermsg-errortext">|</span>
    }

    # File configuration
    singleFileMarkerTemplate {
        totalWrap = <ul>|</ul>
        singleWrap = <li style="color:maroon;">|</li>
    }
    totalFilesMarkerTemplate {
        totalWrap = <ul>|</ul>
        singleWrap = <li style="color:red;">|</li>
    }
    files {
        #clearTempFilesOlderThanHours = 24
        uploadFolder = uploads/formhandler/
        enableAjaxFileRemoval = 1
    }


    # --- Validators ---
    #
    validators {
        1 {
            class = Tx_Formhandler_Validator_Default
            config {
                fieldConf {
                    firstname {
                        errorCheck.1 = required
                        errorCheck.2 = maxLength
                        errorCheck.2.value = 50
                    }
                    lastname {
                        errorCheck.1 = required
                        errorCheck.2 = maxLength
                        errorCheck.2.value = 50
                    }
                    comment {
                        errorCheck.1 = required
                    }
                    # email check
                    email {
                        errorCheck.1 = required
                        errorCheck.2 = email
                    }
                    # Spam Protection Solutions
                }
            }
        }
    }

    # --- Interceptors ---
    #
    initInterceptors {
        1 {
            class = Tx_Formhandler_Interceptor_Filtreatment
        }
    }


    # --- Loggers ---
    #
    loggers {
        1 {
            class = Tx_Formhandler_Logger_DB
        }
    }



    # --- Finishers ---
    #

    finishers {
        # Save to DB
        /*
        2 {
            class = Tx_Formhandler_Finisher_DB
            config {
                table = fe_users
                key = uid
                fields {
                    # static and special values
                    pid = 6
                    disable = 1
                    crdate.special = sub_tstamp
                    tstamp.special = sub_tstamp

                    # form values
                    username.mapping = email
                    email.mapping = email
                    title.mapping = title
                    name.mapping = lastname
                    last_name.mapping = lastname
                    first_name.mapping = firstname
                    company.mapping = company
                    address.mapping = street
                    zip.mapping = zip
                    city.mapping = city
                    country.mapping = country
                    telephone.mapping = phone
                    fax.mapping = fax
                    www.mapping = www
                    comments.mapping = comments
                    #comments.special = ip
                }
            }
        }
        */

        # (3) Store uploaded files
        /*
        3.class = Tx_Formhandler_Finisher_StoreUploadedFiles
        3.config {
            finishedUploadFolder = fileadmin/user_upload
            renameScheme = [pid]_[filename]
        }
        */

        # (5) Send Email
        #
        5.class = Tx_Formhandler_Finisher_Mail
        5.config {

            limitMailsToUser = 5

            admin {
                # ---------------------------------- change ------------------------------
                to_email = info@example.com
                to_name =
                subject = Formular
                return_path =
                # ---------------------------------- change ------------------------------

                sender_email = email
                # concat first and lastname
                sender_name = COA
                sender_name {
                    10 = TEXT
                    10 {
                        data = GPvar:formhandler|firstname
                        if.isTrue.data = GPvar:formhandler|firstname
                        noTrimWrap = || |
                    }
                    20 = TEXT
                    20.data = GPvar:formhandler|lastname
                }

                replyto_email = email
                replyto_name = lastname

                htmlEmailAsAttachment = 1

                #attachment = image
            }

            user {
                to_email = email
                # same as sender name
                to_name < plugin.Tx_Formhandler.settings.predef.form-simple.finishers.5.config.admin.sender_name

                subject = Formular
                sender_email = info@example.com
                sender_name =
                replyto_email =
                replyto_name =

                return_path =

                htmlEmailAsAttachment = 1

                #attachment = image
                #attachPDF {
                #  class = Generator_WebkitPdf
                #  config {
                #    pid = 6
                #  }
                #}
            }
        }

        # (9) Display submitted values online
        #
        /*
        9.class = Tx_Formhandler_Finisher_SubmittedOK
        9.config {
            returns = 1
            actions {
            }
        }
        */

        9.class =  Tx_Formhandler_Finisher_Redirect


    }

}

# PreProcessors
plugin.Tx_Formhandler.settings.predef.form-simple {
    preProcessors {
        # (see below!)
        1 {
            class = Tx_Formhandler_PreProcessor_LoadDefaultValues
            config {
                1.website.defaultValue.value = http://
            }
        }
        #2.class = Tx_Formhandler_PreProcessor_LoadGetPost
    }
}

# Custom Markers
/*
plugin.Tx_Formhandler.settings.predef.form-simple {

    markers {
        # Countries based on static_countries
        static_countries_optionlist = CONTENT
        static_countries_optionlist {
            table = static_countries
            select {
                pidInList = 0

                # only needed if where filter is based on territory
                #leftjoin = static_territories ON (static_countries.cn_parent_tr_iso_nr=static_territories.tr_iso_nr)

                # load fields
                selectFields = static_countries.uid, static_countries.cn_short_en, static_countries.cn_short_local
                # load other/morefields
                #selectFields = static_countries.uid, static_countries.cn_short_en, static_countries.cn_iso_3

                # --- filter countries ---
                where = static_territories.tr_parent_iso_nr=150
                # only EU countries (without switzerland!:)
                #where = static_countries.cn_eu_member = 1

                # --- orderby ---
                orderBy = static_countries.cn_short_en
                #orderBy = static_countries.cn_short_local
            }
            renderObj = TEXT
            renderObj {
                # submitted value = cn_short_en
                dataWrap = <option value="{field:cn_short_en}" ###selected_country_{field:cn_short_en}###>{field:cn_short_en}</option>

                # v1: submitted value = cn_iso_3
                #dataWrap = <option value="{field:cn_iso_3}" ###selected_country_{field:cn_iso_3}###>{field:cn_short_en}</option>

                # v2: submit en names, display local names
                #dataWrap = <option value="{field:cn_short_en}" ###selected_country_{field:cn_short_en}###>{field:cn_short_local}</option>
            }
        }

    }
}
*/

# Send copy to user if checkbox activated
/*
[globalVar = GP:formhandler|getcopy=Ja]
  # as defined: send copy to user
[else]
  # unset mail handling for user
  plugin.Tx_Formhandler.settings.predef.form-simple {
    finishers.5.config.user >
  }
[global]
*/

# Image Upload
/*
# not yet ok (intercepter..?)
plugin.Tx_Formhandler.settings.predef.form-simple {
    validators.1.config.fieldConf {
        # pictures upload
        images {
            errorCheck.1 = fileAllowedTypes
            errorCheck.1.allowedTypes = jpg,gif,png,pdf
            errorCheck.2 = fileMinSize
            errorCheck.2.minSize = 20480
            errorCheck.3 = fileMaxSize
            errorCheck.3.maxSize= 409600
            errorCheck.4 = fileMaxCount

            # version 0.9.7 has a bug
            # a user may upload only maxCount - 1 files
            errorCheck.4.maxCount = 2
        }
    }
}
*/

# Preset form fields with data from current feuser
/*
[loginUser = *]
plugin.Tx_Formhandler.settings.predef.form-simple {
    # PreProcessors
    preProcessors {
        # (see below!)
        1 {
            class = Tx_Formhandler_PreProcessor_LoadDefaultValues
            config {
                1.title.defaultValue.data   = TSFE:fe_user|user|title
                1.firstname.defaultValue.data = TSFE:fe_user|user|first_name
                1.lastname.defaultValue.data  = TSFE:fe_user|user|last_name

                1.company.defaultValue.data   = TSFE:fe_user|user|company
                1.street.defaultValue.data    = TSFE:fe_user|user|address
                1.zip.defaultValue.data       = TSFE:fe_user|user|zip
                1.city.defaultValue.data      = TSFE:fe_user|user|city
                1.zone.defaultValue.data      = TSFE:fe_user|user|zone
                1.country.defaultValue.data   = TSFE:fe_user|user|static_info_country

                1.email.defaultValue.data     = TSFE:fe_user|user|username
                1.phone.defaultValue.data     = TSFE:fe_user|user|telephone
                1.fax.defaultValue.data       = TSFE:fe_user|user|fax
            }
        }
    }
}
[global]
*/

# Special handling for gender/salutation
/*
[loginUser = *] && [globalVar = TSFE:fe_user|user|gender=1]
  plugin.Tx_Formhandler.settings.predef.form-simple {
    preProcessors.1.config.1.salutation.defaultValue.value = Frau
  }
[global]
[loginUser = *] && [globalVar = TSFE:fe_user|user|gender=0]
  plugin.Tx_Formhandler.settings.predef.form-simple {
    preProcessors.1.config.1.salutation.defaultValue.value = Herr
  }
[global]
*/



