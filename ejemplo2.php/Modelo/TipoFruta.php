<?php
    class TipoFruta{
        private $_conexion;
        private $_idTipoFruta;
        private $_descripcion;
        private $_paginacion = 10;

        function __construct($conexion,$idTipoFruta,$descripcion){
            $this->_conexion = $conexion;
            $this->_idTipoFruta = $idTipoFruta;
            $this->_descripcion = $descripcion;

        }
        
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k = $v;
        }
        function insertar(){
            $sql = "insert into tipofruta (idTipoFruta, descripcion)
            values (null, '$this->_descripcion')";
            echo "sql" .$sql;
            $insercion = mysqli_query($this->_conexion,$sql);
            return $insercion;
        }
        function modificar(){
            $sql = "update tipofruta set descripcion='$this->_descripcion'
            where idTipofruta=$this->_idTipoFruta";
            echo "sql". $sql;
            $modificacion = mysqli_query($this->_conexion,$sql);
            return $modificacion;
        }
        function eliminar(){
            $sql = "delete from tipofruta where idTipoFruta=$this->_idTipoFruta";
            echo "sql". $sql;
            $eliminacion = mysqli_query($this->_conexion,$sql);
            return $eliminacion; 
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idTipoFruta)/$this->_paginacion) as cantidad from tipofruta")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from tipofruta order by idTipoFruta")
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from tipofruta order by idTipoFruta
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion));
                return $listado;
            }
        }
    }
?>