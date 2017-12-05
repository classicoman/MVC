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
        $persona=new personas_model();

        //Uso metodo del modelo de personas
        $datos=$persona->get_personas();

        //Llamado a la vista: mostrar la pantalla
        require_once("views/personas_view.phtml");
      }


      function insert() {
          $persona=new personas_model();

          if (isset($_POST['insert'])) {
              $persona->setNombre( $_POST['nombre'] );
              $persona->setEdad( $_POST['edad'] );

              $error = $persona->insertar();

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
          $persona=new personas_model();

          $id = $_GET['id'];

          $error = $persona->delete($id);

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
