var jsSettingsBasicsAge = document.getElementById("formSettingsBasicsAge");
var jsSettingsBasicsRegexPatternAge = /^[0-9]{1,2}$/;

function jsSettingsValidateAge(elementId) {
    var element = document.getElementById(elementId);

    if (!jsSettingsBasicsRegexPatternAge.test(element.value)) {
        if (!document.getElementById(elementId + "InvalidFeedback")) {
            element.classList.add("is-invalid");
            var newElement = document.createElement("div");
            newElement.setAttribute("id", elementId + "InvalidFeedback");
            newElement.classList.add("invalid-feedback");
            var newElementContent = document.createTextNode("Age must be between 0 and 99 and can not contain letters.");
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

