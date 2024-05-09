<?php
    class Artista{
        private $_conexion;
        private $_idartista;
        private $_nombre;
        private $_nacionalidad;
        private $_paginacion = 10;

        function __construct($conexion,$idartista,$nombre,$nacionalidad){
            $this->_conexion = $conexion;
            $this->_idartista = $idartista;
            $this->_nombre = $nombre;
            $this->_nacionalidad = $nacionalidad;

        }
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k = $v;
        }
        function insertar(){
            $sql = "insert into artista (idArtista,nombre,nacionalidad) values(null,'$this->_nombre','$this->_nacionalidad')";
            echo "sql". $sql;
            $insertar = mysqli_query($this->_conexion,$sql);
            return $insertar;
        }
        function modificar(){
            $sql = "update artista set
            nombre='$this->_nombre', nacionalidad='$this->_nacionalidad' 
            where idArtista=$this->_idartista";
            $modificar = mysqli_query($this->_conexion,$sql);
            return  $modificar;
        }
        function eliminar(){
            $sql= "delete from artista where idArtista=$this->_idartista ";
            $eliminar = mysqli_query($this->_conexion, $sql);
            return $eliminar;

        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idArtista)/$this->_paginacion) as cantidad from artista")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar ($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from artista order by idArtista") or
                die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionmax = $pagina * $this->_paginacion;
                $paginacionmin = $paginacionmax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from artista order by idArtista
                limit $paginacionmax, $paginacionmin") or die (mysqli_error($this->_conexion));
                return $listado;
            }
        }
    }
    ?>
