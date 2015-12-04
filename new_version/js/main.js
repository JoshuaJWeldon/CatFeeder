/* Cat Is Feed Message */
if(window.location.href.indexOf("feed") >= 0){
    document.getElementById("feed_msg").innerHTML = "the cat has been fed";
}
else{
    document.getElementById("feed_msg").innerHTML = "";
}

/* Display entries and Cats Mood*/
var entriesReq = new XMLHttpRequest();
entriesReq.onreadystatechange=function() {
    if (entriesReq.readyState == 4 && entriesReq.status == 200) {
        parseEntries(entriesReq.responseText);
    }
}
entriesReq.open("GET", "php/entries.php", true);
entriesReq.send();

function parseEntries(response) {
    var arr   = JSON.parse(response);
    var text  = "";
    var i;
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
    
    // Split timestamp into [ Y, M, D, h, m, s ]
    var t = (new Date() - new Date(arr[0].date))/3.6e6;
    var timeArray  = arr[0].date.split(/[- :]/);
    var todayArray = new Date().toString().split(/[- :]/);
    var time = todayArray[0] - timeArray[0]; //year
    var time = time * 12
    
    
    time = time - new Date("" + arr[0].date); //MS
    time = Math.round(((time % 86400000) % 3600000) / 60000); // minutes
    
    document.getElementById("mood").innerHTML = "-->" + t;
    
}

