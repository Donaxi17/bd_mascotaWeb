let headerConfig = document.getElementById("header__config");
let configPerfil = document.getElementById("config__perfil");

headerConfig.addEventListener("click", () => {
    if (configPerfil.style.display === 'none') {
        // Si el elemento está oculto, mostrarlo
        configPerfil.style.display = 'flex';
    } 
    else{
        // Si el elemento está visible, ocultarlo
        configPerfil.style.display = 'none';
    }
})