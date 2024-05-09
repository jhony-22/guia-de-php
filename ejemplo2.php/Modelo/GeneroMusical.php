<?php
    class GeneroMusical{
        private $_conexion;
        private $_idgenero;
        private $_descripcion;
        private $_paginacion = 10;
        
        function __construct($conexion,$idgenero,$descripcion){
            $this->_conexion = $conexion;
            $this->_idgenero = $idgenero;
            $this->_descripcion = $descripcion;
        }
        function __get($k){
            return $this->$k;
        }
        function __set($k,$v){
            $this-> $k = $v;
        }
        function insertar(){
            $sql = "insert into generomusical (idGenero, descripcion) values (null, '$this->_descripcion')";
            echo "sql". $sql;
            $insertar = mysqli_query($this->_conexion,$sql);
            return $insertar;
        }
        function modificar(){
            $sql = "update generomusical set 
            descripcion='$this->_descripcion' where idGenero=$this->_idgenero";
            echo "sql". $sql;
            $modificar = mysqli_query($this->_conexion,$sql);
            return $modificar;
        }
        function eliminar (){
            $sql = "delete from generomusical where idGenero=$this->_idgenero";
            echo "sql". $sql;
            $eliminar = mysqli_query($this->_conexion, $sql);
            return $eliminar;
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idGenero)/$this->_paginacion) as cantidad from generomusical")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){   
                $listado = mysqli_query($this->_conexion, "select * from generomusical order by idGenero") 
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax =$pagina *$this->_paginacion;
                $paginacionMin = $paginacionMax -$this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from generomusical order by idGenero
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion));
                return $listado;
            }
        }
    }
