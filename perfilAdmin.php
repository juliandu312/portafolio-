<?php
session_start();

if (!isset($_SESSION['AdminID'])) {
    // Si no hay una sesión activa, redirigir a login.php
    header('Location: indexIngresar.html');
    exit;
} else {
    // El usuario está autenticado, mostrar el contenido de la página

}
require_once 'database.php';
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_productos'); 
//Inicialización de conexion;
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Sanitizar el valor para evitar inyecciones SQL
    $AdminID = $_SESSION['AdminID'];
    $sql = "SELECT NombreUsuario FROM administrador where AdminID = '$AdminID'";
$resultado = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($resultado); 
$AdminID = $_SESSION['AdminID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Righteous&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap">
    <link rel="stylesheet" href="/estilo_Admin.css">
    <link rel="stylesheet" href="./librerias/datatables.min.css">
    <script src="./librerias/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

</head>

<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white text-center href=" #">
        <h1>Visión Limpieza</h1>
    </a>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscador" aria-label="Search">
        <button class="btn btn-outline-success my-custom-button" type="submit"><i
                class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 btn btn-primary bg-white" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa-solid fa-bars"></i>
            </button>
        </li>
    </ul>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
        <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="sidebar col-md- col-lg-2 p-0 bg-body-tertiary bg-black">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                aria-labelledby="sidebarMenuLabel">
                <div class="offcanvas-header bg-dark">
                    <h5 class="offcanvas-title text-white" id="sidebarMenuLabel">Visión Limpieza</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto bg-dark">
                <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link d-flex icon-link-hover align-items-center gap-2 active text-white"
                                aria-current="page" href="vistaAdmin.php">
                                <i class="fa-regular fa-folder"></i>
                                Portafolio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-white" href="comisionistas/indexadminco.php">
                                <i class="fa-regular fa-address-book"></i>
                                Comisionistas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-1 text-white" href="comisionistas/solicitudes.php">
                                <i class="fa-solid fa-address-card"></i>
                                Solicitudes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-white" href="proveedores/proveedores.php">
                                <i class="fa-solid fa-paste"></i>
                                Provedores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-white" href="#">
                                <i class="fa-solid fa-wallet"></i>
                                Recibo de pagos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2 text-white" href="#">
                                <i class="fa-solid fa-calculator"></i>
                                Abono de pagos
                            </a>
                        </li>
                        
                    </ul>

                    <hr class="my-4">

                    <ul class="nav flex-column mb-auto">

                        <div class="dropdown gap-4">
                            <a href="#"
                                class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./imagenes2/logo1.jpg" alt="" width="32" height="32"
                                    class="rounded-circle me-2">
                                <strong><?php echo $row['NombreUsuario']?></strong>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                <li><a class="dropdown-item" href="#">Configuración</a></li>
                                <li><a class="dropdown-item" href="perfilAdmin.php">Perfil</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        href="">Salir</button></li>
                            </ul>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Visión
                                                limpieza
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <a>¿Deseas cerrar sesión?</a>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <a class="nav-link" href="cerrarSesion.php">
                                                <button type="button" class="btn btn-primary" href="cerrarSesion.php">Cerrar Sesi&oacute;n</button>
                                                <input type="text">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <?php
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Consulta para obtener los datos de ese comisionistas
$AdminID = $_SESSION['AdminID'];
$sql = "SELECT NombreUsuario, ApellidosUsuario, Email, AdminID, Telefono, Password FROM administrador WHERE AdminID = '$AdminID'";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="datoTelefono">
                <?php

echo "<div class='datoNombre'>";
        echo "<label for='nombre'>Nombres:</label>";
        echo "<br><input type='text' class='form-control' id='nombre' minlength='1' maxlength='55' name='nombre' placeholder='". $row['NombreUsuario']. "' >";
        echo "</div>";

        echo "<div class='datoApellido'>";
        echo "<label for='apellido'>Apellidos:</label>";
        echo "<br><input type='text' class='form-control' id='apellido' minlength='1' maxlength='55' name='apellido' placeholder='". $row['ApellidosUsuario']. "' >";
        echo "</div>";

        echo "<div class='datoComision'>";
        echo "<label for='email'>Email</label>";
        echo "<br><input type='text' class='form-control' id='email' minlength='1' maxlength='55' name='email' placeholder='". $row['Email']. "' >";
        echo "</div>";

    
  
        echo "<div class='datoTelefono'>";
        echo "<label for='telefono'>Tel&eacute;fono: </label>";
        echo "<br><input type='number' class='form-control' id='telefono' name='telefono' min='1' max='10000000000000' placeholder='". $row['Telefono']. "' min='1'>";
        echo "</div>";

        
        
        echo "<div class='datoIdentificacion'>";
        echo "<label for='identificacion'>AdminID:</label>";
        echo "<br><input type='text' class='form-control' id='identificacion' name='AdminID' placeholder='". $row['AdminID']. "' min='1' disabled>";
        echo "</div>";
        echo "<div class='datoPassword'>";
        echo "<label for='password'>Contrase&ntilde;a:</label>";
        echo "<br><input type='number' class='form-control' id='password' name='contrasena' placeholder='". $row['Password']. "' min='1' max='10000000000000'>";
        echo "</div>";
        ?>

        <button type="submit" class="btn btn-primary">
        Guardar Cambios
        </button>
               </form>
        
                <?php
        
        
//Ahora si el boton se presiona hacemos la consulta;
        if (isset($_POST['AdminID']) or isset($_POST['nombre']) or isset($_POST['apellido']) or isset($_POST['email']) or isset($_POST['telefono']) or isset($_POST['contrasena'])) {//Inicio de la Condición de Actualizar ID
            //Ahora Capturamos los datos;

            //Ahora validaremos la contraseña;
if (!empty($_POST['contrasena']) ) {//Si empty es true el ! cambia la condicion (el valor que arroje) a false
    $ContrasenaAdmin = $_POST['contrasena'];
    $validar_len_contrasena = strlen($ContrasenaAdmin);
    if ($validar_len_contrasena >= 8 and $validar_len_contrasena <= 12) {
        //Si la contraseña es valida, realizamos la consulta;
        $ContrasenaAdmin = $_POST['contrasena'];
} else {
    $sql = "SELECT Password from administrador where AdminID = '$AdminID'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$ContrasenaAdmin = $row['AdminID'];
}
} else {
    $ContrasenaAdmin = $_SESSION['AdminID'];
}
//Ahora debemos hacer la validaciones de cada una de las variables
//Validar Nombre;
if (!empty($_POST['nombre'])) {//Si empty es true el ! cambia la condicion a false
    $NombreAdmin = $_POST['nombre'];
} else {
$sql = "SELECT NombreUsuario, Password from administrador where AdminID = '$ContrasenaAdmin'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$NombreAdmin = $row['NombreUsuario'];
}
//Validar Apellido;

if (!empty($_POST['apellido'])) {//Si empty es true el ! cambia la condicion a false
    $ApellidoAdmin = $_POST['apellido'];
} else {
$sql = "SELECT ApellidosUsuario from administrador where AdminID = '$ContrasenaAdmin'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$ApellidoAdmin = $row['ApellidosUsuario'];

}

//Validar Email;

if (!empty($_POST['email'])) {//Si empty es true el ! cambia la condicion a false
    $EmailAdmin = $_POST['email'];
} else {
$sql = "SELECT Email from administrador where AdminID = '$ContrasenaAdmin'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$EmailAdmin = $row['Email'];
}

//Validar Telefono;

if (!empty($_POST['telefono'])) {//Si empty es true el ! cambia la condicion a false
    $TelefonoAdmin = $_POST['telefono'];
} else {
$sql = "SELECT Telefono, Password from administrador where AdminID = '$ContrasenaAdmin'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$TelefonoAdmin = $row['Telefono'];
}

//Validar AdminID;
if (empty($_POST['AdminID'])) {//Si empty es true trae el dato de la base de datos
    $sql = "SELECT AdminID, Password from administrador where AdminID = '$ContrasenaAdmin'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$AdminID = $row['AdminID'];

$validar_len_ID = strlen($AdminID);
} else {

    $AdminID = $_SESSION['AdminID'];
    $validar_len_ID = strlen($AdminID);
}


//Ahora haremos la consulta para actualizar los datos;
            
            //Ahora colocaremos validaciones al AdminID: 
if ($validar_len_ID >= 8 and $validar_len_ID <= 12) {
            $sql = "UPDATE administrador SET AdminID= '$AdminID', NombreUsuario = '$NombreAdmin', ApellidosUsuario = '$ApellidoAdmin',Email = '$EmailAdmin', Password = '$ContrasenaAdmin', Telefono = '$TelefonoAdmin' WHERE AdminID = '$AdminID'";
            $resultado = mysqli_query($link, $sql);
                if ($resultado) {
                    ?>
                <script>
            
                Swal.fire({
                    title: "Datos Actualizados Correctamente",
                    icon: "success",
                    width: 600,
                    padding: "3em",
                    color: "#716add",
                    background: "#fff url(/images/trees.png)",
                backdrop: `
                    rgba(60, 238, 6, 0.4)
                    left top
                    no-repeat
                    `
                });
                
                </script>
                <?php
                } else {
                    echo "Error: ". $sql. "<br>". mysqli_error($link);
                    ?>
        <script>

        Swal.fire({
            title: "Error a la hora de Actualizar los Datos :(",
            icon: "error",
            width: 600,
            padding: "3em",
            color: "#e90808",
            background: "#fff url(/images/trees.png)",
        backdrop: `
            rgba(187, 50, 50, 0.4)
            left top
            no-repeat
            `
        });
        
        </script>
        <?php
                }
            } else {
                
                

                ?>
        <script>

        Swal.fire({
            title: "El AdminID no es válido. Debe tener entre 10 y 12 caracteres.",
            icon: "error",
            width: 600,
            padding: "3em",
            color: "#e90808",
            background: "#fff url(/images/trees.png)",
        backdrop: `
            rgba(187, 50, 50, 0.4)
            left top
            no-repeat
            `
        });
        
        </script>
        <?php
            }
        
        
        } //fin del la condición de Actualizar ID
        //Inicio Condici
        
    }
}


?>

        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#registroFormulario").on('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: './formularioAdmin.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $("#responseMessage").html(response);
            }
        });
    });
});
</script>
<script src="./script.js"></script>
<script src="./librerias/jquery-3.7.1.min.js"></script>
<script src="./librerias/datatables.min.js"></script>
</div>
</div>


</body>

</html>