<!DOCTYPE html>
<html lang="en">

<head>
  <?php

  include '../includes/class-autoload.inc.php';

  $userObjView = new UsersView();
  $sessionUser = $_SESSION['email'];
  $userData = $userObjView->showUserByEmail($sessionUser);

  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CourseLib</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="perfil.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">


  <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
  <script type="text/javascript">
    //funciones anonimas: fn sin nombre//
    $(document).ready(function() {
      $('#actualizarb').click(function() {

        var txtInput = $(this).val();
        var value = document.getElementById('fullName').value;
        var value2 = document.getElementById('phone').value;
        var value3 = document.getElementById('eMail').value;
        var value4 = document.getElementById('ciTy').value;
        var value5 = document.getElementById('sTate').value;
        var value6 = document.getElementById('contra').value;

        var uppercase = /[A-Z]/;
        var lowercase = /[a-z]/;
        var number = /[0-9]/;
        var special = /[\W]{1,}/;
        var pswd_length = value2.length < 8;

        if ((value === '' || value2 === '' || value3 === '' || value4 === '' || value5 === '' || value6 === '')) {

          alert('Faltan datos por llenar');
          //$('#name').val('');
          //$('#matricula').val('');
        }

        if (!uppercase.test(value6) || !lowercase.test(value6) || !number.test(value6) || !special.test(value6) || pswd_length) {

          alert("La contraseña debe tener minimo 8 caracteres, una mayuscula, 1 caracter especial y un número ");
          //La contraseña debe tener al minimo 8 caracteres,
          return false;
        }

        //VALIDACION LETRAS
        const letra = document.getElementById('fullName').value;
        const pattern = new RegExp('^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]+$', 'i');
        if (!pattern.test(letra)) {
          alert('Inserte solo letras en el nombre');
          return false;
        }

        const letra1 = document.getElementById('ciTy').value;
        const pattern4 = new RegExp('^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]+$', 'i');
        if (!pattern4.test(letra1)) {
          alert('Inserte solo letras en la ciudad');
          return false;
        }

        const letra2 = document.getElementById('sTate').value;
        const pattern3 = new RegExp('^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]+$', 'i');
        if (!pattern3.test(letra2)) {
          alert('Inserte solo letras en el estado');
          return false;
        }

        //VALIDACION DE EMAIL
        var inputText = document.getElementById('eMail').value;
        ValidateEmail(inputText);

        //VALIDACION DE NUMERO
        var valor = document.getElementById('phone').value;
        if (isNaN(valor)) {
          alert('Ingrese solo numeros en el telefono');
          return false;
        } else if (!(/^\d{8}$/.test(valor))) {
          alert('Ingrese 8 digitos en el telefono');
          return false;
        } else {
          alert('Sus datos han sido actualizados correctamente');
          document.getElementById("fullName").value = "";
          document.getElementById("phone").value = "";
          document.getElementById("eMail").value = "";
          document.getElementById("ciTy").value = "";
          document.getElementById("sTate").value = "";
        }

      });

      function ValidateEmail(inputText) {
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (inputText.match(mailformat)) {
          //alert("You have entered a valid email address!");    //The pop up alert for a valid email address
          //document.form1.text1.focus();
          return true;
        } else {
          alert("Por favor ingresa un email valido!"); //The pop up alert for an invalid email address
          document.form1.text1.focus();
          return false;
        }
      }
    });
  </script>


</head>

<body>

  <!-- VENTANA MODAL DE EDITAR PERFIL-->
  <?php

  echo '
  <form action="Includes/editProfile.inc.php" method="post" enctype="multipart/form-data">
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card h-100">
            <div class="card-body">
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h6 class="mb-2 text-primary">Detalles del perfil</h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="fullName">Nombre de usuario</label>
                    <input type="text" class="form-control" id="userName" name="userNameEditProfile" placeholder="Ingrese su nombre" value="' . $userData[0]['NombreUsuario'] . '">
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="eMail">Correo electrónico</label>
                    <input type="email" class="form-control" id="eMail" name="emailEditProfile" placeholder="Ingrese su correo" value="'. $userData[0]['Email'] . '" disabled>
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="foto">Imagen de usuario</label>
                    <input type="file" class="form-control" id="foto" name="fotoEditProfile">
                  </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <input type="password" class="form-control" id="contra" name="passwordEditProfile" placeholder="Ingrese la contraseña" value="'. $userData[0]['Contrasena'] . '">
                  </div>
                </div>

              </div>
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">
                    <button type="button" id="submit" name="cancelUpdateProfile" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                    <button type="submit" id="actualizarb" name="updateProfile" class="btn btn-primary">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  ';
  ?>

  <div class="container" style="margin-top: 5px;">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <!--<img src="https://centromedicomontemar.cl/wp-content/uploads/2015/06/sin-perfil.png" alt="Admin"
                  class="rounded-circle" width="150" height="150">-->
                <?php
                echo '<img src="data:image;base64,' . base64_encode($userData[0]['FotoUsuario']) . '"alt="image" class="rounded-circle" width="150" height="150">';
                ?>
                <div class="mt-3">
                  <!--<h4>Dari Espinosa</h4>-->
                  <?php
                  echo "<h4>" . $userData[0]['NombreUsuario'] . "</h4>";
                  ?>
                  <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Editar Perfil</button>

                  <!--<a href="Chat_Nuevo.php" class="btn btn-secondary">Mensajes</a>-->
                  <a href='Includes/logout.inc.php' class="btn btn-outline-danger">Cerrar Sesion</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8" style="margin-top: 85px;">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nombre de usuario</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <!--Dari Espinosa-->
                  <?php
                  echo $userData[0]['NombreUsuario'];
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Correo electrónico</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <!--dari@gmail.com-->
                  <?php
                  echo $userData[0]['Email'];
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Fecha de última modificación</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <!--30/04/2021-->
                  <?php
                  echo $userData[0]['FechaMod'];
                  ?>
                </div>
              </div>
              <!--<div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Direccion</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Monterrey, N.L., Mexico
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Descripcion</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Me gusta aprender cosas nuevas
                    </div>
                    
                  </div>-->

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!--BOTONES PARA EL HISTORIAL-->
  <a href="historial_Cursos.php" style="margin-left:  500px; margin-bottom: 10px;" class="btn btn-secondary">Historial de cursos</a>
  <br>
  <?php
  if ($userData[0]['Rol'] == 'Escuela') {

    echo '<a href="historial_ventas.php" style="margin-left:  500px; " class="btn btn-secondary">Historial de ventas</a>';
  }

  $purchaseObj = new PurchasesView();
  $purchases = $purchaseObj->showBoughtCourses($userData[0]['Email']);
  ?>


  <!-- CONTAINER DE CURSOS -->
  <div class="container text-center" style="margin-top: 5px; margin-bottom: 30px;">
    <text class="Cursos">
      Cursos Comprados
    </text>
  </div>
  <div class="container" style="margin-top: 20px;">
    <div class="row clearfix">
      <?php

      foreach ($purchases as $purchase) {

        $courseObj = new CoursesView();
        $course = $courseObj->showCourseById($purchase['IdCurso']);
        echo'
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="boxs project_widget">
            <div class="pw_img">
              <img class="img-responsive" src="data:image;base64,' . base64_encode($course[0]['ImagenCurso']) . '" alt="About the image" style="height:250px;">
            </div>
            <div class="pw_content">
              <div class="pw_header">
                <h6>' . $course[0]['TituloCurso'] . '</h6>
              </div>
              <div class="pw_meta">
                <span>Progreso: ' . $purchase['AvanceUsuario'] . "%" . '</span>
                <a href="cursos_info.php?idCursoInfo=' . $course[0]['IdCurso'] . '" class="btn btn-danger btn-sm" name=curso' . $course[0]['IdCurso'] . '>Ver curso</a>
              </div>
            </div>
          </div>
        </div>';
      }

      ?>
    </div>
  </div>

  <?php
  $Rol = $userData[0]['Rol'];
  if ($Rol == 'Escuela') {

  ?>

    <!-- CONTEINER DE CURSOS -->
    <div class="container text-center" style="margin-top: 70px; margin-bottom: 30px;">
      <text class="Cursos">
        Cursos Creados
      </text>
    </div>

    <div class="container">
      <div class="row clearfix">
        <?php
        $coursesObj = new CoursesView();
        $createdCourses = $coursesObj->showCourseByUser($sessionUser);
        foreach ($createdCourses as $course) {

          echo
          '<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="boxs project_widget">
              <div class="pw_img">
                  <img class="img-responsive" src="data:image;base64,' . base64_encode($course['ImagenCurso']) . '" alt="About the image" style="height:250px;">
              </div>
              <div class="pw_content">
                  <div class="pw_header">
                      <h6>' . $course['TituloCurso'] . '</h6>
                  </div>
                  <div class="pw_meta">
                      <span>Precio: $MXN ' . $course['CostoCurso'] . '</span>
                      <span>Vendidos: ' . $course['Vendidos'] . '</span>
                      <span>Calificación: ' . $course['PromedioCurso'] . '</span>
                      <a href="cursos_info.php?idCursoInfo=' . $course['IdCurso'] . '" class="btn btn-danger btn-sm" name=curso' . $course['IdCurso'] . '>Ver curso</a>
                  </div>
              </div>
          </div>
      </div>';
        }
        ?>
      </div>
    </div>
  <?php
  }
  ?>

</body>

</html>