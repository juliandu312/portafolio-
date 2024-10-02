<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="./Components/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estilo_ingresar.css">
    <link rel="stylesheet" href="./Components/icon.css">
    <link rel="icon" href="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<body class="scroll">
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-12 col-sm-12 m-0">
            <form class="form_container" id="FormLogin" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                <h1 class="text-center titulo" style="font-family: 'righteous';">Bienvenido comisionista</h1>
                <img src="https://i.ibb.co/0BmgTXK/vision-limpieza-removebg-preview.png" class=".logo_container"
                    width="90px" alt="">
                <div class="title_container">
                    <h3 class="text-center">Comisionista ingresa tu sesión</h3>
                    <span class="note text-center">Ingresa mediante la clave que te han brindado.</span>
                </div>
                <div id="message">
                </div>
                
                <div class="input_container">
                    <i class="fa-solid fa-lock icon text-center"></i>
                    <input placeholder="Contrase&ntilde;a" name="Identificacion_LogIn" type="password" class="input_field"
                        id="password_field">
                </div>
                <button type="submit" class="sign-in_btn">
                    <span>Ingresar</span>
                </button>
                <p class="note text-center">No des tu clave de acceso a terceros.</p>
                <a href="https://wa.me/3053396000/?text=" class="note text-center">He olvidado mi contraseña</a>
            </form>
        </div>
        <div class="col-xxl-8 col-xl-8 col-lg-6 col-md-12 col-sm-12 m-0 p-0">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.pexels.com/photos/4098576/pexels-photo-4098576.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="d-block w-90" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <!--<script>
            $(document).ready(function () {
                $("#FormLogin").on('submit', function (event) {
                    event.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        url: './ingresar.php',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#message').html(response)
                        }
                    })
                })
            });
        </script>-->

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_productos'); 
//Inicialización de conexion;
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (isset($_POST['Identificacion_LogIn'])) {
    $Identificacion_LogIn = $_POST['Identificacion_LogIn'];

    // Sanitizar el valor para evitar inyecciones SQL
    $Identificacion_LogIn = mysqli_real_escape_string($link, $Identificacion_LogIn);

    $sql = "SELECT Password FROM comisionista where Password = '$Identificacion_LogIn'";
$resultado = mysqli_query($link, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        if ($row['Password'] === $Identificacion_LogIn) {
            $_SESSION['PasswordComisionista'] = $row['Password'];
            echo "<script>window.location.href = 'vistaComisionista.php';</script>";
            
            exit;
        } else {
            ?>
                <script>
                Swal.fire({
                    title: "Contraseña Incorrecta",
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
                title: "Usuario no encontrado",
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
}
?>



