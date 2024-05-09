<?php
    class Genero{
        private $_conexion;
        private $_idgenero;
        private $_descripcion;
        private $pafginacion = 10;
        
        function __construct($conexion,$idgenero,$descripcion){
            $this->_conexion = $conexion;
            $this->_idgenero = $idgenero;
            $this->_descripcion = $descripcion;
        }
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k =$v;
        }
        function insertar(){
            $sql = "insert into generoliterario (idgeneroLiterario,descripcion)
            values (null, '$this->_descripcion')";
            echo "sql". $sql;
            $insertar = mysqli_query($this->_conexion, $sql);
            return $insertar;
        }
        function modificar(){
            $sql = "update generoliterario set
            descripcion='$this->_descripcion' where idgeneroLiterario=$this->_idgenero";
            echo "sql". $sql;
            $modificar = mysqli_query($this->_conexion,$sql);
            return $modificar;
        }
        function eliminar(){
            $sql = "delete from generoliterario where idgeneroLiterario=$this->_idgenero";
            echo  "sql". $sql;
            $eliminar = mysqli_query($this->_conexion, $sql);
            return $eliminar;
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idgeneroLiterario)/$this->paginacion) as cantidad from generoliterario")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from generoliterario order by idgeneroLiterario")
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from Cliente order by idCliente
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion)); 
                return $listado;
            }            
        }
    }