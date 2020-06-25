<?php
    $respuesta = null;
    include "database.php";
    include "insertar.php";

    $inserciones = new inserciones();


    $opcion = $_POST["opcion"];

    switch( $opcion ){
        case "post":
            $img5 = $_POST['img5'];
            $respuesta = "hola mundo {$img5}";
            // $respuesta = $inserciones->post($_POST['name'], $_POST['img1'], $_POST['img2'], $_POST['img3'], $_POST['img4'], $_POST['img5'], $_POST['img6'], $_POST['img7'], $_POST['img8']);

        break;
    }
   


    echo json_encode($respuesta);
?>