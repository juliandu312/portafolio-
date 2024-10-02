<?php 
session_start();
if (isset($_SESSION['PasswordComisionista'])) {
    // Si el usuario está autenticado, destruimos la sesión y redirigimos
    session_destroy();
    echo "<script>alert('Sesión cerrada correctamente.'); window.location.href = 'ingresarComisionistas.php';</script>";
} else {
    // Si el usuario no está autenticado, mostramos un mensaje de error
    echo "<script>alert('No hay ninguna sesión iniciada.'); window.location.href = '../../index.php';</script>";
}
exit;
?>