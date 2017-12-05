<?php
class coches_model {
    private $db;
    private $coches;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->coches=array();
    }

    public function get_coches(){
        $consulta=$this->db->query("select * from coches;");
        while($filas=$consulta->fetch_assoc()){
            $this->coches[]=$filas;
        }
        return $this->coches;
    }

    public function insertar($marca, $modelo, $fabricado) {
         $sql = "INSERT INTO coches (marca, modelo, fabricado) VALUES ('$marca','$modelo','$fabricado')";
         $result = $this->db->query($sql);

         if ($this->db->error)
             return "$sql<br>{$this->db->error}";
         else {
             return false;
         }
    }

    public function delete($id) {
        $sql = "DELETE FROM coches WHERE id='$id'";

        $result = $this->db->query($sql);

        if ($this->db->error)
            return "$sql<br>{$this->db->error}";
        else {
            return false;
        }
    }

    public function ordmarca(){
        $consulta=$this->db->query("select * from coches ORDER BY marca");
        while($filas=$consulta->fetch_assoc()){
            $this->coches[]=$filas;
        }
        return $this->coches;
    }

}
?>
