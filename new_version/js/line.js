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



		var randomScalingFactor = function(){ return Math.round(Math.random()*10)};
		var lineChartData = {
			labels : ["January","February","March","April","May","June","July"],
			datasets : [
            {
				label: "Feedings",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            }]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
	
	
	/*
    	
    	datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
				{
					label: "My Second dataset",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				}
			]
			
			
			*/