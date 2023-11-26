
document.addEventListener("DOMContentLoaded", () => {
    setTimeout(function() {
      let pantallaCarga = document.getElementById("pantalla-carga");
      pantallaCarga.style.display = "none";
    }, 1000);
});

const formEditar = document.getElementById("formEditar");
document.getElementById("btnCancelar2").addEventListener("click", () => {
  formEditar.style.display = "none";
})
document.getElementById("btnEditar").addEventListener("click", () => {
  formEditar.style.display = "block";
})

const formEliminar = document.getElementById("formEliminar");
document.getElementById("btnEliminar").addEventListener("click", () => {
  formEliminar.style.display = "block";
})
document.getElementById("btnNo").addEventListener("click", () => {
  formEliminar.style.display = "none";
})


