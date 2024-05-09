<?php
    class Cliente {
        private $_conexion;
        private $_idCliente;
        private $_nombreCliente;
        private $_documentoCliente;
        private $_correoCliente;
        private $_paginacion = 10;

        function __construct($conexion, $idCliente, $nombreCliente, $documentoCliente, $correoCliente){
            $this->_conexion = $conexion;
            $this->_idCliente = $idCliente;
            $this->_nombreCliente = $nombreCliente;
            $this->_documentoCliente = $documentoCliente;
            $this->_correoCliente = $correoCliente;
        }
        function __get($k){
            return $this->$k;
        }
        function __set($k, $v){
            $this->$k = $v;
        }
        function insertar(){
              echo "Entra al insertar";
            $sql = "insert into cliente (idCliente, nombreCliente, documentoCliente, correoCliente) 
            values (null, '$this->_nombreCliente','$this->_documentoCliente','$this->_correoCliente')";
            echo "sql ".$sql;
            var_dump($sql);
            $insercion = mysqli_query($this->_conexion,$sql);
            return $insercion;           
        }
        function modificar(){
            $sql = "update cliente set 
            nombreCliente='$this->_nombreCliente', documentoCliente='$this->_documentoCliente',
            correoCliente='$this->_correoCliente'
            where idCliente=$this->_idCliente";
           
            var_dump($sql);
            
            $modificacion = mysqli_query($this->_conexion,$sql);
            return $modificacion;            
        }
        function eliminar (){
            $eliminacion = mysqli_query($this->_conexion, "delete from cliente where idCliente=$this->_idCliente");
            return $eliminacion;
        }
        function cantidadPaginas(){
            $cantidadBloques = mysqli_query($this->_conexion, "select ceil(count (idCliente)/$this->paginacion) as cantidad from Cliente")
            or die (mysqli_error($this->_conexion));
            $unRegistro = mysqli_fetch_array($cantidadBloques);
            return $unRegistro['cantidad'];
        }
        function listar($pagina){
            if($pagina<=0){
                $listado = mysqli_query($this->_conexion, "select * from cliente order by idCliente")
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
?>