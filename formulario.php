<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Proyecto</title>
    <link rel="stylesheet" href="estilos/formulario.css">
    <link rel="icon" href="./imagenes/SVG/tecla_x.svg" type="image/vnd.microsoft.icon">

</head>
<body>
    
<div class="contenedor-pagina3 fondo" id="titulo">
    <div class="titulo">
     <iframe class="fondo" src="./assets/logo.html" frameborder="0" ></iframe>
    </div>
    <form class="contenido " action="./codigophp/procesar_proyecto.php" method="POST" enctype="multipart/form-data">
    
        <label for="nombre">Nombre del Proyecto:</label>
        <input type="text" id="nombre" name="nombre" required><br>
		
        <label for="mostrarcreadores" >¿Quiere mostrar los integrantes?</label>
        <input type="checkbox" checked onchange="mostrarInputCheckbox(this)" id="mostrarcreadores" name="mostrarcreadores" value="1"><br>
		<label for="creadores" id="campoTexto">Nombres de cada integrante:</label>
        <input type="text" id="creadores" name="creadores">
        <br>
        <label for="mostrardesc" >¿Quiere ingresar la descripción?</label>
        <input type="checkbox" checked onchange="mostrarInputCheckbox2(this)" id="mostrardesc" name="mostrardesc" value="1"><br>
        <div style="width: 100%;"></div>
		<label for="creadores2" id="campoTexto2">Descripción:</label>
        <textarea type="text" id="creadores2" name="descripcion" maxlength="200"></textarea>
        <br>
        <label for="curso">Curso:</label>
        
        <?php //include "./codigophp/obtenercursos.php";?>

        <select id="curso" name="curso" required>
            <option value="18">4° 4°</option>
            <option value="21">5° 3°</option>
            <option value="24">6° 3°</option>
            <option value="28">7° 2°</option>
        </select><br>

        <label for="archivos">Suba hasta 5 imágenes o videos:</label>
        <input type="file" id="archivos" name="archivos[]" accept="image/*,video/mp4" multiple required onchange="validarCantidadArchivos(this)"><br>

        <button type="submit">Cargar Proyecto</button>
    </form>
</div>
<div class="fondo cuadriculado"></div>
<div class="fondo cuadriculado">
        <div class="decoracion fondo">
            <div class="figura circulo1"></div>
            <div class="figura circulo2"></div>
            <div class="figura circulo3"></div>
            
            <div class="figura mancha">
            </div>
            <div class="figura luz1"></div>
            <div class="figura luz2"></div>
            <div class="figura estrella1"></div>
            <div class="figura mas1"></div>
            <div class="figura mas2"></div>
            <div class="figura zig2"></div>
        </div>
    </div>
    <button onclick="window.location.href='index.php'" id="inicio">Inicio</button>

</body>
</html>
<script src="./codigojs/confetti.js"> </script>

<script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset( $_GET['exito'])){
        $exito = $_GET['exito'];
        if($exito == "true"){
            echo "createConfetti()";
        }
    }
}

?>
const message = document.getElementById('message');
const maxSize =1000 * 1024 * 1024; 
const maxFiles = 5; 

function validarCantidadArchivos(input) {
    if (input.files.length > maxFiles) {
        alert(`Solo puedes subir hasta ${maxFiles} archivos.`);
        input.value = ""; 
        message.textContent = "";
        return false;
    }
    
    for (const file of input.files) {
        if (file.size > maxSize) {
            alert(`El archivo ${file.name} es demasiado grande. El tamaño máximo permitido es de 2 MB.`);
            input.value = ""; 
            message.textContent = "";
            return false;
        }
    }

    message.textContent = "Archivos aceptados: " + Array.from(input.files).map(file => file.name).join(", ");
    return true;
}


function mostrarInputCheckbox(input) {
    const campoTexto = document.getElementById('campoTexto');
    const creadores = document.getElementById('creadores');
    if (input.checked) {
        campoTexto.style.display="block";
        creadores.style.display="block";
        creadores.setAttribute('required', 'required');
    } else {
        campoTexto.style.display="none";
        creadores.style.display="none";
        creadores.removeAttribute('required');
    }
}
function mostrarInputCheckbox2(input) {
    const campoTexto2 = document.getElementById('campoTexto2');
    const creadores2 = document.getElementById('creadores2');
    if (input.checked) {
        campoTexto2.style.display="block";
        creadores2.style.display="block";
        creadores2.setAttribute('required', 'required');
    } else {
        campoTexto2.style.display="none";
        creadores2.style.display="none";
        creadores2.removeAttribute('required');
    }
}


</script>
<style>


.contenido{
    grid-area: FORM;
    z-index: 200;
    
}
    /* Estilos generales */

h2 {
    
    font-size: 2em;
    color: #ff5dc8;
    text-align: center;
    font-weight: bold;
}

form {
    display: flex;
    flex-wrap: wrap;
    
    background-color: #ffffff;
    border-radius: 0px 0px 10px 10px ;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
}

/* Estilos de etiquetas y entradas */
label {
    display: block;
    font-size: 1.1em;
    color: black;
    margin-top: 10px;
    font-weight: bold;
}

input[type="text"],
select,
input[type="file"] {
    width: 100%;
   
    margin-top: 5px;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
    transition: all 0.3s ease;
}

input[type="text"]:focus,
select:focus,
input[type="file"]:focus {
    border-color: #ff5dc8;
    outline: none;
    box-shadow: 0px 0px 8px rgba(255, 93, 200, 0.3);
}

/* Estilo para el checkbox */
input[type="checkbox"] {
    transform: scale(1.2);
    margin-right: 5px;
}

/* Estilo del botón */
button[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #6a9af5;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1.1em;
    font-weight: bold;
    margin-top: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #547bda;
}

/* Fondo y decoración adicional */


</style>

