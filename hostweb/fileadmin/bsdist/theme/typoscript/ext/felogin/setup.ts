
plugin.tx_felogin_pi1 {
    # remove css
    _CSS_DEFAULT_STYLE >

    showForgotPasswordLink = 1
    showPermaLogin = 1

    # baseURL for the link generation
    #feloginBaseURL =

    # time in hours how long the link for forget password is valid
    #forgotLinkHashValidTime = 12

    # Allowed Referrer-Redirect-Domains:
    #domains =

    dateFormat = d.m.Y H:i

    # email (forgot password)
    # ---------------------------------- change ------------------------------
    email_from = info@example.com
    email_fromName = Company
    replyTo = info@example.com
    # ---------------------------------- change ------------------------------


    # Wraps by bootstrap
    # Login
    welcomeMessage_stdWrap.wrap = <div class="alert alert-info">|</div>
    successMessage_stdWrap.wrap = <div class="alert alert-success">|</div>
    errorMessage_stdWrap.wrap   = <div class="alert alert-danger">|</div>
    # Logout
    logoutMessage_stdWrap.wrap  = <div class="alert alert-info">|</div>
    # General Cookie Warning
    cookieWarning_stdWrap.wrap  = <div class="alert alert-warning">|</div>
    # Forgot
    forgotMessage_stdWrap.wrap  = <div class="alert alert-info">|</div>
    forgotErrorMessage_stdWrap.wrap = <div class="alert alert-danger">|</div>
    forgotResetMessageEmailSentMessage_stdWrap.wrap = <div class="alert alert-info">|</div>
    # Change Password
    changePasswordDoneMessage_stdWrap.wrap     = <div class="alert alert-success">|</div>
    changePasswordMessage_stdWrap.wrap         = <div class="alert alert-info">|</div>
    changePasswordNotValidMessage_stdWrap.wrap = <div class="alert alert-warning">|</div>
    changePasswordTooShortMessage_stdWrap.wrap = <div class="alert alert-warning">|</div>
    changePasswordNotEqualMessage_stdWrap.wrap = <div class="alert alert-warning">|</div>
    /*
    _LOCAL_LANG.default {
        username = Email Address
        ll_enter_your_data = Email Address
    }
    _LOCAL_LANG.de {
        username = E-Mail Adresse
        ll_enter_your_data = E-Mail Adresse
    }
    */
}

