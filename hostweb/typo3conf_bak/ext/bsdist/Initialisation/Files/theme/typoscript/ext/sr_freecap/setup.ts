
# config
/*
plugin.tx_srfreecap {

    # Lang stuff
    _LOCAL_LANG.default {
        # formal
        notice = Please enter the word displayed below to prevent spam.
        explain =
        cant_read1 = IF you can't read the word,
        click_here = click here

        # informal
        notice_informal = Please enter the word displayed below to prevent spam.
        explain_informal =
        cant_read1_informal = IF you can't read the word,
        click_here_informal = click here

        # both
        cant_read2 = .
    }

    _LOCAL_LANG.de {
        explain =
        notice = Spam-Abwehr: Bitte das Wort eingeben, das im Bild angezeigt wird.
    }
}
*/

# for Tx_Formhandler
# see ../formhandler/setup.ts
#
plugin.Tx_Formhandler.settings.predef.form-simple {
    validators {
        1 {
            #class = Tx_Formhandler_Validator_Default
            config.fieldConf.freecapfield.errorCheck.1 = srFreecap
        }
    }
}