<?php
    class Fruta{
        private $_conexion;
        private $_idFruta;
        private $_nombre;
        private $_color;
        private $_peso;
        private $_idTipoFruta;
        private $_paginacion = 10;

        function __construct($conexion,$idfruta,$nombre,$color,$peso,$idTipoFruta){
            $this->_conexion =$conexion;
            $this->_idFruta = $idfruta;
            $this->_nombre = $nombre;
            $this->_color = $color;
            $this->_peso = $peso;
            $this->_idTipoFruta = $idTipoFruta;
        }        
        function __get($k){
          return $this->$k;
        }
        function __set($k, $v){
            $this->$k = $v;
        }
        function insertar(){
            $sql = " insert into fruta (idFruta, nombre, colorFruta, peso, idTipoFruta)
            values (null, '$this->_nombre', '$this->_color','$this->_peso','$this->_idTipoFruta')";
            echo "sql". $sql;
            $insersion = mysqli_query($this->_conexion,$sql);
            return $insersion;
        }
        function modificar(){
            $sql = "update fruta set 
            nombre='$this->_nombre', colorFruta='$this->_color', 
            peso='$this->_peso', idTipoFruta='$this->_idTipoFruta'
            where idFruta=$this->_idFruta";
            echo "sql". $sql;
            $modificacion = mysqli_query($this->_conexion,$sql);
            return $modificacion;
        }
        function eliminar(){
            $sql = "delete from fruta where idFruta=$this->_idFruta";
            echo "sql". $sql;
            $eliminacion = mysqli_query($this->_conexion,$sql);
            return $eliminacion;
        }
        
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idFruta)/$this->paginacion) as cantidad from fruta")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from fruta order by idfruta")
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from fruta order by idfruta
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion)); 
                return $listado;
            }
        }
    }
    ?>
