<?php
    class Estudiante{
        private $_conexion;
        private $_idEstudiante;
        private $_nombre;
        private $_direccion;
        private $_documento;
        private $_fechaNacimiento;
        private $_correoElectronico;
        private $_paginacion;


        function __construct($conexion, $idEstudiante, $nombre, $direccion, $documento, $fechaNacimiento, $correoElectronico){
            $this->_conexion = $conexion;
            $this->_idEstudiante = $idEstudiante;
            $this->_nombre = $nombre;
            $this->_direccion = $direccion;
            $this->_documento = $documento;
            $this->_fechaNacimiento = $fechaNacimiento;
            $this->_correoElectronico = $correoElectronico;
        }
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k = $v;
        }
        function insertar(){
            $sql = "insert into estudiante (idEstudiante, nombre, direccion, documento, fechaNacimiento, correoElectronico)
            values (null, '$this->_nombre', '$this->_direccion', '$this->_documento', '$this->_fechaNacimiento', '$this->_correoElectronico')";
            var_dump($sql);
            $insercion = mysqli_query($this->_conexion, $sql);
            return $insercion;
        }
        function modificar(){
            $sql = "update estudiante set nombre='$this->_nombre', 
            direccion='$this->_direccion',
            documento='$this->_documento',
            fechaNacimiento='$this->_fechaNacimiento',
            correoElectronico='$this->_correoElectronico'
            where idEstudiante='$this->_idEstudiante'";
            var_dump($sql);
            $modificacion = mysqli_query($this->_conexion, $sql);
            return $modificacion;
        }
        function eliminar(){
            $sql = "delete from estudiante where idEstudiante=$this->_idEstudiante";
            $eliminacion = mysqli_query($this->_conexion, $sql);
            return $eliminacion;
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idEstudiante)/$this->_paginacion) as cantidad from estudiante")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar ($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from estudiante order by idEstudiante")
                or die (mysqli_error($this->_conexion));
                return $listado;
            }else{
                $paginacionMax = $pagina * $this->_paginacion;
                $paginacionMin = $paginacionMax - $this->_paginacion;
                $listado = mysqli_query($this->_conexion, "select * from estudiante order by idEstudiante
                limit $paginacionMin, $paginacionMax") or die (mysqli_error($this->_conexion));
            }
        }

    //estudiante( idEstudiante int AUTO_INCREMENT PRIMARY key, 
    //nombre varchar (50), direccion varchar (50),
    //documento varchar (50), fechaNacimiento date,
        //correoElectronico varchar (50) ); 
    }
?>