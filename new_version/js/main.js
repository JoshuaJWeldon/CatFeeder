/* Cat Is Feed Message */
if(window.location.href.indexOf("feed") >= 0){
    document.getElementById("feed_msg").innerHTML = "the cat has been fed";
}
else{
    document.getElementById("feed_msg").innerHTML = "";
}

/* Display entries*/
var entriesReq = new XMLHttpRequest();
entriesReq.onreadystatechange=function() {
  
    if (entriesReq.readyState == 4 && entriesReq.status == 200) {
        console.log("here");
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
}

/* Display entries and Cats Mood*/
var moodReq = new XMLHttpRequest();
moodReq.onreadystatechange=function() {
    if (moodReq.readyState == 4 && moodReq.status == 200) {
        parsemood(moodReq.responseText);
    }
}
moodReq.open("GET", "php/feedings.php", true);
moodReq.send();

function parsemood(response) {
    var arr    = JSON.parse(response);
    var mood   = getMood(arr[0].date.split(/[- :]/));
    var catImg = ['CatEmoji\\CryingCat.png','CatEmoji\\PoutingCat.png','CatEmoji\\WearyCat.png','CatEmoji\\SmirkingCat.png','CatEmoji\\SmilingCat.png','CatEmoji\\GrinningCat.png','CatEmoji\\HappyTearsCat.png','CatEmoji\\KissingCat.png','CatEmoji\\HeartEyesCat.png']
    //var catImg = ['CatEmoji\\HeartEyesCat.png','CatEmoji\\KissingCat.png','CatEmoji\\HappyTearsCat.png','CatEmoji\\GrinningCat.png','CatEmoji\\SmilingCat.png','CatEmoji\\SmirkingCat.png','CatEmoji\\WearyCat.png','CatEmoji\\PoutingCat.png','CatEmoji\\CryingCat.png'];
    document.getElementById("mood").innerHTML = '<img src="'+ catImg[mood] +'" class="center-block" id="face" alt="Heart Eyes Cat Face">';
    
}


function getMood(time){
    var daysInMon   = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
    var today       = new Date().toString().split(/[- :]/);
    var monthSpread = getMonthFromString(today[1]) - time[1];
    var daySpread   = 0;
    var minSpread   = 0;
    var mood        = 0;
    
    if(monthSpread > 1) return 0;
    else if(monthSpread == 1) daySpread = daysInMon[getMonthFromString(parseInt(today[1]))];
    
    daySpread += parseInt(today[2]) - parseInt(time[2]);
    
    minSpread = daySpread * 24 * 60 + (parseInt(today[4]) + 10 - parseInt(time[3])) * 60 + (parseInt(today[5]) - parseInt(time[4]));
    
    if(minSpread < 4 * 60){
        return 8;
    }
    minSpread -= 4*60;
    for (mood=8; minSpread > 0 && mood > 0; minSpread -= 30){
        mood--;
    }
    return mood;
           
}

function getMonthFromString(mon){
   return new Date(Date.parse(mon +" 1, 2012")).getMonth()+1
}


