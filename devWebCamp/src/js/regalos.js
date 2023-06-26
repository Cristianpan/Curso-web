(() => {
  document.addEventListener("DOMContentLoaded", iniciarApp);

  function iniciarApp() {
    const grafica = document.querySelector("#regalos-grafica");

    if (grafica) {
      generarGrafica();
    }
  }

  async function generarGrafica (){
    const ctx = document.getElementById("regalos-grafica").getContext("2d");

    const {body: values} = await getValues() 

    console.log(values);

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: values.map(regalo => regalo.nombre),
        datasets: [
          {
            label: "",
            data: values.map(regalo => regalo.total),
            backgroundColor: [
              "rgba(255,99,132, 0.4)",
              "rgba(54,162,235, 0.4)",
              "rgba(255,206,86, 0.4)",
              "rgba(153,102,255, 0.4)",
              "rgba(255,159,64, 0.4)",
              "rgba(255,99,132, 0.4)",
              "rgba(54,162,235, 0.4)",
              "rgba(255,206,86, 0.4)",
            ],
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        plugins: {
          legend: {
            display: false,
          },
        },
      },
    });
  }


  async function getValues(){
    const url = "/api/regalos"; 

    const response = await fetch(url);
    
    return response.json();
  }


})();
