//bar chart by color
$(document).ready(function()
{ 
  // console.log(items_json)
  items = JSON.parse(JSON.stringify(items_json));
//   items = ;


// console.log(items);
//   category = {};
  qtys = [];
  names =  [];
  colors = [];;



  // push json data to its own variables
  // set chart data
  for(var i in items)
  {
    
      names.push(items_json[i].name);
      colors.push(items_json[i].color);
      qtys.push(items_json[i].qty);
  }
 
  console.log(names, colors, qtys);


  // for(var i in unique_colors)
  // {
  //   colors.push(unique_colors[i]);
  // }
  // for(var i in unique_items)
  // {
  //   items.push(unique_items[i]);
  // }
  var chartdata = {
    labels: names,
    datasets : [
      {
        label: 'Colors',
        backgroundColor: 'rgba(200, 200, 200, 0.75)',
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
        barPercentage: 0.5,
        barThickness: 6,
        maxBarThickness: 8,
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
  