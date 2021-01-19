document.getElementById("mySearchProfileMenu").hidden = true;

function myFunction() {
    var input, filter, ul, li, a, i;
   document.getElementById("mySearchProfileMenu").hidden = false;
    input = document.getElementById("mySearchProfile");
    filter = input.value.toUpperCase();
    var value = $.trim($(filter).val());
    ul = document.getElementById("mySearchProfileMenu");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];

        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {

            li[i].style.display = "";
        }
        else {
            li[i].style.display = "none";
        }
    }
}
