
// document.addEventListener("DOMContentLoaded", function () {
//     const btnEditar = document.querySelectorAll('button#btnEditar');
//     const formEditar = document.querySelector(".editar__crud");

//     btnEditar.forEach(function (boton) {
//         boton.addEventListener('click', (event) => {
//             // console.log("Botón de editar clickeado");
//             // event.preventDefault(); // Evitar la recarga del formulario (si es un botón de tipo "submit" dentro de un formulario)
//             formEditar.style.display = 'block';
//         });
//     });

//     const btnCancelar = document.getElementById("btnCancelar");

//     btnCancelar.addEventListener("click", () => {
//         formEditar.style.display = 'none';
//     });
// });

// const guardarNuevo = document.getElementById("guardarNuevo");

// guardarNuevo.addEventListener("submit", function(event) {
//   event.preventDefault();
//   Alect();
// })

// function Alect(){
//     Swal.fire({
//       title: "Good job!",
//       text: "You clicked the button!",
//       icon: "success"
//     });
// }

document.getElementById("coco").addEventListener("submit", function(event) {
  // Puedes realizar acciones adicionales aquí si es necesario

  // Recargar la página
  location.reload();
});

const contenResult = document.getElementById("vacunasMascotas");


document.getElementById("btnVacunas").addEventListener("click", () => {
  if (contenResult.style.display === 'none') {
      // Si el elemento está oculto, mostrarlo
      contenResult.style.display = 'flex';
  } 
  else{
      // Si el elemento está visible, ocultarlo
      contenResult.style.display = 'none';
  }
})

// const editar__crud__nuevo = document.getElementById("editar__crud--nuevo");
// const btnCancelarNuevo = document.getElementById("btnCancelarNuevo");

// btnCancelarNuevo.addEventListener("click", () =>{
//   editar__crud__nuevo.style.display = "block";
// })

