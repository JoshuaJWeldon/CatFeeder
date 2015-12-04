if(window.location.href.indexOf("feed") >= 0){
    document.getElementById("feed_msg").innerHTML = "the cat has been fed";
}
else{
    document.getElementById("feed_msg").innerHTML = "";
}

var entriesReq = new XMLHttpRequest();

entriesReq.onreadystatechange=function() {
    if (entriesReq.readyState == 4 && entriesReq.status == 200) {
        parseEntries(entriesReq.responseText);
    }
}
entriesReq.open("GET", "php/entries.php", true);
entriesReq.send();

function parseEntries(response) {
    var arr = JSON.parse(response);
    var i;
    var text = "";
    for(i = 0; i < arr.length; i++) {
        text += "<div class='row'><div class='col-sm-12 shadowbox img-rounded'> <p><b>" +
            arr[i].date  +
            "</b></p><p>"+
            arr[i].entry +
            "</p><p>"    +
            arr[i].mood  +
            "</p></div></div><br><br>";
    }
    document.getElementById("entries").innerHTML = text;
}

/*

var feedingsReq = new XMLHttpRequest();

feedingsReq.onreadystatechange=function() {
    if (feedingsReq.readyState == 4 && feedingsReq.status == 200) {
        parseEntries(feedingsReq.responseText);
    }
}
feedingsReq.open("GET", "php/feedings.php", true);
feedingsReq.send();

function parseEntries(response) {
    var arr = JSON.parse(response);
    var i;
    var text = "";
    for(i = 0; i < arr.length; i++) {
        text += "<div class='row'><div class='col-sm-12 shadowbox img-rounded'> <p><b>" +
            arr[i].date  +
            "</b></p><p>"+
            arr[i].entry +
            "</p><p>"    +
            arr[i].mood  +
            "</p></div></div><br><br>";
    }
    document.getElementById("entries").innerHTML = text;
}

*/
