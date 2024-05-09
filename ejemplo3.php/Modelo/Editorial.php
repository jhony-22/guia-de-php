<?php
    class Editorial{
        private $_conexion;
        private $_ideditorial;
        private $_nombre;
        private $_ciudad;
        private $_paginacion;

        function __construct($conexion,$ideditorial,$nombre,$ciudad){
            $this->_conexion = $conexion;
            $this->_ideditorial = $ideditorial;
            $this->_nombre = $nombre;
            $this->_ciudad = $ciudad;
        }
    
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k =$v;
        }
        function insertar(){
            $sql = "insert into editorial (ideditorial,nombre, ciudad)
            values (null, '$this->_nombre','$this->_ciudad')";
            echo "sql". $sql;
            $insertar = mysqli_query($this->_conexion, $sql);
            return $insertar;
        }
        function modificar(){
            $sql = "update editorial set
            nombre='$this->_nombre', ciudad='$this->_ciudad'
            where ideditorial='$this->_ideditorial'";
            echo "sql". $sql;
            $modificar = mysqli_query($this->_conexion,$sql);
            return $modificar;
        }
        function eliminar(){
            $sql = "delete from editorial where ideditorial=$this->_ideditorial";
            echo  "sql". $sql;
            $eliminar = mysqli_query($this->_conexion, $sql);
            return $eliminar;
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (ideditorial)/$this->paginacion) as cantidad from editorial")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from editorial order by ideditorial")
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from editorial order by ideditorial
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion)); 
                return $listado;
            }            
        
        }
    }