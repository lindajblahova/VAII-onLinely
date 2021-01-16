document.getElementById("searchUserProfilesFormMenu").hidden = true;

function jssearchUserProfilesForm() {
    var input, filter, ul, li, a, i;

    input = document.getElementById("searchUserProfilesForm");
    filter = input.value.toUpperCase();
    var value = $.trim($(filter).val());
    ul = document.getElementById("searchUserProfilesFormMenu");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];

        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            document.getElementById("searchUserProfilesFormMenu").hidden = false;
            li[i].style.display = "";
        }
        else {
            li[i].style.display = "none";
        }
    }
    if (a.innerHTML.toUpperCase().indexOf(filter) === 0 ) {
        document.getElementById("searchUserProfilesFormMenu").hidden = true;
        li[i].style.display = "";
    }
}
