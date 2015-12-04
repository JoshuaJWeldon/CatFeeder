if(window.location.href.indexOf("error") >= 0){
    document.getElementById("error_msg").innerHTML = "incorrect username and/or password";
}
else{
    document.getElementById("error_msg").innerHTML = "";
}