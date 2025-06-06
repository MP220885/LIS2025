<?php
require_once 'Model.php';
class AutoresModel extends Model{
    public function get($id=''){

        if($id==''){
            $query= "SELECT * FROM Autores";  
            return $this->get_query($query);
        }
        else{
            $query="SELECT*FROM Autores WHERE codigo_autor=:codigo";
            return $this->get_query($query,[':codigo'=>$id]);
        }
        
    
    }

    public function insert($autores=array()){
        $query="INSERT INTO Autores VALUES (:codigo_autor, :nombre_autor, :nacionalidad)";
        return $this->set_query($query, $autores);
    }

    public function delete($id=''){
        $query="DELETE FROM Autores WHERE codigo_autor=:codigo_autor";
        return $this->set_query($query,['codigo_autor'=>$id]);

    }

    public function update($autores=array()){
        $query="UPDATE Autores SET nombre_autor=:nombre_autor, nacionalidad=:nacionalidad WHERE codigo_autor=:codigo_autor";
        return $this->set_query($query, $autores);
    }

}
