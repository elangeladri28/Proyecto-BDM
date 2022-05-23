<!DOCTYPE html>
<html lang="en">

<head>
  <?php

  include_once '../includes/class-autoload.inc.php';
  include_once 'nav.php';

  $userObjView = new UsersView();
  $sessionUser = $_SESSION['email'];
  $userData = $userObjView->showUserByEmail($sessionUser);

  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sportcity</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/modsperfil.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" 
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Sport_balls.svg/1200px-Sport_balls.svg.png" />


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
  <script defer src="../js/edituser.script.js"></script>

</head>

<body>

  <div id="nav-bar">

  </div>

  <!-- VENTANA MODAL DE EDITAR PERFIL-->
  <?php

  echo '
    <form id="editUserForm" action="../includes/editProfile.inc.php" method="post" enctype="multipart/form-data">
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
                      <label for="fullName">Nombre</label>
                      <input type="text" class="form-control" id="nameEditUser" name="nameEditProfile" placeholder="Nombre" value="' . $userData[0]['name'] . '" required>
                      <div id="editUserNameError" class ="editUserError"></div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="fullName">Apellido paterno</label>
                      <input type="text" class="form-control" id="lastname1EditUser" name="lastname1EditProfile" placeholder="Apellido paterno" value="' . $userData[0]['lastname1'] . '" required>
                      <div id="editUserLastName1Error" class ="editUserError"></div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="fullName">Apellido materno</label>
                      <input type="text" class="form-control" id="lastname2EditUser" name="lastname2EditProfile" placeholder="Apellido materno" value="' . $userData[0]['lastname2'] . '" required>
                      <div id="editUserLastName2Error" class ="editUserError"></div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="eMail">Correo electrónico</label>
                      <input type="email" class="form-control" id="emailEditUser" name="userEmailEditProfile" placeholder="Correo electrónico" value="'. $userData[0]['userEmail'] . '" disabled>
                      <div id="editUserUserEmailError" class ="editUserError"></div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="fullName">Teléfono</label>
                      <input type="text" class="form-control" id="phoneEditUser" name="phoneEditProfile" placeholder="Teléfono" value="' . $userData[0]['phone'] . '">
                      <div id="editUserPhoneError" class ="editUserError"></div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="foto">Imagen de usuario</label>
                      <input type="file" class="form-control" id="foto" name="pictureEditProfile">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="pass">Contraseña</label>
                      <input type="password" class="form-control" id="passEditUser" name="userPassEditProfile" placeholder="Contraseña" value="'. $userData[0]['userPass'] . '"required>
                      <div id="editUserUserPassError" class ="editUserError"></div>
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
                echo '<img src="data:image;base64,' . base64_encode($userData[0]['picture']) . '" alt="image" class="rounded-circle" width="150" height="150">';
                ?>
                <div class="mt-3">
                  <?php
                  $userName = $userData[0]['name']." ".$userData[0]['lastname1']." ".$userData[0]['lastname2'];
                  echo "<h4>" . $userName . "</h4>";
                  ?>
                  <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Editar Perfil</button>

                  <!--<a href="Chat_Nuevo.php" class="btn btn-secondary">Mensajes</a>-->
                  <a href='../includes/logout.inc.php' class="btn btn-outline-danger">Cerrar Sesión</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8" style="margin-top: 0px;">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Nombre completo</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <!--Dari Espinosa-->
                  <?php
                  echo $userName;
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
                  echo $userData[0]['userEmail'];
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Teléfono</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <!--dari@gmail.com-->
                  <?php
                  echo $userData[0]['phone'];
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Tipo de usuario</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <!--dari@gmail.com-->
                  <?php
                  if($userData[0]['userType'] == 1){
                    $userType = "Administrador";
                  }
                  elseif($userData[0]['userType'] == 2){
                    $userType = "Reportero";
                  }
                  elseif($userData[0]['userType'] == 3){
                    $userType = "Lector";
                  }
                  echo $userType;
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Fecha de creación</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <!--30/04/2021-->
                  <?php
                  echo $userData[0]['userCrDate'];
                  ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Autorizado</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  Sí/No
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
  <!--<a href="historial_Cursos.php" style="margin-left:  500px; margin-bottom: 10px;" class="btn btn-secondary">Historial de cursos</a>-->
  <?php
    if($userData[0]['userType']==3){
      echo "<button class='btn btn-secondary' data-toggle='modal' data-target='#deleteOwnUser' style='margin-left:  500px; margin-bottom: 10px; background-color: red;'>Eliminar perfil</button>";
    }
  ?>
  <br>

  <form method="POST" action="../includes/deleteuser.inc.php" class="modal fade" id="deleteOwnUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body">
                  <form>
                      <div class="form-group">
                          <p>¿Estás segur@ que quieres eliminar este perfil?</p>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary" name="loginBtn">Eliminar perfil</button>
              </div>
          </div>
      </div>
  </form>
</body>

<script src="../js/navbar.js"></script>
<script>

</script>

</html>