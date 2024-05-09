<?php
    class Cancion{
        private $_conexion;
        private $_idcancion;
        private $_nombre;
        private $_duracion;
        private $_artista;
        private $_genero;
        private $_paginacion;

        function __construct($conexion,$idcancion,$nombre,$duracion,$artista,$genero){
            $this->_conexion = $conexion;
            $this->_idcancion = $idcancion;
            $this->_nombre = $nombre;
            $this->_duracion = $duracion;
            $this->_artista = $artista;
            $this->_genero = $genero;
        }
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k = $v;
        }
        function insertar(){
            $sql = "insert into cancion (idCancion, nombre, duracion, idArtista, idGenero)
            values(null, '$this->_nombre', '$this->_duracion', '$this->_artista', '$this->_genero')";
            $insertar = mysqli_query($this->_conexion,$sql);
            return $insertar;
        }
        function modificar (){
            $sql = "update cancion set 
            nombre='$this->_nombre', duracion='$this->_duracion', 
            idArtista='$this->_artista', idGenero='$this->_genero'
            where idCancion=$this->_idcancion";
            $modificar = mysqli_query($this->_conexion,$sql);
            return $modificar;
        }
        function eliminar(){
            $sql = "delete from cancion where idCancion=$this->_idcancion";
            $eliminar = mysqli_query($this->_conexion, $sql);
            return $eliminar ;
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idCancion)/$this->paginacion) as cantidad from cancion")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from cancion order by idCancion")
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from cancion order by idCancion
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion)); 
                return $listado;
            }
        }
    }
    ?>