<?php
class Metodos
{
    public function insertarDatos($datos)
    {
        include('./database.php');
        $conexion = $Link;
        $stmt = $conexion->prepare("INSERT INTO producto (NombreProducto,imagen,Descripcion,tamaño,precio, Etiqueta) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("sssiis", $datos['0'], $datos['1'], $datos['2'], $datos['3'], $datos['4'], $datos['5']);
        return $stmt->execute();
    }
    public function eliminarProducto($datos)
    {
        include('./database.php');
        $conexion = $Link;
        $sql = ("DELETE FROM producto WHERE ProductoID = 'ProductoID'");
        return $result = mysqli_query($conexion, $sql);
    }
}