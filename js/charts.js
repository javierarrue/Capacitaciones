//Todos los estados de los cursos sugeridos
//Grafica de barras
  const labels = [
    'Pendiente',
    'Impartido',
    'En desarrollo',
    'Cancelado',
    'Programado al siguiente año',
    'En trámito de compras',
    'En trámite con proveedor local',
    'Solicitado a Organismo Internacional',
    'A incluir en el PAC del siguiente año',
    'Otro'
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Gráfica',
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: 'rgb(255, 99, 132)',
      data: [25, 194, 5, 2, 20, 30, 45,32,44,34],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );