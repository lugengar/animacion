function mostrarproyecto(nombre) {
    transicion = document.getElementById("transicion");
    curso = document.getElementById("curso");
    integrantes = document.getElementById("integrantes");
    nombre2 = document.getElementById("nombre");
    descripcion = document.getElementById("descripcion")
    animacion(transicion,"transicion","0.5","grid");
    
    fetch(api)
        .then(response => response.json())
        .then(data => {
            const proyecto = data.find(proyecto => proyecto.nombre === nombre);

            if (proyecto) {
                curso.innerHTML = ""
                nombre2.innerHTML = ""
                integrantes.innerHTML = ""
                setTimeout(() => {  
                    lluvia(transicion)
                    document.getElementById("teclado").volume = 0.2
                    mostrarqr(proyecto.codigoqr)
                    
                    const promesas = [
                        crearCarrusel(proyecto.contenido, proyecto.nombre),
                        startTypingEffect(curso, 'curso=' + '"' + proyecto.curso + '"'),
                        startTypingEffect(nombre2, 'proyecto=' + '"' + proyecto.nombre + '"')
                    ];
                    
                    if (proyecto.mostrarcreadores) {
                        promesas.push(
                            startTypingEffect(integrantes, 'integrantes=' + '[' + proyecto.creadores + ']')
                        );
                    }
                    
                    Promise.all(promesas).then(() => {
                        setTimeout(() => {
                            descripcion.value=proyecto.descripcion
                            setTimeout(() => {
                                animacion(descripcion, "mostrardesc", "1", "flex")
                            }, 2500);
                            comenzarcarrusel(proyecto.contenido.length);
                            document.getElementById("teclado").volume = 0

                        }, 2000);
                    });
                    
                }, 500);
            } else {
                console.log(`No se encontró un proyecto con el nombre "${nombre}"`);
            }
        })
        .catch(error => console.error('Error al cargar el JSON:', error));
}

function crearCarrusel(contenido, nombre) {
    const carrusel = document.getElementById('proyectos');
    carrusel.innerHTML = '';  
    carrusel.style.animation = "";
    document.getElementById('filtro').style.opacity = "100%"
    ruletaa = document.getElementById("ruleta");
    canva = document.getElementById("canva");
    capa = 80
    setTimeout(() => {
        animacion(transicion,"opacidadsalida","0.5","grid");

        animacion(ruletaa,"opacidadsalida","0.5","grid");
        animacion(canva,"opacidadsalida","0.5","grid");

    }, 5000);

    
        //carrusel.style.backgroundColor = "black"

  sino = false
    contenido.forEach(item => {
        url = item.url
        tipo = item.tipo

      
       /* const div = document.createElement('div');
        div.classList.add('item');*/

        const div = document.createElement('div');
        div.classList.add('prueba');
      if(sino == false){
        sino = true
        div.style.opacity="100%"
      }
        if (tipo == "Imagen") {
            const img = document.createElement('div');
            img.style.backgroundImage = "url("+url+")";
            img.style.zIndex = capa
            
            capa--
            img.classList.add('imagen');
            

            div.appendChild(img);
        } else if (tipo == "Video") {
            const video = document.createElement('video');
            video.src = url;
            video.controls = false;
            video.muted = true;
            video.autoplay = false; 
            video.setAttribute('preload', 'auto');
            div.appendChild(video);
        }
        console.log(div)
        carrusel.appendChild(div);
    });
            
    
}
let index = 0;
let totalItems = 0; 
function comenzarcarrusel(totalItemss){
    index = 0;
    totalItems = totalItemss; 

    moverCarrusel();

}
function eliminarcarrusel(){
    descripcion = document.getElementById("descripcion")

    ruletaa = document.getElementById("ruleta");
    canva = document.getElementById("canva");
    const carrusel = document.getElementById('proyectos');
    document.getElementById('filtro').style.opacity = "0%"
    animacion(descripcion, "esconderdesc", "1", "flex")

    animacion(ruletaa,"opacidad","0.1","grid");
    animacion(canva,"opacidad","0.1","grid");
    animacion(carrusel,"opacidadsalida","0.5","grid");
    setTimeout(() => {
        carrusel.innerHTML = '';  
        carrusel.style.animation = "";

       spin()
    }, 1000);
    
} 
function cambiar(currentItem){
    const carrusel = document.getElementById('proyectos');

    if(index+1 == totalItems){
        eliminarcarrusel()
    }else{
        index++
        currentItem.style.opacity = "0%"
        carrusel.children[index].style.opacity = "100%"
        setTimeout(() => {
            moverCarrusel()
        },100)
    }
}
function moverCarrusel() {
    const carrusel = document.getElementById('proyectos');
    const currentItem = carrusel.children[index];
    if(currentItem){
        const video = currentItem.querySelector('video');
        if (video) {
            video.play();
            video.addEventListener('ended', () => {
                setTimeout(() => {
                    cambiar(currentItem)
                }, 500);
                
            })
        }else{
            setTimeout(() => {
                cambiar(currentItem)
            }, 8000); 
        
        }
    }else{
        setTimeout(() => {
            eliminarcarrusel()

        }, 4000);
    }
   
}
function animacion(objeto, animacion, tiempo,display){
    const pantalla = objeto;
    pantalla.style.animation = "";

    setTimeout(() => {
        pantalla.style.animation = animacion+" "+tiempo+"s both";
        pantalla.style.display = display;

    }, 10);
}

function iniciar(){
    createOptions()
    titulo1 = document.getElementById("titulo");
    titulo2 = document.getElementById("titulo2");
    ruletaa = document.getElementById("ruleta");
    canva = document.getElementById("canva");
    puntosborrar = document.getElementById("puntosborrar")
    tiempo = 2
    tiempoespera = tiempo + 2
    animacion(titulo1,"entrada",tiempo,"grid")
    setTimeout(() => {
        animacion(titulo1,"salida",tiempo,"grid")
        setTimeout(() => {
            animacion(ruletaa,"entrada",tiempo,"grid")
            setTimeout(() => {
                animacion(titulo2,"arriba",tiempo,"grid")
                animacion(puntosborrar,"opacidadsalida",tiempo,"grid")
                
                setTimeout(() => {
                    animacion(canva,"entrada",tiempo,"grid")
                    setTimeout(() => {
                        spin() 
                        
                     }, tiempo*1000);
                }, 1000);
            }, tiempoespera*1000);
        }, tiempo*1000);
    }, tiempoespera*1000);
}
iniciar()
qrcode = document.getElementById("qr")

function mostrarqr(url){
if(url != null && url !=""){
    qrcode.style.backgroundImage = "url("+url+")"
    animacion(qrcode,"opacidad","0.5","flex")
    setTimeout(() => {
        animacion(qrcode,"agrandar infinite ","5","flex")
    }, 500);
}
}
function esconderqr(){
    animacion(qrcode,"opacidadsalida","0.5","flex")


}