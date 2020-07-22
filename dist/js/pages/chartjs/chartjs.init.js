$(function() {
  "use strict";
  // Bar chart
  var chartData = JSON.parse($chart_data),
  // New chart
  new Chart(document.getElementById("pie-chart"), {
    type: "pie",
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#03dbfc", "#03fc8c", "#fc0390", "#8fa0f3"],
          data: [2478, 5267, 3734, 2784]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: "Classes"
      }
    }
  });
  // line second
});
