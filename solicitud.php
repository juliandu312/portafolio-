<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visión Limpieza Hogar</title>
    <link rel="stylesheet" href="css/stylesolicitud.css">
<!--Link a bootstrap: -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert2@11.js"></script> <!-- Agrega este script para el menú responsive -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    
  
    
</head>
<body>

    <div class="main-content">
    <button type="button" data-bs-toggle="modal" class="btn btn-warning btn-1" data-bs-target="#ModalConsultarSolicitud">Consultar Estado de Solicitud</button>
    
        <div class="container">
            <h2 class="h2-1">¡Env&iacute;anos tu Solicitud!</h2>
            <p class="p-1">Visi&oacute;n Limpieza Hogar es una Empresa con una Vision...<br>Somos una Empresa independiente Paisa con &uacute;nico trabajo en el &aacute;rea Metropolitana y en crecimiento constante, nos encantaría tenerte a tí</p>


      <form id="registroFormulario" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h4>Completa el Formuario y te daremos respuesta lo m&aacute;s pronto posible</h4>
<div class="form-group mb-3">
<label  class="form-label" for="Nombre">Nombre Completo</label>
<input type="text" class="form-control" name="Nombre" placeholder="Pepito Perez">
  
</div>
<div class="form-group mb-3">
<label  class="form-label" for="Identificacion_Solicitud">Identificaci&oacute;n</label>
<input type="number" class="form-control" name="Identificacion_Solicitud" placeholder="12345678910">
  
</div>



<div class="form-group mb-3">
<label  class="form-label" for="Url"><h5>Adjunte una url, donde podamos acceder a su Curriculum, recuerde agregar sus datos de contacto al Curriculum, la maxima cantidad de digitos son 255</h5></label>
<input type="url" class="form-control" name="Url" placeholder="https:/www.direcciondecurriculum.com">
  
</div>





<div class="modal-footer">
<button type="submit" class="btn btn-primary">Enviar Solicitud</button>

     
      </div>
      </form>

      </div>
    </div>
  </div>
</div>


<!--Modal Consulta:-->
<div class="modal fade" id="ModalConsultarSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Consultar Estado de Solicitud</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="responseMessage" class="mb-3"></div>

      <form id="solicitudFormulario" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <h4>Ingrese la Identificaci&oacute;n del solicitante</h4>
<div class="form-group mb-3">
<label  class="form-label" for="ID_Solicitud">ID del solicitante:</label>
<input type="number" class="form-control" name="ID_Solicitud_Consulta" placeholder="">
  
</div>

<div class="modal-footer">
      <button type="submit" class="btn btn-primary">Guardar</button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
      </div>
      </form>

      </div>
    </div>
  </div>
</div>
<!--Fin del modal Consulta-->
<style>
    .alert {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999; /* Asegúrate de que esté por encima de otros elementos */
    padding: 15px;
    margin-bottom: 0;
    border: 1px solid transparent;
    border-radius: 4px;
  }
  
  /* Estilos adicionales para cada tipo de alerta */
  .alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
  }
  
  .alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
  }
  /* Estilos generales */
body {
    font-family: Roboto, sans-serif;
    background-color: #f8f9fa;
}

/* Formulario */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-label {
    font-weight: 500;
    color: #6c757d;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 5px;
}

/* Botones */
.btn {
    
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0069d9;
}

/* Modal */
.modal-content {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>




            
           
            </div>
        </div>
    </div>

    <footer>
    
    </footer>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.left === "-250px") {
                sidebar.style.left = "0";
            } else {
                sidebar.style.left = "-250px";
            }
        }
    </script>
    <button type="button" class="btn btn-primary pull-right" onclick="location.href='index.php'">Volver</button>
</body>
</html>
<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestion_productos'); 
//Inicialización de conexion; 

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//Ahora vamos a llamar los datos y los vamos a mostrar como tarjetas(cards);





$alertaExitosa = "<div class='alert alert-success'><h2>Solicitud realizada Exitosamente</h2></div>";
//Capturar los datos:
if (isset($_POST['Identificacion_Solicitud'])) { 
  $sql = "SELECT * FROM solicitudcomisionista";
$result = mysqli_query($link, $sql);

//Si hay resultados, los mostramos:

if (mysqli_num_rows($result) >= 6) {
    ?>
    <script>

    Swal.fire({
        title: "Lo sentimos, tenemos muchas solicitudes, intentalo más tarde",
        icon: "warning",
        width: 600,
        padding: "3em",
        color: "#716add",
        background: "#fff url(/images/trees.png)",
       backdrop: `
          rgba(238, 195, 6, 0.4)
          left top
          no-repeat
        `
      });
      
      </script>
      <?php
    //Cerramos la conexion;
    mysqli_close($link);
    exit();
    
}
    
    $Nombre = $_POST['Nombre'];    
    $Identificacion_Solicitud = $_POST['Identificacion_Solicitud'];

    //Tomar Cantidad de digitos de ID:
    $validacionID = strlen($Identificacion_Solicitud);
    
//vamos a validar que no este repetido:
    $sql = "SELECT UsuarioID FROM solicitudcomisionista WHERE UsuarioID = '$Identificacion_Solicitud'";
    $Identificacion_Repetida = mysqli_real_escape_string($link, $Identificacion_Solicitud);
    $resultado_repetida = mysqli_query($link, $sql);
    $validacion_repetida = mysqli_num_rows($resultado_repetida); //mysqli_num_rows($variable_que_almacena_la_consulta):Esta nos da la cantidad de filas que se obtuvieron de la consulta
    

    //Si no hay repetidos, procedemos a insertar los datos:
 if ($validacionID >= 10 and $validacionID <= 11 and $validacion_repetida == 0) { 
            $Url = $_POST['Url'];
            $zonaHoraria = date_default_timezone_set('America/Bogota');
            $Fecha = date("y-m-d");
            $Estado_Solicitud = 'Pendiente';
            
            //SQL:
            $sql = "INSERT INTO solicitudcomisionista(SolicitudID, UsuarioID, Curriculum, EstadoSolicitud, FechaSolicitud, Nombre_Completo) VALUES ('0','$Identificacion_Solicitud','$Url','$Estado_Solicitud','$Fecha','$Nombre')";
            $resultado = mysqli_query($link, $sql);
            if ($resultado) {
                ?>
    <script>

    Swal.fire({
        title: "La Solicitud Realizada Exitosamente",
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
                mysqli_close($link);
                
            } else {
                ?>
    <script>

    Swal.fire({
        title: "Error al realizar la solicitud, intentelo nuevamente",
        icon: "error",
        width: 600,
        padding: "3em",
        color: "#e90808",
        background: "#fff url(/images/trees.png)",
       backdrop: `
          rgba(187, 50, 50, 0.4);
          left top
          no-repeat
        `
      });
      
      </script>
      <?php
                mysqli_close($link);
            }

        
        } else {
           
            ?>
    <script>

    Swal.fire({
        title: "La identificación debe tener entre 10 y 12 caracteres, intentelo nuevamente",
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
            if ($validacion_repetida >= 1) {
                ?>
                <script>
            
                Swal.fire({
                    title: "Ya fue creada una solicitud con esa Identificacion, no puede crearse otra solicitud con una misma Identificacion hasta que sea aprobada o revisada",
                    icon: "warning",
                    width: 600,
                    padding: "3em",
                    color: "#716add",
                    background: "#fff url(/images/trees.png)",
                   backdrop: `
                      rgba(155, 96, 20, 0.8)
                      left top
                      no-repeat
                    `
                  });
                  
                  </script>
                  <?php
        
            }
        }
} 

//Aquí vamos a consultar y buscar el resultado:
if (isset($_POST['ID_Solicitud_Consulta'])) { 
    $Identificacion_Consulta = $_POST['ID_Solicitud_Consulta'];
    $Validacion_Consulta = strlen($Identificacion_Consulta);
    if ($Validacion_Consulta >=10 and $Validacion_Consulta <=11) { 
        //Ahora verificamos que está en la base de datos;
        $sql = "SELECT UsuarioID FROM solicitudcomisionista WHERE UsuarioID = '$Identificacion_Consulta'";
    $Identificacion_Repetida = mysqli_real_escape_string($link, $Identificacion_Consulta);
    $resultado = mysqli_query($link, $sql);
        if (mysqli_num_rows($resultado) > 0) { 
            $row = mysqli_fetch_assoc($resultado);
            if ($row['UsuarioID'] == $Identificacion_Consulta) { 
$sql = "SELECT EstadoSolicitud FROM solicitudcomisionista WHERE UsuarioID = '$Identificacion_Consulta'";
    $Identificacion_Repetida = mysqli_real_escape_string($link, $Identificacion_Consulta);
    $resultado = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $Estado_Consulta_Solicitud = $row['EstadoSolicitud'];

    if ($Estado_Consulta_Solicitud == 'Aceptada') {
      $sql = "SELECT Password FROM comisionista WHERE UsuarioID = '$Identificacion_Consulta'";
    $resultado = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($resultado);
    if (empty($row['Password']))    {
        $Password_solicitante = '0';
        $Password_solicitante = 'Contraseña no disponible';
    } else {
        $Password_solicitante = $row['Password'];

    ?>
    <script>
    const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: "btn btn-primary",
    cancelButton: "btn btn-secondary"
  },
  buttonsStyling: false
});
swalWithBootstrapButtons.fire({
  title: "El Estado de la solicitud del Solicitante Número: <?php echo $Identificacion_Consulta ." es: " .$Estado_Consulta_Solicitud?>",
  text: "Bienvenido nuevo Comisionista!",
  icon: "success",
  showCancelButton: true,
  confirmButtonText: "Consultar Contrase&ntilde;a",
  cancelButtonText: "Cerrar",
  reverseButtons: true,
  color: "#716add",
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire({
      title: "Su Contrase&ntilde;a es: <?php echo $Password_solicitante?>",
      text: "Inicie Sesión como COMISIONISTA para Ingresar a su panel de Comisionista",
      icon: "info"
    });
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire({
      title: "Parece que ya sabes tu contrase&ntilde;a",
      text: "¿para qué vienes aquí? 🤨",
      icon: "question"
    });
  }
});
      
      </script>
      <?php 
      }
    } else {
      ?>
    <script>

    Swal.fire({
      title: "El Estado de la solicitud del Solicitante Número: <?php echo $Identificacion_Consulta ." es: " .$Estado_Consulta_Solicitud?>",
        icon: "info",
        width: 600,
        padding: "3em",
        color: "#716add",
        background: "#fff url(/images/trees.png)",
       backdrop: `
          rgba(0,0,123,0.4)
          url("img/cat-nyan-cat.gif")
          left top
          no-repeat
        `
      });
      
      </script>
      <?php
    }
      }
    } else {
        ?>
    <script>

    Swal.fire({
        title: "La identificación debe tener entre 10 y 12 caracteres, intentelo nuevamente",
        icon: "error",
        width: 600,
        padding: "3em",
        color: "#716add",
        background: "#fff url(/images/trees.png)",
       backdrop: `
          rgba(0,0,123,0.4)
          url("img/cat-nyan-cat.gif")
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
        title: "No nay niguna Solicitud con esa Identificacion",
        icon: "error",
        width: 600,
        padding: "3em",
        color: "#716add",
        background: "#fff url(/images/trees.png)",
        backdrop: `
          rgba(0,0,123,0.4)
          url("img/cat-sad-gato-triste.gif")
          left top
          no-repeat
        `
      });
      
      </script>
      <?php
}
} 



    
?>