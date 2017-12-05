<?php
//Llamada al modelo
require_once("models/personas_model.php");


class personas_controller {

      /* Muestra pantalla de altas */
      function add() {

        require_once("views/personas_add.phtml");
      }

      /* Muestra listado de personas */
      function view() {
        $per=new personas_model();

        //Uso metodo del modelo de personas
        $datos=$per->get_personas();

        //Llamado a la vista: mostrar la pantalla
        require_once("views/personas_view.phtml");
      }


      function insert() {
          $per=new personas_model();

          if (isset($_POST['insert'])) {
              $nombre = $_POST['nombre'];
              $edad   = $_POST['edad'];

              $error = $per->insertar($nombre, $edad);

              if (!$error) {
                  header( "Location: index.php");
              }
              else {
                  echo $error;
              }
          }

      }
}
?>
