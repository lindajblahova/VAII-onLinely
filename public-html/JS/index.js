var jsSignUpEmail = document.getElementById("formSignUpEmail");
var jsSignUpEmailAdmin = document.getElementById("formSignUpEmailAdmin");
var jsSignUpPassword = document.getElementById("formSignUpPassword");
var jsSignUpPasswordAdmin = document.getElementById("formSignUpPasswordAdmin");
var jsSignUpPasswordConf = document.getElementById("formSignUpPasswordConf");
var jsSignUpPasswordConfAdmin = document.getElementById("formSignUpPasswordConfAdmin");

var jsEmailRegexPattern = /^[\w]+@[\w]+\.+[\w]{2,3}$/;
var jsPasswordRegexPattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$/;

    document.getElementById("formSignUpSubmit").disabled = true;
    document.getElementById("formSignUpSubmit").classList.remove("btn-info");
    document.getElementById("formSignUpSubmit").classList.add("btn-secondary");

    document.getElementById("formSignUpSubmitAdmin").disabled = true;
    document.getElementById("formSignUpSubmitAdmin").classList.remove("btn-warning");
    document.getElementById("formSignUpSubmitAdmin").classList.add("btn-secondary");



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

function jsSignUpValidatePassword() {
    jsSignUpSubmitEnable();
    if (!jsPasswordRegexPattern.test(jsSignUpPassword.value)) {
        if (!document.getElementById("formSignUpPasswordInvalidFeedback")) {
            jsSignUpPassword.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpPasswordInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Password must be between 8 and 15 characters long, " +
                "with at least one uppercase and lowercase character and one number.");
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

function jsSignUpValidatePasswordAdmin() {
    jsSignUpSubmitEnableAdmin();
    if (!jsPasswordRegexPattern.test(jsSignUpPasswordAdmin.value)) {
        if (!document.getElementById("formSignUpPasswordAdminInvalidFeedback")) {
            jsSignUpPasswordAdmin.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", "formSignUpPasswordAdminInvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Password must be between 8 and 16 characters long, " +
                "with at least one uppercase and lowercase character and one number.");
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
