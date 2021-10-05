window.onload = main;
var peticion;


function main(){

   let etiquetaVista = document.getElementsByClassName('fa-eye');
   let etiquetaEditar = document.getElementsByClassName('fa-pencil');
   let guardar = document.getElementById('guardarCambios');

   iniciarEventoBoton(etiquetaVista,1);
   iniciarEventoBoton(etiquetaEditar,2);
   guardar.addEventListener('click',guardarCambios);

}


function guardarCambios(){
   let valor = document.getElementById('idReporte').value;
   hacerPeticion(valor,3);

}

function iniciarEventoBoton(etiqueta,bandera){
   let tam = etiqueta.length;

   for(var i = 0; i < tam; i++) {
      etiqueta[i].parentNode.addEventListener('click',function(e){
         let valor = e.target.value;

         if(typeof valor == 'undefined'){
            if(e.target.hasAttributes('value')){
               valor = e.target.getAttribute('value');
            }
         }

         hacerPeticion(valor,bandera);

      });
   }
}

function hacerPeticion(valor , bandera ){
   peticion = new XMLHttpRequest();

   switch(bandera){
      case 1:
         peticion.onreadystatechange = function(){
            llenarModal(1);
         };

         //realizamos peticion
         peticion.open('GET','ajax/vista.php?id='+valor);
         peticion.send();
      break;
      case 2:
         peticion.onreadystatechange = function(){
            llenarModal(2);
         };

         //realizamos peticion
         peticion.open('POST','ajax/vista.php?id='+valor);
         peticion.send();
      break;
      case 3:
         peticion.onreadystatechange= function(){
            editarCambios();
         }
         peticion.open('POST','ajax/editar.php?id='+valor);
         peticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
         peticion.send(prepararDatos());

      break;
   }

}



function editarCambios(){
   let padre = document.getElementById
   if(peticion.readyState == 4 && peticion.status == 200){
      let respuesta =  peticion.responseText;

      console.log(respuesta);

      if(respuesta == '1'){
         document.getElementById('modalEditar').style.display = 'none';
         bootbox.alert("El reporte se modificó correctamente",function(){
            location.reload();
         });

      }
   }
}

function prepararDatos(){
   let numReporte = document.getElementById('numReporteEditar').value;
   let idEquipo = document.getElementById('idEquipoEditar').value;
   let nombre = document.getElementById('nombreEditar').value;
   let edificio = document.getElementById('edificioEditar').value;
   let estado = document.getElementById('statusEditar').value , str = ' ';
   let descripcion = document.getElementById('descripcionEditar').value;
   let numSerial = document.getElementById('numSerialEditar').value;
   let idPersona = document.getElementById('idPersona').value;

   if(estado == 'Cancelado'){
      estado = '0';
   }else if(estado == 'Activo'){
      estado = '1';
   }else{
      estado = '2';
   }

   str = "numReporte="+numReporte+"&idEquipo="+idEquipo+"&nombre="+nombre+"&edificio="+edificio+"&estado="+estado+"&descripcion="+descripcion+"&numSerial="+numSerial+"&idPersona="+idPersona;


   return str;
}

function llenarModal(bandera){
   let datos;

   if(peticion.readyState == 4 && peticion.status == 200){

      datos = JSON.parse(peticion.responseText);

      switch(bandera){
         case 1:
            document.getElementById('hora').value = datos['hora'];
            document.getElementById('numReporte').value = datos['numReporte'];
            document.getElementById('fecha').value = datos['fecha'];
            document.getElementById('idEquipo').value = datos['idEquipo'];
            document.getElementById('nombre').value = datos['nombre']+" " + datos['apellidoPaterno'] + " " + datos['apellidoMaterno'];
            document.getElementById('edificio').value = datos['edificio'];

            if(datos['estado'] == '0'){
               document.getElementById('status').value = 'Cancelado';
            }else if(datos['estado'] == '1'){
               document.getElementById('status').value = 'Activo';
            }else{
               document.getElementById('status').value = 'En proceso';
            }
            document.getElementById('descripcion').value = datos['descripcion'];
            document.getElementById('numSerial').value = datos['numSerial'];
         break;
         case 2:
            document.getElementById('horaEditar').value = datos['hora'];
            document.getElementById('numReporteEditar').value = datos['numReporte'];
            document.getElementById('fechaEditar').value = datos['fecha'];
            document.getElementById('idEquipoEditar').value = datos['idEquipo'];
            document.getElementById('nombreEditar').value = datos['nombre'] + " " + datos['apellidoPaterno'] + " " + datos['apellidoMaterno'];
            document.getElementById('edificioEditar').value = datos['edificio'];

            if(datos['estado'] == '0'){
               document.getElementById('statusEditar').value = 'Cancelado';
            }else if(datos['estado'] == '1'){
               document.getElementById('statusEditar').value = 'Activo';
            }else{
               document.getElementById('statusEditar').value = 'En proceso';
            }
            document.getElementById('descripcionEditar').value = datos['descripcion'];
            document.getElementById('numSerialEditar').value = datos['numSerial'];
            document.getElementById('idPersona').value = datos['idPersona'];
            document.getElementById('idReporte').value = datos['id'];
         break;
       }

   }

}
