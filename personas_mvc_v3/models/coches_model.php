<?php
class coches_model {
    private $db;
    private $coches;

    private $id;
    private $marca;
    private $modelo;
    private $fabricado;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->coches=array();
    }

    /* GETTERS & SETTERS */

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getFabricado() {
        return $this->fabricado;
    }

    public function setFabricado($fabricado) {
        $this->fabricado = $fabricado;
    }

    public function get_coches(){
        $consulta=$this->db->query("select * from coches;");
        while($filas=$consulta->fetch_assoc()){
            $this->coches[]=$filas;
        }
        return $this->coches;
    }

    public function insertar() {
         $sql = "INSERT INTO coches (marca, modelo, fabricado)
                 VALUES ('{$this->marca}','{$this->modelo}','{$this->fabricado}')";
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
