
function showUser(str) {
    if (str == "") {
        document.getElementById("messagesUserConversation").innerHTML = "Select at least one user!";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("messagesUserConversation").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET", "getuser.php?q=" + str, true);
    xmlhttp.send();
}
