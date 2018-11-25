<?php

/**
 * Lista de paginas a extraer la informacion 
 */
$paginas = array(
    "http://www.factux.be",
    "http://documentacion.lenguaje-latino.org/?c=detalles&f=arco_tangente"
);




for ($i = 0; $i < count($paginas); $i++) {
    $web = $paginas[$i];
    $destino = "pag_$i.html";
    copiar($web, $destino);
}

/**
 * Funcion que extraer la informacion para copiarla en local
 * @param type $web
 * @param type $destino
 */
function copiar($web, $destino) {
    // codigo extraido de https://www.lawebdelprogramador.com/codigo/PHP/2294-descargar-una-pagina-web-mediante-CURL-en-PHP.html
//abrimos un fichero donde guardar la descarga de la web
    $fp = fopen("$destino", "w");
// Se crea un manejador CURL
    $ch = curl_init();
// Se establece la URL y algunas opciones
    curl_setopt($ch, CURLOPT_URL, "$web");
//determina si descargamos las cabeceras del servidor [0-No mostramos|1-mostramos]
    curl_setopt($ch, CURLOPT_HEADER, 0);
//determina si mostramos el resultado en el nevagador [0-mostramos|1-NO mostramos]
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//determina donde guardar el fichero
    curl_setopt($ch, CURLOPT_FILE, $fp);
// Se obtiene la URL indicada
    curl_exec($ch);
// Se cierra el recurso CURL y se liberan los recursos del sistema
    curl_close($ch);
//se cierra el manejador de ficheros
    fclose($fp);
}

?>