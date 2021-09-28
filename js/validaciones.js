window.onload = main;


function main(){
   guardar.addEventListener('click',validarVacios);
}


//Con este metodo voy a validar que los datos del formulario no esten vacios
function validarVacios(e){
   e.preventDefault();

   let numReporte = document.getElementById('numReporte').value;
   let idEquipo = document.getElementById('idEquipo').value;
   let numSerial = document.getElementById('numSerial').value;
   let edificio = document.getElementById('edificio').value;
   let descripcion = document.getElementById('descripcion').value;
   let guardar = document.getElementById('guardar').value;

   if(numReporte.length == 0 || idEquipo.length == 0 || numSerial.length == 0 || descripcion.length == 0){
      bootbox.alert("Datos Incorrectos");
   }

}
