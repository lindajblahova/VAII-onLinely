var jsSettingsBasicsFirstName = document.getElementById("formSettingsBasicsFirstName");
var jsSettingsBasicsLastName = document.getElementById("formSettingsBasicsLastName");
var jsSettingsBasicsNickName = document.getElementById("formSettingsBasicsNickName");
var jsSettingsBasicsAge = document.getElementById("formSettingsBasicsAge");
var jsSettingsBasicsTown = document.getElementById("formSettingsBasicsTown");
var jsSettingsBasicsHobbies = document.getElementById("formSettingsBasicsHobbies");
var jsSettingsBasicsSubmit = document.getElementById("formSettingsBasicsSubmit");
var jsSettingsBasicsRegexPatternName = /^[a-zA-Z]{3,50}$/;
var jsSettingsBasicsRegexPatternAge = /^[0-9]{1,2}$/;
var jsSettingsBasicsRegexPatternHobbies = /^[^<>]{1,}$/;

jsSettingsBasicsSubmit.disabled = true;
jsSettingsBasicsSubmit.classList.remove("btn-info");
jsSettingsBasicsSubmit.classList.add("btn-danger");


function jsSettingsBasicsSubmitEnable() {
    if (jsSettingsBasicsRegexPatternName.test(jsSettingsBasicsFirstName.value) ||
        jsSettingsBasicsRegexPatternName.test(jsSettingsBasicsLastName.value) ||
        jsSettingsBasicsRegexPatternName.test(jsSettingsBasicsNickName.value) ||
        jsSettingsBasicsRegexPatternName.test(jsSettingsBasicsTown.value) ||
        jsSettingsBasicsRegexPatternAge.test(jsSettingsBasicsAge.value) ||
        jsSettingsBasicsRegexPatternHobbies.test(jsSettingsBasicsHobbies.value)  ) {
        jsSettingsBasicsSubmit.disabled = false;
        jsSettingsBasicsSubmit.classList.remove("btn-danger");
        jsSettingsBasicsSubmit.classList.add("btn-info");
    }else{
        jsSettingsBasicsSubmit.disabled = true;
        jsSettingsBasicsSubmit.classList.remove("btn-info");
        jsSettingsBasicsSubmit.classList.add("btn-danger");
    }
}


function jsSettingsValidateName(elementId) {
    jsSettingsBasicsSubmitEnable();
    var element = document.getElementById(elementId);


    if (!jsSettingsBasicsRegexPatternName.test(element.value)) {
        if (!document.getElementById(elementId + "InvalidFeedback")) {
            element.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", elementId + "InvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode(jsShowInputFeedback(elementId));
            newElement.appendChild(newElementContent);
            element.parentNode.insertBefore(newElement, element.nextSibling);
        }
    } else {
        if (document.getElementById(elementId + "InvalidFeedback")) {
            document.getElementById(elementId + "InvalidFeedback").parentElement.removeChild(document.getElementById(elementId + "InvalidFeedback"));
        }
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
    }
}

function jsSettingsValidateHobbies(elementId) {
    jsSettingsBasicsSubmitEnable();
    var element = document.getElementById(elementId);

    if (!jsSettingsBasicsRegexPatternHobbies.test(element.value)) {
        if (!document.getElementById(elementId + "InvalidFeedback")) {
            element.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", elementId + "InvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode(jsShowInputFeedback(elementId));
            newElement.appendChild(newElementContent);
            element.parentNode.insertBefore(newElement, element.nextSibling);
        }
    } else {
        if (document.getElementById(elementId + "InvalidFeedback")) {
            document.getElementById(elementId + "InvalidFeedback").parentElement.removeChild(document.getElementById(elementId + "InvalidFeedback"));
        }
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
    }
}

function jsSettingsValidateAge(elementId) {
    jsSettingsBasicsSubmitEnable();
    var element = document.getElementById(elementId);


    if (!jsSettingsBasicsRegexPatternAge.test(element.value)) {
        if (!document.getElementById(elementId + "InvalidFeedback")) {
            element.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", elementId + "InvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode(jsShowInputFeedback(elementId));
            newElement.appendChild(newElementContent);
            element.parentNode.insertBefore(newElement, element.nextSibling);
        }
    } else {
        if (document.getElementById(elementId + "InvalidFeedback")) {
            document.getElementById(elementId + "InvalidFeedback").parentElement.removeChild(document.getElementById(elementId + "InvalidFeedback"));
        }
        element.classList.remove("is-invalid");
        element.classList.add("is-valid");
    }
}

function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "ajax_info.txt", true);
    xhttp.send();
}

