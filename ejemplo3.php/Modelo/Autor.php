<?php
    class Autor{
        private $_conexion;
        private $_idautor;
        private $_nombre;
        private $_nacionalidad;

        function __construct($conexion,$idautor,$nombre,$nacionalidad){
            $this->_conexion = $conexion;
            $this->_idautor = $idautor;
            $this->_nombre = $nombre;
            $this->_nacionalidad = $nacionalidad;
        }
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k =$v;
        }
        function insertar(){
            $sql = "insert into autor (idautor,nombre, nacionalidad)
            values (null, '$this->_nombre','$this->_nacionalidad')";
            echo "sql". $sql;
            $insertar = mysqli_query($this->_conexion, $sql);
            return $insertar;
        }
        function modificar(){
            $sql = "update autor set
            nombre='$this->_nombre', nacionalidad='$this->_nacionalidad'
            where idautor='$this->_idautor'";
            echo "sql". $sql;
            $modificar = mysqli_query($this->_conexion,$sql);
            return $modificar;
        }
        function eliminar(){
            $sql = "delete from autor where idautor=$this->_idautor";
            echo  "sql". $sql;
            $eliminar = mysqli_query($this->_conexion, $sql);
            return $eliminar;
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idautor)/$this->paginacion) as cantidad from autor")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from autor order by idautor")
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from autor order by idautor
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion)); 
                return $listado;
            }            
        }
    }