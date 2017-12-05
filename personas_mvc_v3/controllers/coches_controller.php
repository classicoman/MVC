<?php
//Llamada al modelo
require_once("models/coches_model.php");


class coches_controller {

      /* Muestra pantalla de altas */
      function add() {

        require_once("views/coches_add.phtml");
      }

      /* Muestra listado de coches */
      function view() {
        $coche=new coches_model();

        //Uso metodo del modelo de coches
        $datos=$coche->get_coches();

        //Llamado a la vista: mostrar la pantalla
        require_once("views/coches_view.phtml");
      }


      function insert() {
          $coche=new coches_model();

          if (isset($_POST['insert'])) {
              $nombre = $_POST['nombre'];
              $edad   = $_POST['edad'];

              $error = $coche->insertar($nombre, $edad);

              if (!$error) {
                  header( "Location: index.php");
              }
              else {
                  echo $error;
              }
          }

      }

      function delete() {
        if (isset($_GET['id'])) {
          $coche=new coches_model();

          $id = $_GET['id'];

          $error = $coche->delete($id);

          if (!$error) {
              header( "Location: index.php");
          }
          else {
              echo $error;
          }
        }
      }


      function ordmarca() {
        $coche=new coches_model();

        //Uso metodo del modelo de coches
        $datos=$coche->ordmarca();

        //Llamado a la vista: mostrar la pantalla
        require_once("views/coches_view.phtml");
      }

}
?>
