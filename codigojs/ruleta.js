const iframe = document.getElementById("ruletaIframe").contentWindow;

function addOption(option) {
    iframe.postMessage({ action: "addOption", option }, "*");
}

function spin() {
    if(numproyect > 0){
    document.getElementById("suerte").volume = 0.2
    document.getElementById("suerte").currentTime = 0
    setTimeout(function cargandof(){

    document.getElementById("suerte").volume = 0
},5000);

    iframe.postMessage({ action: "spinWheel" }, "*");
    numproyect--
    }else{
        titulo2 = document.getElementById("titulo2");
        canva = document.getElementById("canva");
        ruletaa= document.getElementById("ruleta");
        puntosborrar = document.getElementById("puntosborrar")
        animacion(ruletaa,"salida","0.5","grid");
        animacion(canva,"salida","0.5","grid");
        setTimeout(function cargandof(){
            ruletaa.style.display= "none"
            ruletaa.style.animation= ""
            esconderqr()
            titulo2.style.animation= ""
            animacion(puntosborrar,"opacidad","0.5","grid");

            iniciar() 
           
        },600);
    }
}

window.addEventListener("message", (event) => {
    if (event.data.action === "winner" ) {
        createConfetti()
        setTimeout(function cargandof(){
            cleanUpConfetti()
            mostrarproyecto(event.data.winner)
            
        },2000);
    }
});

numproyect = 0
function createOptions(){
    fetch(api) 
    .then(response => response.json())  
    .then(data => {
        const proyectos = data; 
        proyectos.forEach(proyecto => {
            addOption(proyecto.nombre)
                numproyect++
             

        
        });
    })
    .catch(error => console.error('Error al cargar el JSON:', error));
}

