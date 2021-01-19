document.getElementById("myMenu").hidden = true;

function myFunction() {
    var input, filter, ul, li, a, i;

    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    var value = $.trim($(filter).val());
    ul = document.getElementById("myMenu");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];

        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            document.getElementById("myMenu").hidden = false;
            li[i].style.display = "";
        }
        else {
            li[i].style.display = "none";
            //document.getElementById("myMenu").hidden = true;
        }
    }
    if (a.innerHTML.toUpperCase().indexOf(filter) === 0 ) {
        document.getElementById("myMenu").hidden = true;
        li[i].style.display = "";
    }
}
