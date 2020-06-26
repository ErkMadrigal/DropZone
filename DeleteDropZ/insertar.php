<?php
    class inserciones{

        public function post($text, $img1, $img2, $img3, $img4, $img5, $img6, $img7, $img8){

            $respuesta = null;

            try{
                $sql = "INSERT INTO post(text, img1, img2, img3, img4, img5, img6, img7, img8) VALUES (:text, :img1, :img2, :img3, :img4, :img5, :img6, :img7, :img8)";
                $database = new database();
                $db = $database->getConnection();
                $stmt = $db->prepare($sql);
                $stmt->bindParam(":text", $text);
                $stmt->bindParam(":img1", $img1);
                $stmt->bindParam(":img2", $img2);
                $stmt->bindParam(":img3", $img3);
                $stmt->bindParam(":img4", $img4);
                $stmt->bindParam(":img5", $img5);
                $stmt->bindParam(":img6", $img6);
                $stmt->bindParam(":img7", $img7);
                $stmt->bindParam(":img8", $img8);
                $stmt->execute();
                $respuesta["estatus"] = "ok";
                $respuesta["mensaje"] = "Tu post ha sido publicado con exito";
            }catch(PDOException $e){
                $respuesta["estatus"] = "error";
                $respuesta["mensaje"] = $e->getMessage();
            }

            return $respuesta;
        }
    }
?>