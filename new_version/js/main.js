if(window.location.href.indexOf("feed") >= 0){
    document.getElementById("feed_msg").innerHTML = "the cat has been fed";
}
else{
    document.getElementById("feed_msg").innerHTML = "";
}

var xmlhttp = new XMLHttpRequest();
var url = "php/entries.php";

xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        parseEntries(xmlhttp.responseText);
    }
}
xmlhttp.open("GET", url, true);
xmlhttp.send();

function parseEntries(response) {
    var arr = JSON.parse(response);
    var i;
    var text = "";
    for(i = 0; i < arr.length; i++) {
        text += "<div class='row'><div class='col-sm-12 shadowbox img-rounded'> <p>" +
            arr[i].entry +
            "</p><p>"    +
            arr[i].mood  +
            "</p></div></div><br><br>";
    }
    document.getElementById("entries").innerHTML = text;
}

