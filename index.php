<?php require_once 'vistas/cabecera.php'; ?>
<body>
   <header class="bg-dark p-3">
      <div class="">
         <p class="h1 text-white font-weight-bold text-center">Registro de Reportes</p>
      </div>
   </header>
   <main>
      <div class="container">
         <div class="d-flex justify-content-beetween mt-3">
            <div class="">
               <a href="agregar.php"><button class="btn btn-success text-center" type="button" name="button"><i class="fa fa-plus aling-text-center" aria-hidden="true"></i></button></a>
            </div>
         </div>


         <table class="table table-bordered mt-1">
            <thead class="thead-dark">
               <tr>
                  <th>Número de Reporte</th>
                  <th>ID Equipo</th>
                  <th>Edificio</th>
                  <th>Estado</th>
                  <th>Acción</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <th scope="row">4852</th>
                  <td>Ya88a1as</td>
                  <td>H</td>
                  <td>Activo</td>
                  <td><button class="btn btn-primary" type="button" name="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  <button class="btn btn-warning" type="button" name="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                  <button class="btn btn-danger" type="button" name="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button> </td>
               </tr>
            </tbody>

         </table>

      </main>
