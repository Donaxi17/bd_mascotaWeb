

let p_Nombre = document.getElementById("p_nombre");
let p_nombreUsuario = document.getElementById("p_nombreUsuario");
let p_correo = document.getElementById("p_correo");
let p_contraseña = document.getElementById("p_contraseña");

let inputName = document.getElementById("name");
let inputNameUser = document.getElementById("nameuser");
let inputEmail = document.getElementById("email");
let inputPassword = document.getElementById("password");

let form = document.getElementById("form");
form.addEventListener("submit", e=> {
    e.preventDefault();
    coc();
    form.addEventListener("input", () => {
        coc();
    })
})

function coc(){
    let regulareEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputName.value.length <= 8) {
        p_Nombre.textContent = "Minimo 8 Caracteres";
    }
    if (inputName.value.length >= 8 && inputName.value.length <= 16) {
        p_Nombre.textContent = "";
    }
    if (inputName.value.length > 16) {
        p_Nombre.textContent = "Maximo 16 Caracteres";
    }

    if (!regulareEmail.test(inputEmail.value)) {
        p_correo.textContent = "Correo no valido.";
    }

    const tieneCaracterEspecial = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/\-]/.test(inputPassword.value);
    const tieneCaracterNumerico = /\d/.test(inputPassword.value);
    const tieneMayuscula = /[A-Z]/.test(inputPassword.value);
    const tieneMinuscula = /[a-z]/.test(inputPassword.value);

    if (tieneCaracterEspecial && tieneCaracterNumerico && tieneMayuscula && tieneMinuscula) {
        p_contraseña.textContent = "";
    } else {
        p_contraseña.textContent = "ññññññññññññññ";
    }
}