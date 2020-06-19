<?php 
    $ruta = "img/";
    $nombre= $_FILES['file']['name'];//nombre del archivo
    move_uploaded_file($_FILES['file']['tmp_name'], $ruta.$nombre);


?>