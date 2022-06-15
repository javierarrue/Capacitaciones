//Todos los estados de los cursos sugeridos
//Grafica de barras
  const labelscourses = [
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

  const datacourses = {
    labels: labelscourses,
    datasets: [{
      label: 'Gráfica',
      backgroundColor: [
        'rgba(255, 99, 132)',
        'rgba(255, 159, 64)',
        'rgba(255, 205, 86)',
        'rgba(75, 192, 192)',
        'rgba(54, 162, 235)',
        'rgba(153, 102, 255)',
        'rgba(75, 192, 192)',
        'rgba(153, 102, 255)',
        'rgba(255, 99, 132)',
        'rgba(255, 159, 64)'
      ],
      data: [25, 194, 5, 2, 20, 30, 45,32,44,34],
    }]
  };

  const configcourses = {
    type: 'pie',
    data: datacourses,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  const courses = new Chart(
    document.getElementById('courses'),
    configcourses
  );

  //-----------------------------------------
  //Direcciones

  const datadirecciones = {
    labels: [
      'Red',
      'Green',
      'Yellow',
      'Grey',
      'Blue'
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [11, 16, 7, 3, 14],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(75, 192, 192)',
        'rgb(255, 205, 86)',
        'rgb(201, 203, 207)',
        'rgb(54, 162, 235)'
      ]
    }]
  };

  const configdirecciones = {
    type: 'polarArea',
    data: datadirecciones,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  const annualdirecciones = new Chart(
    document.getElementById('direcciones'),
    configdirecciones
  );

  //--------------------------------------------
  //Géneros

  const dataGenders = {
    labels: [
      'Hombre',
      'Mujer'
    ],
    datasets: [{
      label: 'Cursos impartidos por géneros',
      data: [300, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)'
      ],
      hoverOffset: 4
    }]
  };

  const configGenders = {
    type: 'bar',
    data: dataGenders,
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  };

  const genders = new Chart(
    document.getElementById('genders'),
    configGenders
  );