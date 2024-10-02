<?php
require_once("database.php");
session_start();
if (empty($_SESSION['AdminID'])) {
    header('location:index.php');
    exit();
}
include('./database.php');

$AdminID = $_SESSION['AdminID'];
                        $sql = "SELECT NombreUsuario FROM gestion_productos.administrador WHERE AdminID = '$AdminID'";
                        $conexion = $Link;
                        $result = mysqli_query($conexion, $sql);
                        $row = mysqli_fetch_assoc($result);
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

</head>

<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white text-center href='#'">
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
                                                data-bs-dismiss="modal">Continuar</button>
                                            <a class="nav-link" href="./cerrarSesion.php">
                                                <button type="button" class="btn btn-primary">Cerrar</button>
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
            <div class="row">
                <div class="col-12">
                    <br>
                    <button type="button" class="btn bg-primary text-white" data-bs-toggle="modal"
                        data-bs-target="#agregar" data-bs-whatever="@mdo">Agregar</button>
                </div>
            </div>
            <div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="agregar">Registrar producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!--FORMULARIO PARA AGREGAR PRODUCTOS-->

                        <div class="modal-body">
                            <div id="responseMessage"></div>
                            <form id="registroFormulario" action="/formularioAdmin.php" method="post"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombre del
                                        producto</label>
                                    <input type="text" class="form-control" id="NombreProducto" name="nombre">
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" name="Descripcion" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Descripción</label>
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tamaño</label>
                                    <input type="text" class="form-control" id="tamaño" name="tamaño">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Precio</label>
                                    <input type="number" class="form-control" id="Precio" name="Precio">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Insertar</label>
                                    <select class="form-control" id="recipient-name" id="Etiqueta" name="Etiqueta">
                                        <option value="nuevo">Nuevo</option>
                                        <option value="promocion">Promoción</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3" id="imagen">
                                    <input type="file" class="form-control border-secondary" id="inputGroupFile04"
                                        name="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                        accept=".jpg,.jpeg,.png">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sql = "SELECT*FROM gestion_productos.producto";
            $result = mysqli_query($Link, $sql);
            while ($row = mysqli_fetch_array($result)) { ?>

            <div class="modal fade" id="Editar<?php echo $row['ProductoID'] ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="agregar">Editar productos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!--FORMULARIO PARA AGREGAR PRODUCTOS-->

                        <div class="modal-body">
                            <div id="responseMessage"></div>
                            <form id="registroFormulario" action="/editarProductos.php" method="post"
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nombre del
                                        producto</label>
                                    <input type="text" class="form-control" id="NombreProducto" name="nombre">
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea2" name="Descripcion" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Descripción</label>
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tamaño</label>
                                    <input type="text" class="form-control" id="tamaño" name="tamaño">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Precio</label>
                                    <input type="number" class="form-control" id="Precio" name="Precio">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Insertar</label>
                                    <select class="form-control" id="recipient-name" id="Etiqueta" name="Etiqueta">
                                        <option value="nuevo">Nuevo</option>
                                        <option value="promocion">Promoción</option>
                                        <option value="Normal">Normal</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3" id="imagen">
                                    <input type="file" class="form-control border-secondary" id="inputGroupFile04"
                                        name="imagen" aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                        accept=".jpg,.jpeg,.png">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="submit">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            };
            ?>
            </br>
            <div class="table table-striped table-hover mb-3">
                <table class="table text-dark" id="tablaProductos">
                    <thead>
                        <tr>
                            <th>Nombre del producto</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                            <th>tamaño</th>
                            <th>Precio</th>
                            <th>Etiqueta</th>
                            <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php
                        include('./database.php');
                        $sql = "SELECT ProductoID, NombreProducto, imagen, Descripcion, tamaño, Precio, Etiqueta FROM gestion_productos.producto";
                        $conexion = $Link;
                        $result = mysqli_query($conexion, $sql);
                        $resultado = mysqli_num_rows($result);

                        if ($resultado > 0) {
                            while ($key = mysqli_fetch_array($result)) {

                        ?>
                        <tr>
                            <td>
                                <?php echo $key['NombreProducto'] ?>
                            </td>
                            <td><img width=" 100" src="<?php echo './imagenes/' . $key['imagen'] ?>"
                                    alt="<?php echo $key['NombreProducto'] ?>">
                            </td>
                            <td>
                                <?php echo $key['Descripcion'] ?>
                            </td>
                            <td>
                                <?php echo $key['tamaño'] ?>
                            </td>
                            <td>
                                <?php echo $key['Precio'] ?>
                            </td>
                            <td>
                                <?php echo $key['Etiqueta'] ?>
                            </td>
                            <td class="d-flex justify-content-center">
                                <button data-bs-target="#Editar<?php echo $key['ProductoID'] ?>" data-bs-toggle="modal"
                                    class="btn me-2 btn-success"><i class="fas fa-pencil-alt"></i>Editar</button>
                                <button class="btn btn-danger"
                                    onclick="confirmacion(<?php echo $key['ProductoID']; ?>)">
                                    <i class="fas fa-trash-alt"></i>Eliminar</button>
                            </td>


                        </tr>
                        <?php
                            }
                        }


                        ?>
                    </tbody>
                </table>
            </div>
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