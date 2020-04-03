// Dashboard 1 Morris-chart
$(function() {
  "use strict";
  Morris.Area({
    element: "morris-area-chart",
    data: [
      {
        paper: "1",
        marks: 50,
        d_rank: 80,
        c_rank: 40,
        z_score: 20
      },
      {
        paper: "2",
        marks: 130,
        d_rank: 100,
        c_rank: 50,
        z_score: 80
      },
      {
        paper: "3",
        marks: 80,
        d_rank: 60,
        c_rank: 30,
        z_score: 70
      },
      {
        paper: "4",
        marks: 70,
        d_rank: 200,
        c_rank: 100,
        z_score: 140
      },
      {
        paper: "5",
        marks: 180,
        d_rank: 150,
        c_rank: 75,
        z_score: 140
      },
      {
        paper: "6",
        marks: 105,
        d_rank: 100,
        c_rank: 50,
        z_score: 80
      },
      {
        paper: "7",
        marks: 250,
        d_rank: 150,
        c_rank: 75,
        z_score: 200
      }
    ],
    xkey: "paper",
    ykeys: ["marks", "d_rank", "c_rank", "z_score"],
    labels: ["marks", "d_rank", "c_rank", "z_score"],
    pointSize: 6,
    fillOpacity: 0,
    pointStrokeColors: [
      "rgb(69, 66, 247)",
      "aquamarine",
      "rgb(236, 255, 127)",
      "rgb(245, 59, 105)"
    ],
    behaveLikeLine: true,
    gridLineColor: "#e0e0e0",
    lineWidth: 5,
    hideHover: "auto",
    lineColors: [
      "rgb(69, 66, 247)",
      "aquamarine",
      "rgb(236, 255, 127)",
      "rgb(245, 59, 105)"
    ],
    resize: true
  });
});
