window.onload = main;


function main(){
   let idEquipo = document.getElementById('idEquipo');

   idEquipo.addEventListener('change',validarIdEquipo);
   guardar.addEventListener('click',validarVacios);

}

function validarIdEquipo(e){
   let valor = e.target.value;

   if(isNaN(valor)){
      e.target.style.cssText = 'border: 1px solid red';
   }else{
      e.target.style.cssText = null;
   }


}


//Con este metodo voy a validar que los datos del formulario no esten vacios
function validarVacios(e){

   let numReporte = document.getElementById('numReporte').value;
   let idEquipo = document.getElementById('idEquipo').value;
   let numSerial = document.getElementById('numSerial').value;
   let edificio = document.getElementById('edificio').value;
   let descripcion = document.getElementById('descripcion').value;
   let guardar = document.getElementById('guardar').value;

   if(isNaN(idEquipo)){
      bootbox.alert("El id del equipo es incorrecto");
      e.preventDefault();
   }else{
      if(numReporte.length == 0 || idEquipo.length == 0 || numSerial.length == 0 || descripcion.length == 0 ){
         bootbox.alert("Datos Incorrectos");
         e.preventDefault();
      }else if(edificio == 0){
         bootbox.alert("Debe elegir un edificio");
         e.preventDefault();
      }else{
         return true;
      }
   }
}//cierra funcion validar vacios
