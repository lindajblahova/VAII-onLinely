function jsShowInputFeedback(elementId) {

    switch (elementId) {
        case "formMessagingRecipient":
            var feedbackMessage = "Choose the email address of the recipient."
            break;

        case "formMessagingContent":
            var feedbackMessage = "Message can not be empty and can not contain '<' and '>' characters. "
            break;

        case "formSettingsBasicsFirstName":
            var feedbackMessage = "First name must be between 3 and 50 characters long and can contain only  letters."
            break;

        case "formSettingsBasicsLastName":
            var feedbackMessage = "Last name must be between 3 and 50 characters long and can contain only  letters."
            break;

        case "formSettingsBasicsNickName":
            var feedbackMessage = "Nickname must be between 3 and 50 characters long and can contain only letters."
            break;

        case "formSettingsBasicsAge":
            var feedbackMessage = "Age must be between 0 and 99 and can not contain letters."
            break;

        case "formSettingsBasicsTown":
            var feedbackMessage = "Town must be between 3 and 50 characters long and can contain only letters."
            break;

        case "formGroupName":
            var feedbackMessage = "Group name can not be empty and can not contain '<' and '>' characters."
            break;

        case "formPostContent":
            var feedbackMessage = "Post can not be empty and can not contain '<' and '>' characters."
            break;

    }

    return feedbackMessage;
}
