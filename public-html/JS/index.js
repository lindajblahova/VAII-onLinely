var jsSignUpEmail = document.getElementById("formSignUpEmail");
var jsSignUpEmailAdmin = document.getElementById("formSignUpEmailAdmin");
var jsSignUpPassword = document.getElementById("formSignUpPassword");
var jsSignUpPasswordAdmin = document.getElementById("formSignUpPasswordAdmin");
var jsSignUpPasswordConf = document.getElementById("formSignUpPasswordConf");
var jsSignUpPasswordConfAdmin = document.getElementById("formSignUpPasswordConfAdmin");

var jsSignInEmail = document.getElementById("formSignInEmail");
var jsSignInEmailAdmin = document.getElementById("formSignInEmailAdmin");
var jsSignInPassword = document.getElementById("formSignInPassword");
var jsSignInPasswordAdmin = document.getElementById("formSignInPasswordAdmin");
var jsEmailRegexPattern = /^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$/;
var jsPasswordRegexPattern = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@*$#]).{8,16}/;

    document.getElementById("formSignUpSubmit").disabled = true;
    document.getElementById("formSignUpSubmit").classList.remove("btn-info");
    document.getElementById("formSignUpSubmit").classList.add("btn-secondary");

    document.getElementById("formSignInSubmit").disabled = true;
    document.getElementById("formSignInSubmit").classList.remove("btn-info");
    document.getElementById("formSignInSubmit").classList.add("btn-light");


    document.getElementById("formSignUpSubmitAdmin").disabled = true;
    document.getElementById("formSignUpSubmitAdmin").classList.remove("btn-warning");
    document.getElementById("formSignUpSubmitAdmin").classList.add("btn-secondary");

    document.getElementById("formSignInSubmitAdmin").disabled = true;
    document.getElementById("formSignInSubmitAdmin").classList.remove("btn-info");
    document.getElementById("formSignInSubmitAdmin").classList.add("btn-light");


function jsSignUpSubmitEnable() {
    if (jsEmailRegexPattern.test(jsSignUpEmail.value) && jsPasswordRegexPattern.test(jsSignUpPassword.value) &&
        (jsSignUpPassword.value == jsSignUpPasswordConf.value)) {
        document.getElementById("formSignUpSubmit").disabled = false;
        document.getElementById("formSignUpSubmit").classList.remove("btn-secondary");
        document.getElementById("formSignUpSubmit").classList.add("btn-info");
    }else{
        document.getElementById("formSignUpSubmit").disabled = true;
        document.getElementById("formSignUpSubmit").classList.remove("btn-info");
        document.getElementById("formSignUpSubmit").classList.add("btn-secondary");

    }
}

function jsSignUpSubmitEnableAdmin() {
    if (jsEmailRegexPattern.test(jsSignUpEmailAdmin.value) && jsPasswordRegexPattern.test(jsSignUpPasswordAdmin.value) &&
        (jsSignUpPasswordAdmin.value == jsSignUpPasswordConfAdmin.value)) {
        document.getElementById("formSignUpSubmitAdmin").disabled = false;
        document.getElementById("formSignUpSubmitAdmin").classList.remove("btn-secondary");
        document.getElementById("formSignUpSubmitAdmin").classList.add("btn-warning");
    }else{
        document.getElementById("formSignUpSubmitAdmin").disabled = true;
        document.getElementById("formSignUpSubmitAdmin").classList.remove("btn-warning");
        document.getElementById("formSignUpSubmitAdmin").classList.add("btn-secondary");

    }
}

function jsSignInSubmitEnable() {
    if (jsEmailRegexPattern.test(jsSignInEmail.value) && jsPasswordRegexPattern.test(jsSignInPassword.value) ) {
        document.getElementById("formSignInSubmit").disabled = false;
        document.getElementById("formSignInSubmit").classList.remove("btn-light");
        document.getElementById("formSignInSubmit").classList.add("btn-warning");
    }else{
        document.getElementById("formSignInSubmit").disabled = true;
        document.getElementById("formSignInSubmit").classList.remove("btn-warning");
        document.getElementById("formSignInSubmit").classList.add("btn-light");
    }
}

function jsSignInSubmitEnableAdmin() {
    if (jsEmailRegexPattern.test(jsSignInEmailAdmin.value) && jsPasswordRegexPattern.test(jsSignInPasswordAdmin.value)) {
        document.getElementById("formSignInSubmitAdmin").disabled = false;
        document.getElementById("formSignInSubmitAdmin").classList.remove("btn-light");
        document.getElementById("formSignInSubmitAdmin").classList.add("btn-info");
    }else{
        document.getElementById("formSignInSubmitAdmin").disabled = true;
        document.getElementById("formSignInSubmitAdmin").classList.remove("btn-info");
        document.getElementById("formSignInSubmitAdmin").classList.add("btn-light");
    }
}

function jsSignUpValidateEmail() {
    jsSignUpSubmitEnable();
    if(!jsEmailRegexPattern.test(jsSignUpEmail.value)) {
        if (!document.getElementById("formSignUpEmailInvalidFeedback")) {
            jsSignUpEmail.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpEmailInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("This is not a valid email address");
            newElement.appendChild(newElementContent);
            jsSignUpEmail.parentNode.insertBefore(newElement, jsSignUpEmail.nextSibling);
        }
    }else{
        if (document.getElementById("formSignUpEmailInvalidFeedback")) {
            document.getElementById("formSignUpEmailInvalidFeedback").parentElement.removeChild(document.
            getElementById("formSignUpEmailInvalidFeedback"));
        }
        jsSignUpEmail.classList.remove("is-invalid");
        jsSignUpEmail.classList.add("is-valid");
    }
}

function jsSignInValidateEmail() {
    jsSignInSubmitEnable();
    if(!jsEmailRegexPattern.test(jsSignInEmail.value)) {
        jsSignInEmail.classList.add("is-invalid");
    }else{
        jsSignInEmail.classList.remove("is-invalid");
        jsSignInEmail.classList.add("is-valid");
    }
}

function jsSignUpValidatePassword() {
    jsSignUpSubmitEnable();
    if (!jsPasswordRegexPattern.test(jsSignUpPassword.value)) {
        if (!document.getElementById("formSignUpPasswordInvalidFeedback")) {
            jsSignUpPassword.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpPasswordInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Password must be between 8 and 16 characters long, " +
                "with at least one uppercase and lowercase character, one number and one special character " +
                "(@, *, $ or #).");
            newElement.appendChild(newElementContent);
            jsSignUpPassword.parentNode.insertBefore(newElement, jsSignUpPassword.nextSibling);
        }
    } else if (jsSignUpPassword.value != jsSignUpPasswordConf.value) {
        if (!document.getElementById("formSignUpPasswordConfInvalidFeedback")) {
            jsSignUpPasswordConf.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpPasswordConfInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Passwords don't match!");
            newElement.appendChild(newElementContent);
            jsSignUpPasswordConf.parentNode.insertBefore(newElement, jsSignUpPasswordConf.nextSibling);
        }
        if (document.getElementById("formSignUpPasswordInvalidFeedback")) {
            document.getElementById("formSignUpPasswordInvalidFeedback").parentElement.removeChild
            (document.getElementById("formSignUpPasswordInvalidFeedback"));
        }
        jsSignUpPassword.classList.remove("is-invalid");
        jsSignUpPassword.classList.add("is-valid");
    } else {
        if (document.getElementById("formSignUpPasswordConfInvalidFeedback")) {
            document.getElementById("formSignUpPasswordConfInvalidFeedback").parentElement.removeChild
            (document.getElementById("formSignUpPasswordConfInvalidFeedback"));
        }
        jsSignUpPasswordConf.classList.remove("is-invalid");
        jsSignUpPasswordConf.classList.add("is-valid");
    }
}

function jsSignInValidatePassword() {
    jsSignInSubmitEnable();
    if(!jsPasswordRegexPattern.test(jsSignInPassword.value)) {
        jsSignInPassword.classList.add("is-invalid");
    }else{
        jsSignInPassword.classList.remove("is-invalid");
        jsSignInPassword.classList.add("is-valid");
    }
}

function jsSignUpValidateEmailAdmin() {
    jsSignUpSubmitEnableAdmin();
    if(!jsEmailRegexPattern.test(jsSignUpEmailAdmin.value)) {
        if (!document.getElementById("formSignUpEmailAdminInvalidFeedback")) {
            jsSignUpEmailAdmin.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpEmailAdminInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("This is not a valid email address");
            newElement.appendChild(newElementContent);
            jsSignUpEmailAdmin.parentNode.insertBefore(newElement, jsSignUpEmailAdmin.nextSibling);
        }
    }else{
        if (document.getElementById("formSignUpEmailAdminInvalidFeedback")) {
            document.getElementById("formSignUpEmailAdminInvalidFeedback").parentElement.removeChild(document.
            getElementById("formSignUpEmailAdminInvalidFeedback"));
        }
        jsSignUpEmailAdmin.classList.remove("is-invalid");
        jsSignUpEmailAdmin.classList.add("is-valid");
    }
}

function jsSignInValidateEmailAdmin() {
    jsSignInSubmitEnableAdmin();
    if(!jsEmailRegexPattern.test(jsSignInEmailAdmin.value)) {
        jsSignInEmailAdmin.classList.add("is-invalid");
    }else{
        jsSignInEmailAdmin.classList.remove("is-invalid");
        jsSignInEmailAdmin.classList.add("is-valid");
    }
}

function jsSignUpValidatePasswordAdmin() {
    jsSignUpSubmitEnableAdmin();
    if (!jsPasswordRegexPattern.test(jsSignUpPasswordAdmin.value)) {
        if (!document.getElementById("formSignUpPasswordAdminInvalidFeedback")) {
            jsSignUpPasswordAdmin.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpPasswordAdminInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Password must be between 8 and 16 characters long, " +
                "with at least one uppercase and lowercase character, one number and one special character " +
                "(@, *, $ or #).");
            newElement.appendChild(newElementContent);
            jsSignUpPasswordAdmin.parentNode.insertBefore(newElement, jsSignUpPasswordAdmin.nextSibling);
        }
    } else if (jsSignUpPasswordAdmin.value != jsSignUpPasswordConfAdmin.value) {
        if (!document.getElementById("formSignUpPasswordConfAdminInvalidFeedback")) {
            jsSignUpPasswordConfAdmin.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpPasswordConfAdminInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Passwords don't match!");
            newElement.appendChild(newElementContent);
            jsSignUpPasswordConfAdmin.parentNode.insertBefore(newElement, jsSignUpPasswordConfAdmin.nextSibling);
        }
        if (document.getElementById("formSignUpPasswordAdminInvalidFeedback")) {
            document.getElementById("formSignUpPasswordAdminInvalidFeedback").parentElement.removeChild
            (document.getElementById("formSignUpPasswordAdminInvalidFeedback"));
        }
        jsSignUpPasswordAdmin.classList.remove("is-invalid");
        jsSignUpPasswordAdmin.classList.add("is-valid");
    } else {
        if (document.getElementById("formSignUpPasswordConfAdminInvalidFeedback")) {
            document.getElementById("formSignUpPasswordConfAdminInvalidFeedback").parentElement.removeChild
            (document.getElementById("formSignUpPasswordConfAdminInvalidFeedback"));
        }
        jsSignUpPasswordConfAdmin.classList.remove("is-invalid");
        jsSignUpPasswordConfAdmin.classList.add("is-valid");
    }
}

function jsSignInValidatePasswordAdmin() {
    jsSignInSubmitEnableAdmin();
    if(!jsPasswordRegexPattern.test(jsSignInPasswordAdmin.value)) {
        jsSignInPasswordAdmin.classList.add("is-invalid");
    }else{
        jsSignInPasswordAdmin.classList.remove("is-invalid");
        jsSignInPasswordAdmin.classList.add("is-valid");
    }
}