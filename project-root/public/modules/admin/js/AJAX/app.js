//bar chart by color
$(document).ready(function()
{ 
  var items = items_json;
  var colors = [];
  var names = [];
  var color_counts = [];
  var unique_names = [];
  //push json data to its own variables
  for (var i in items)
  {
    colors.push(items[i].color);
    names.push(items[i].name);
  }
  //get unique colors and counts of each
  for (var i = 0; i < colors.length; i++) {
     let calc = color_counts[colors[i]] = 1 + (color_counts[colors[i]] || 0);
     color_counts.push(calc);
  };
  //get unique names of items

  //set chart data
  var chartdata = {
    labels: names,
    datasets : [
      {
        label: 'Colors',
        backgroundColor: 'rgba(200, 200, 200, 0.75)',
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
        data: color_counts
      }
    ]
  };
//  initialize chart
  var ctx = $("#colors-chart");
  var barGraph = new Chart(ctx, {
    type: 'bar',
    data: chartdata
  });

    });
  