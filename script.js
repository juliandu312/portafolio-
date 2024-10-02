$(document).ready(function () {
    $("#tablaProductos").DataTable({
      scrollX: true,
      layout: {
      },
      language: {
        processing: "Tratamiento en curso...",
        search: "<i class='fa-solid fa-magnifying-glass'></i>Buscar&nbsp;:" ,
        lengthMenu: "Lista productos _MENU_ ",
        /*info: " _START_  _END_  _TOTAL_",*/
        infoEmpty: "No existen datos.",
        infoFiltered: "(filtrado de _MAX_ elementos en total)",
        infoPostFix: "",
        loadingRecords: "Cargando...",
        zeroRecords: "No se encontraron los productos con tu busqueda",
        emptyTable: "No hay datos disponibles en la tabla.",
        paginate: {
          first: "Primero",
          previous: "Anterior",
          next: "Siguiente",
          last: "Ultimo",
        },
        aria: {
          sortAscending: ": active para ordenar la columna en orden ascendente",
          sortDescending: ": active para ordenar la columna en orden descendente",
        },
      },
      lengthMenu: [
        [5, 10, 25, -1],
        [5, 10, 25, "Todos"],
      ],
    });
  });