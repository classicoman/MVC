<?php
class usuarios_model {

private $db;

private $username;
private $password;

public function __construct(){
    $this->db=Conectar::conexion();
}

/* GETTERS & SETTERS */
public function getUsername() {
  return $this->username;
}

public function setUsername($username) {
  $this->username = $username;
}

public function getPassword() {
  return $this->password;
}

public function setPassword($password) {
  $this->password = $password;
}


/**
* Comprovar si el usuario ha hecho bien el login
* @return [false]  si no hi ha hagut cap error,
*         [string] amb text d'error si no ha anat bé
*/
public function insertar() {

     $sql = "INSERT INTO personas (nombre, edad) VALUES ('{$this->nombre}','{$this->edad}')";
     $result = $this->db->query($sql);

     if ($this->db->error)
         return "$sql<br>{$this->db->error}";
     else {
         return false;
     }
}
}



/**
* Extreu totes les persones de la taula
* @return array Bidimensional de totes les persones
*/
public function get_personas(){
    $consulta=$this->db->query("select * from personas;");
    while($filas=$consulta->fetch_assoc()){
        $this->personas[]=$filas;
    }
    return $this->personas;
}


/**
* Inserta un registre a la taula
* @return [false]  si no hi ha hagut cap error,
*         [string] amb text d'error si no ha anat bé
*/
public function insertar() {

     $sql = "INSERT INTO personas (nombre, edad) VALUES ('{$this->nombre}','{$this->edad}')";
     $result = $this->db->query($sql);

     if ($this->db->error)
         return "$sql<br>{$this->db->error}";
     else {
         return false;
     }
}


/**
* Esborra un registre de la taula
* @param  int $id Identificador del registre
* @return [false]  si no hi ha hagut cap error,
*         [string] amb text d'error si no ha anat bé
*/
public function delete($id) {
    $sql = "DELETE FROM personas WHERE id='$id'";

    $result = $this->db->query($sql);

    if ($this->db->error)
        return "$sql<br>{$this->db->error}";
    else {
        return false;
    }
}
}
?>
