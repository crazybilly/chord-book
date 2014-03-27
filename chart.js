/*
 google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);

	function getData () {
		var data = [];
		data[0] = ["Songname","Tempo"];

		$(document).ready(function() {
			$("#set ul li").each(function () {
			
				var subdata = [];

				sname = $(this).find(".songname").html();
				sname = $.trim(sname);

				stempo = $(this).find(".tempo").html();
				stempo = $.trim(stempo);
				stempo = parseFloat(stempo);

				subdata = [sname,stempo];

				data.push(subdata);

				chartWidth = stempo *20;
				$(this).css('width',"+="+chartWidth);
				});
			});

		return data;
	}


      function drawChart() {

	  var d = getData();
      var chartdata = google.visualization.arrayToDataTable(d);

        var options = {
		
		  chartArea: {
		  	top: 8,
			right: 8,
			height: "90%",
			width: "100%"
		  },

          hAxis: {
			gridlines: {
				color: "#DEDEDE"
		  	},
			textPosition: "none",
			baselineColor: "#dedede"
			},
		  legend: {
		  	position: "none"
			},
          vAxis: {
			gridlines: {
				color: "#DEDEDE"
		  	},
			textPosition: "none",
			baselineColor: "#dedede"
			}
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart-div'));
        chart.draw(chartdata, options);
      }


*/


$(document).ready(function() {
	$("#set ul li").each(function () {
		stempo = $(this).find(".tempo").html();
		stempo = $.trim(stempo);
		stempo = parseFloat(stempo);

		/* if on a touchscreen, make the bars a percentage, rather than fixed width*/
		if ( $('html').hasClass('touch') ) {

			/* anything over tempo 4 gets a percentage */
			if (stempo > 4) {
				chartWidth = (stempo*12)+"%" ; 

			/* anything slower than 4 is SLOW...set it to 40% so you can read the title */
			} else {
				chartWidth = "40%"
			}
			$(this).width(chartWidth);


		/* for normal screens, multiply tempo * 20 and set width in pixels */
		} else {
			multiplier = 20;
			chartWidth = stempo * multiplier; 
			$(this).css('width',"+="+chartWidth);
		}

	});



	/* make a sortable list update the chart 
	$(".chart-list").sortable({
		update: function () {
			 drawChart(); 
			}
	});
	*/


}); /* close the jQuery */;
