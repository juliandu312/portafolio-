<?php
session_start();
include('./database.php');
include("./metodos.php");


$id = $_GET['id'];

$obj = new Metodos();
if ($obj->eliminarProducto($id) == 1) {
    header("Location:vistaAdmin.php");
} else {
    echo "Error al eliminar";
}