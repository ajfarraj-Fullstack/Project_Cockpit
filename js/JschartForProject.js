  new Chart(document.getElementById("chart1"), {
      type: "bar",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr"],
        datasets: [{ data: [20, 40, 60, 90], backgroundColor: '#0E79BE' }]
      }
    });

    new Chart(document.getElementById("chart2"), {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr"],
        datasets: [{ data: [10, 30, 50, 70], borderColor: '#063858', fill: false, tension: 0.4 }]
      }
    });