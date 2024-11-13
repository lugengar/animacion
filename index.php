<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/styles.css">
 <link rel="icon" href="./imagenes/SVG/cono.svg" type="image/vnd.microsoft.icon">
</head>
<body>

<div class="fondo" style="overflow: hidden;" id="todo">
    <div class="contenedor-pagina fondo" id="titulo">
        <div class="titulo">
            <iframe src="./assets/logo.html" frameborder="0"></iframe>
        </div>
    </div>
    <div class="contenedor-pagina fondo" id="ruleta" style="display:none;">
        <div class="titulo" id="titulo2">
            <iframe src="./assets/logo2.html" frameborder="0"></iframe>
        </div>
    </div>
    <div class="contenedor-pagina2 fondo" id="canva" style="display:none;">
            <!--<canvas id="rouletteCanvas" width="600" height="600">
            </canvas>-->
            <div class="titulo3" id="titulo2" > 
            <iframe id="ruletaIframe" src="assets/ruleta.html" frameborder="0" ></iframe>
            </div>
    </div>
    <div class="fondo cuadriculado">
        <div class="decoracion fondo">
            <div class="figura circulo1"></div>
            <div class="figura circulo2"></div>
            <div class="figura circulo3"></div>
            
            <div class="figura mancha">
            </div>
            <div class="texto_misterioso">01001100
                01000010
                2024</div>
            <div class="figura luz1"></div>
            <div class="figura luz2"></div>
            <div class="figura estrella1"></div>
            <div class="figura estrella2"></div>
            <div class="figura puntos1" id="puntosborrar"></div>
            <div class="figura puntos2"></div>
            <div class="figura mas1"></div>
            <div class="figura mas2"></div>
            <div class="figura zig1"></div>
            <div class="figura zig2"></div>
        </div>
    </div>
    <div class="fondo filtro" id="filtro"></div>
    <div class="proyecto fondo" id="proyectos"></div>
    <div class="transicion fondo" id="transicion">
        <div class="curso" id="curso"></div>
        <div class="integrantes" id="integrantes"></div>
        <div class="nombre" id="nombre"></div>
    </div>
   

</div>

<button id="muteButton"></button>
<textarea id="descripcion"></textarea>
<div id="qr">Escanéame para calificar proyectos</div>
<audio id="fondo" loop >
    <source src="./assets/fondo.mp3" type="audio/mp3">

</audio>
<audio id="teclado" loop >
    <source src="./assets/teclado.mp3" type="audio/mp3">

</audio>
<audio id="suerte" loop >
    <source src="./assets/ruleta2.mp3" type="audio/mp3">

</audio>
<script>
const muteButton = document.getElementById('muteButton');
const audios = document.querySelectorAll('audio'); 


let isMuted = true;

audios.forEach(audio => {
    audio.volume = 0.2;
});
document.getElementById("teclado").volume = 0
document.getElementById("suerte").volume = 0
muteButton.addEventListener('click', () => {
    const videos = document.querySelectorAll('video'); 


    videos.forEach(video => {
        if (isMuted) {
            video.muted = false;

        } else {
            video.muted = true;

        }
    });
 
    audios.forEach(audio => {
        if (isMuted) {
            audio.play();
        } else {
            audio.pause();
        }
    });

    isMuted = !isMuted;
});

    api = '<?php include "./configurar.php"; echo $API; ?>'
</script>

<script src="./codigojs/escribir.js"></script>
<script src="./codigojs/ruleta.js"></script>
<script src="./codigojs/logica.js"> </script>
<script src="./codigojs/confetti.js"> </script>

</body>
</html>
