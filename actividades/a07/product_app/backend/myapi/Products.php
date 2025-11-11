<?php
namespace tecweb\myapi;

use tecweb\myapi\DataBase as DataBase;
require_once __DIR__.'/DataBase.php';

class Product extends DataBase{
    private $data = NULL;
    public function __construct($db, $user='root', $pass='Youtube1'){
            $this->data = array();
            parent::__construct($user,$pass,$db);
    }

    public function add($obj){
        $this->data = array('status' => 'error', 'message' => 'Producto no agregado');
        if(isset($obj['nombre'])){
            $jsonObj=json_decode(json_encode($obj));
            $this->conexion->set_charset("utf8");
            $sql = "INSERT INTO productos VALUES (null, '{$jsonObj->nombre}', '{$jsonObj->marca}', '{$jsonObj->modelo}', {$jsonObj->precio}, '{$jsonObj->detalles}', {$jsonObj->unidades}, '{$jsonObj->imagen}', 0)";
            if($this->conexion->query($sql)){
                $this->data['status'] ="success";
                $this->data['message'] = "Producto agregado";
            } else {
                $this->data['message'] = "ERROR: No se ejecutó $sql. ".mysqli_error($this->conexion);
            }
        }
        $this->conexion->close();
    }

    public function delete($id){
        $this->data = array('status'  => 'error', 'message' => 'La consulta falló');
        if(isset($id)){
            $sql = "UPDATE productos SET eliminado=1 WHERE id = {$id}";
            if($this->conexion->query($sql)){
                $this->data['status'] =  "success";
                $this->data['message'] =  "Producto eliminado";
            } else {
            $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
            }
            $this->conexion->close();
        }
    }

    public function edit($obj){
        $this->data = array('status'  => 'error', 'message' => 'Ya existe un producto con ese nombre');
        if(isset($obj['id'])){
            $jsonOBJ=json_decode(json_encode($obj));
            $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND id != '{$jsonOBJ->id}' AND eliminado = 0";
            if($result = $this->conexion->query($sql)){
                $this->conexion->set_charset("utf8");
                $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', 
                unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = '{$jsonOBJ->id}'";
                if($this->conexion->query($sql)){
                    $this->data['status'] =  "success";
                    $this->data['message'] =  "Producto editado";
                } else {
                    $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
            }
            $this->conexion->close();
        }

    }

    public function list(){
        $this->data = array();
        if($result = $this->conexion->query("SELECT * FROM productos WHERE eliminado=0")){
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if(!is_null($rows)){
                foreach($rows as $num => $row){
                    foreach($row as $key => $value){
                        $this->data[$num][$key] = $value;
                    }
                }
            }
            $result->free();
        } else{
            die('Query Error: '.mysqli_error($this->conexion));
        }
        $this->conexion->close();
    }

    public function search($search){
        if(isset($search)){
            $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
            if ($result = $this->conexion->query($sql) ) {
			$rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $this->data[$num][$key] = utf8_encode($value);
                    }
                }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($this->conexion));
        }
		$this->conexion->close();
        }
        
    }

    public function single($id){
        $this->data = array();
        if(isset($id)){
            $sql = "SELECT * FROM productos WHERE id = $id AND eliminado = 0";
            if($result = $this->conexion->query($sql)){
                $row = $result->fetch_assoc();
                if(!is_null($row)){
                    foreach($row as $key => $value){
                        $this->data[$key] = utf8_encode($value);
                    }
                }
                $result->free();
            } else{
                die('Query Error: '.mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }

    public function singleByName($nombre){
        $this->data = array();
        if(isset($nombre)){
            $sql = "SELECT * FROM productos WHERE (nombre LIKE '%{$nombre}%' AND eliminado = 0)";
            if($result = $this->conexion->query($sql)){
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if(!is_null($rows)){
                foreach($rows as $num => $row){
                    foreach($row as $key => $value){
                        $this->data[$num][$key] = utf8_encode($value);
                    }
                }
            }
            $result->free();
            } else {
                die('Query Error: '.mysqli_error($this->conexion));
            }
            $this->conexion->close();
        }
    }

    public function getData(){
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}

?>