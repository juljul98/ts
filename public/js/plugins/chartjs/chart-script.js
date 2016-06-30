var trendingLineChart;
var arraydata = [];
var sdata;
var doughnutData;

var yearHE = $('#yearHE').val();
$.ajax({
  type: 'get',
  url: base_url + 'admin/getCountForChart',
  data: { "yearHE": yearHE },
  success: function(response) {
    var count = response.empcount.length;
    for(x = 0; x<count ; x++) {
      var values = response.empcount[x];
      arraydata.push(values);
      $('.employeeCount tr:nth-child('+ (x+1) +') td:first').text(response.empcount[x]);
      $('.totalcount').text(response.total);
      var regemp = response.registeredcount.employees.total,
          pendemp = response.pendingcount.employees.total
      var result =  regemp + pendemp;
      $('.totalEmp').text(result)
    }
    sdata = {
      labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets : [
        {
          label: "First dataset",
          fillColor : "rgba(128, 222, 234, 0.6)",
          strokeColor : "#ffffff",
          pointColor : "#00bcd4",
          pointStrokeColor : "#ffffff",
          pointHighlightFill : "#ffffff",
          pointHighlightStroke : "#ffffff",
          data:  arraydata
        }
      ]
    };
    doughnutData = [
      {
        value: regemp,
        color:"#2980b9",
        highlight: "#3498db",
        label: "Registered"
      },
      {
        value: pendemp,
        color: "#27ae60",
        highlight: "#2ecc71",
        label: "Pending"
      }
    ];
    clineChart();
    cdoughnut();
  }
});
$('#yearHE').change(function() {
  arraydata = [];
  var yearHE = $(this).val();
  $('.yearCount').text(yearHE);
  $.ajax({
    type: 'get',
    url: base_url + 'admin/getCountForChart',
    data: { "yearHE": yearHE },
    success: function(response) {
      sdata = '';
      var count = response.empcount.length;
      for(x = 0; x<count ; x++) {
        var values = response.empcount[x];
        arraydata.push(values);
        $('.employeeCount tr:nth-child('+ (x+1) +') td:first').text(response.empcount[x]);
        $('.totalcount').text(response.total);
      }
      sdata = {
        labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets : [
          {
            label: "First dataset",
            fillColor : "rgba(128, 222, 234, 0.6)",
            strokeColor : "#ffffff",
            pointColor : "#00bcd4",
            pointStrokeColor : "#ffffff",
            pointHighlightFill : "#ffffff",
            pointHighlightStroke : "#ffffff",
            data:  arraydata
          }
        ]
      };
      clineChart();
    }
  });
});
var radarChartData = {
  labels: ["Chrome", "Mozilla", "Safari", "IE10", "iPhone"],
  datasets: [
      {
          label: "First dataset",
          fillColor: "rgba(255,255,255,0.2)",
          strokeColor: "#fff",
          pointColor: "#00796b",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "#fff",
          data: [5,6,7,8,6]
      }
  ],
};
cBrowser();
function clineChart(){
  var trendingLineChart = document.getElementById("trending-line-chart").getContext("2d");
  window.trendingLineChart = new Chart(trendingLineChart).Line(sdata, {		
      scaleShowGridLines : true,///Boolean - Whether grid lines are shown across the chart		
      scaleGridLineColor : "rgba(255,255,255,0.4)",//String - Colour of the grid lines		
      scaleGridLineWidth : 1,//Number - Width of the grid lines		
      scaleShowHorizontalLines: true,//Boolean - Whether to show horizontal lines (except X axis)		
      scaleShowVerticalLines: false,//Boolean - Whether to show vertical lines (except Y axis)		
      bezierCurve : true,//Boolean - Whether the line is curved between points		
      bezierCurveTension : 0.4,//Number - Tension of the bezier curve between points		
      pointDot : true,//Boolean - Whether to show a dot for each point		
      pointDotRadius : 5,//Number - Radius of each point dot in pixels		
      pointDotStrokeWidth : 2,//Number - Pixel width of point dot stroke		
      pointHitDetectionRadius : 20,//Number - amount extra to add to the radius to cater for hit detection outside the drawn point		
      datasetStroke : true,//Boolean - Whether to show a stroke for datasets		
      datasetStrokeWidth : 3,//Number - Pixel width of dataset stroke		
      datasetFill : true,//Boolean - Whether to fill the dataset with a colour				
      animationSteps: 15,// Number - Number of animation steps		
      animationEasing: "easeOutQuart",// String - Animation easing effect			
      tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label		
      scaleFontSize: 12,// Number - Scale label font size in pixels		
      scaleFontStyle: "normal",// String - Scale label font weight style		
      scaleFontColor: "#fff",// String - Scale label font colour
      tooltipEvents: ["mousemove", "touchstart", "touchmove"],// Array - Array of string names to attach tooltip events		
      tooltipFillColor: "rgba(255,255,255,0.8)",// String - Tooltip background colour		
      tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label		
      tooltipFontSize: 12,// Number - Tooltip label font size in pixels
      tooltipFontColor: "#000",// String - Tooltip label font colour		
      tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label		
      tooltipTitleFontSize: 14,// Number - Tooltip title font size in pixels		
      tooltipTitleFontStyle: "bold",// String - Tooltip title font weight style		
      tooltipTitleFontColor: "#000",// String - Tooltip title font colour		
      tooltipYPadding: 8,// Number - pixel width of padding around tooltip text		
      tooltipXPadding: 16,// Number - pixel width of padding around tooltip text		
      tooltipCaretSize: 10,// Number - Size of the caret on the tooltip		
      tooltipCornerRadius: 6,// Number - Pixel radius of the tooltip border		
      tooltipXOffset: 10,// Number - Pixel offset from point x to tooltip edge
      responsive: true
      });
};
function cdoughnut(){
      var doughnutChart = document.getElementById("doughnut-chart").getContext("2d");
      window.myDoughnut = new Chart(doughnutChart).Doughnut(doughnutData, {
          segmentStrokeColor : "#fff",
          tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label		
          percentageInnerCutout : 50,
          animationSteps : 15,
          segmentStrokeWidth : 4,
          animateScale: true,
          percentageInnerCutout : 60,
          responsive : true
      });
};
function cBrowser(){
  		window.trendingRadarChart = new Chart(document.getElementById("trending-radar-chart").getContext("2d")).Radar(radarChartData, {
  		    angleLineColor : "rgba(255,255,255,0.5)",//String - Colour of the angle line		    
  		    pointLabelFontFamily : "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
  		    pointLabelFontColor : "#fff",//String - Point label font colour
  		    pointDotRadius : 4,
  		    animationSteps:15,
  		    pointDotStrokeWidth : 2,
  		    pointLabelFontSize : 12,
  			responsive: true
  		});
};