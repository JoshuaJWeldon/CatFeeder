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
/* Display entries*/
var entryArray = []

var entriesChartReq = new XMLHttpRequest();
entriesChartReq.onreadystatechange=function() {

	if (entriesChartReq.readyState == 4 && entriesChartReq.status == 200) {
		parseChartEntries(entriesChartReq.responseText);

	}
}
entriesChartReq.open("GET", "php/entries.php", true);
entriesChartReq.send();

function parseChartEntries(response) {
	var arr   = JSON.parse(response);
	var i;
	for(i = 0; i < arr.length; i++) {
		tempArray = [];
		var moodDate = "";
		moodDate = arr[i].date;
		console.log('date:');
		console.log(String(moodDate));
		console.log('year:');
		console.log(String(parseInt(moodDate.substring(0,4))));
		moodDate = Date.UTC(parseInt(moodDate.substring(0,4)), (parseInt(moodDate.substring(5,7)) - 1), (parseInt(moodDate.substring(8,10)) + 1), parseInt(moodDate.substring(11, 13)), parseInt(moodDate.substring(14, 16)), parseInt(moodDate.substring(17, 19)));
		console.log('utc date:');
		console.log(String(moodDate));

		tempArray[0] = moodDate;
		tempArray[1] = parseInt(arr[i].mood);
		entryArray[i] = tempArray;
	}

	var chart = new Highcharts.Chart({
		chart: {
			type: 'spline', renderTo: 'canvas'
		},
		title: {
			text: 'Mood over time'
		},
		subtitle: {
			text: 'Based on Journal Entries'
		},
		xAxis: {
			type: 'datetime',
			dateTimeLabelFormats: { // don't display the dummy year
				month: '%e. %b',
				year: '%b'
			},
			title: {
				text: 'Date'
			}
		},
		yAxis: {
			title: {
				text: 'Mood'
			},
			min: 0
		},
		tooltip: {
			headerFormat: '<b>{series.name}</b><br>',
			pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
		},

		plotOptions: {
			spline: {
				marker: {
					enabled: true
				}
			}
		},

		series: [{
			name: 'Mood',
			data: entryArray.reverse()
		}]
	});

}

/*
 var randomScalingFactor = function(){ return Math.round(Math.random()*10)};
 var lineChartData = {
 labels : entryDateArray.reverse(),
 datasets : [
 {
 label: "Feedings",
 fillColor : "rgba(220,220,220,0.2)",
 strokeColor : "rgba(220,220,220,1)",
 pointColor : "rgba(220,220,220,1)",
 pointStrokeColor : "#fff",
 pointHighlightFill : "#fff",
 pointHighlightStroke : "rgba(220,220,220,1)",
 data : entryMoodArray.reverse()
 }]

 }
 /*
 window.onload = function(){
 var ctx = document.getElementById("canvas").getContext("2d");
 moodChart = new Chart(ctx).Line(lineChartData, {
 responsive: true
 });
 }*/


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