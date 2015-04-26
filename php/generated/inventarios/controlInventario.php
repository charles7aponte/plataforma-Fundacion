<?php

@include_once("../include_dao.php");

class controlInventario {

    public function guardarInventario() {

        if (isset($_POST['cantidad'])) {

            $cantidad = $_POST['cantidad'];
            $descripcion = $_POST['descripcion'];
            $activo = $_POST['activo'];
            $precio = $_POST['precio'];
            $id_categoria = $_POST['id_categoria'];
            $txtNombres = $_POST['txtNombres'];
            $fecha_ing = $_POST['fecha_ing'];
            $fecha_com = $_POST['fecha'];
            $medida = $_POST['medida'];
            $organizacion_idorganizacion = $_POST['organizacion_idorganizacion'];




            $elementos = new Elemento();


            $elementos->idelementos;
            $elementos->nombre = $txtNombres;
            $elementos->activo = $activo;
            $elementos->precio = $precio;
            $elementos->categoria = $id_categoria;
            $elementos->descripcion = $descripcion;
            $elementos->cantidad = $cantidad;
            $elementos->fechaIngreso = $fecha_ing;
            $elementos->fechaCompra = $fecha_com;
            $elementos->medida = $medida;
            $elementos->categoriaId = $id_categoria;
            $elementos->organizacionIdorganizacion = $organizacion_idorganizacion;


            DAOFactory::getElementosDAO()->insert($elementos);
        }
    }

    public function editarElementos() {

        if (isset($_POST['miid'])) {
            $elemento = DAOFactory::getElementosDAO()->load($_POST['miid']);
            $cantidad = $_POST['cantidad'];
            $descripcion = $_POST['descripcion'];
            $activo = $_POST['activo'];
            $precio = $_POST['precio'];
            $id_categoria = $_POST['id_categoria'];
            $txtNombres = $_POST['txtNombres'];
            $fecha_ing = $_POST['fecha_ing'];
            $fecha_com = $_POST['fecha'];
            $medida = $_POST['medida'];
            $organizacion_idorganizacion = $_POST['organizacion_idorganizacion'];



            $elemento->nombre = $txtNombres;
            $elemento->activo = $activo;
            $elemento->precio = $precio;
            $elemento->categoria = $id_categoria;
            $elemento->descripcion = $descripcion;
            $elemento->cantidad = $cantidad;
            $elementos->fechaIngreso = $fecha_ing;
            $elementos->fechaCompra = $fecha_com;
            $elementos->medida = $medida;
            $elemento->categoriaId = $id_categoria;
            $elementos->organizacionIdorganizacion = $organizacion_idorganizacion;



            DAOFactory::getElementosDAO()->update($elemento);
        }
    }

    public function eliminarElemento($idelementos) {

        return $rowsDeleted = DAOFactory::getElementosDAO()->delete($idelementos);
    }

    public function editarElemento($idelementos) {

        return $rowsUpdate = DAOFactory::getModulesDAO()->update($idelementos);
    }

    public function guardarCat() {
        if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
            $miscategorias = new Categoria();
            //$miscategorias->id=$newCategoria[$i];
            $miscategorias->nombre = $_POST['nombre'];
            $miscategorias->descripcion = $_POST["descripcion"];
            
            DAOFactory::getCategoriaDAO()->insert($miscategorias);
            return 1;
        }
        return 0;
    }
    
    public function obtenerCategorias(){
        return DAOFactory::getCategoriaDAO()->queryAll();
    }

}

?>