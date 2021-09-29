$(document).ready(function() {
   $('#tabla').DataTable( {
         "lengthMenu":[5,10,15,20],
         "order":[[2,"asc"]],
         "language":{
            "emptyTable":"No hay datos que mostrar",
            "search": "Buscar:",
            "lengthMenu": 'Mostrar Datos _MENU_',
            "info":'Mostrando _START_ de _TOTAL_ reportes',
            "infoEmpty":'Mostrando 0 de 0 entradas',
            "processing":"Procesando...",
            "paginate":{
               "first":'Primero',
               "last":'Ultimo',
               "next":'Siguiente',
               "previous":'Anterior'
            },
         },
      });
});
