<?php
    class Libro{
        private $_conexion;
        private $_idlibro;
        private $_titulo;
        private $_paginas;
        private $_idgenero;
        private $_ideditorial;
        private $_idautor;
        private $_paginacion;

        function __construct($conexion,$idlibro,$titulo,$paginas,$idgenero,$idautor,$ideditorial){
            $this->_conexion = $conexion;
            $this->_idlibro = $idlibro;
            $this->_titulo = $titulo;
            $this->_paginas = $paginas;
            $this->_idgenero = $idgenero;
            $this->_idautor = $idautor;
            $this->_ideditorial = $ideditorial;
        }
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k = $v;
        }
        function insertar (){
            /*$sql = "insert into libro (idlibro,titulo,paginas,idgeneroLitrerario,ideditorial,idautor)
            values(null, '$this->_titulo','$this->_paginas','$this->_idgenero','$this->_ideditorial',$this->_idautor')";*/
            $sql = "INSERT INTO libro (idlibro, titulo, paginas, idgeneroLiterario, ideditorial, idautor)
            VALUES (null, '$this->_titulo', '$this->_paginas', '$this->_idgenero', '$this->_ideditorial', '$this->_idautor')";
            $insertar = mysqli_query($this->_conexion,$sql);
            return $insertar;
        }
        function modificar(){
            $sql = "update libro set 
            titulo='$this->_titulo',paginas='$this->_paginas',
            idgeneroLiterario='$this->_idgenero',ideditorial='$this->_ideditorial',
            idautor='$this->_idautor' where idlibro=$this->_idlibro";
            $modificar = mysqli_query($this->_conexion, $sql);
            return $modificar;
        }
        function eliminar(){
            $sql = "delete from libro where idlibro=$this->_idlibro";
            $eliminar = mysqli_query($this->_conexion, $sql);
            return $eliminar;
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idlibro)/$this->paginacion) as cantidad from libro")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from libro order by idlibro")
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from libro order by idlibro
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion)); 
                return $listado;
            }            
        
        }
    }