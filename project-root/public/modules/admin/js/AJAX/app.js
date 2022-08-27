//bar chart by color
$(document).ready(function()
{ 
  qtys = [];
  names =  [];

  // push json data to its own variables
  for(var i in grouped_items)
  {
    names.push(grouped_items[i].name);
    qtys.push(grouped_items[i].qty);
  }
  

  var chartdata = {
    labels: names,
    datasets : [
      {
        
        label: 'Currently in Stock',
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "blue", "grey", "brown", "orange", "purple", "gold", "green" ],
        borderColor: "#e8c3b9",
        hoverBackgroundColor: "#3cba9f",
        hoverBorderColor: "#8e5ea2",
        barPercentage: 1.0,
        barThickness: 50,
        maxBarThickness: 50,
        minBarLength: 2,
        data: qtys
      }
    ]
  };
//  initialize chart
  var ctx = $("#colors-chart");
  var barGraph = new Chart(ctx, {
    type: 'bar',
    data: chartdata
  });

  new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: names,
      datasets: [{
        label: "Items",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "blue", "grey", "brown", "orange", "purple", "gold", "green" ],
        data: qtys
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Items'
      }
    }





});






});
  