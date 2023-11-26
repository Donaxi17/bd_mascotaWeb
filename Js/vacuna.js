

const divNuevaVacuna = document.getElementById("form__vacunasNueva")

document.getElementById("btnNuevo").addEventListener("click", () => {
    divNuevaVacuna.style.display = "block";
    divActualizarVacuna.style.display = "none";
    divEliminarVacuna.style.display = "none";
})

document.getElementById("btnCancelarActualizar").addEventListener("click", () => {
    divNuevaVacuna.style.display = "none";
})

// -----------------------------------
// -----------------------------------

const divActualizarVacuna = document.getElementById("form__vacunasActualizar")

document.getElementById("btnEditar").addEventListener("click", () => {
    divActualizarVacuna.style.display = "block";
    divNuevaVacuna.style.display = "none";
    divEliminarVacuna.style.display = "none";
})

document.getElementById("btnCancelarActualizar").addEventListener("click", () => {
    divActualizarVacuna.style.display = "none";
})

// -----------------------------------
// -----------------------------------

const divEliminarVacuna = document.getElementById("form__vacunasEliminar")

document.getElementById("btnEliminar").addEventListener("click", () => {
    divEliminarVacuna.style.display = "block";
    divNuevaVacuna.style.display = "none";
    divActualizarVacuna.style.display = "none";
})

document.getElementById("btnCancelarEliminar").addEventListener("click", () => {
    divActualizarVacuna.style.display = "none";
})


