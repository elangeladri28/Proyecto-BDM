<?php

include_once '../includes/class-autoload.inc.php';  //Incluir clases automáticamente

if (isset($_GET['seccionId'])) {
  $seccionObj = new SeccionesView;
  $seccionInfo = $seccionObj -> showSeccionById($_GET['seccionId']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sport City</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
    crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <link rel="stylesheet" href="../css/modsadmin.css" />
  <link rel="icon" type="image/png"
    href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Sport_balls.svg/1200px-Sport_balls.svg.png" />
</head>

<header>
</header>

<body>
  <div id="nav-bar">


  </div>
  <!--ModalGuardarSeccion-->
  <div class="modal fade" id="ModalGuardarSeccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 style="text-align: center;">¿Estás seguro de que quieres crear una nueva sección?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Sí, guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!--ModalBorrarSeccion-->
  <div class="modal fade" id="ModalBorrarSeccion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 style="text-align: center;">¿Estás seguro de que quieres borrar esta sección?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Sí, borrar</button>
        </div>
      </div>
    </div>
  </div>

  <!--ModalModificarSeccion-->

  <div class="modal fade" id="ModalModificarSeccion" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar Sección</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre de Sección:</label>
              <input type="text" class="form-control" id="recipient-name">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Orden:</label>
              <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="0">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Agrega una imagen:</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="row">
      <div class="col-lg-6">
        <div class="alta-seccion">
          <form id="createSeccionForm" method="POST" action="../includes/createSeccion.inc.php" enctype="multipart/form-data">
            <h2 style="text-align: center;">Agregar Sección</h2>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nombre de Sección:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="seccionName" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Orden:</label>
              <input type="number" class="form-control" id="exampleFormControlInput1" name="seccionOrden" placeholder="0" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Color de sección:</label>
              <input type="color" class="form-control" id="exampleFormControlInput1" name="seccionColor" required>
            </div>
            <button type="submit" name="createSeccionBtn" class="btn btn-success btn-lg btn-block">Guardar</button>
          </form>
        </div>
      </div>


      <div class="col-lg-6">
        <div class="ver-seccion">
          <h2 style="text-align: center;">Secciones</h2>
          <!-- <div class="list-group-scrollable">
                    <button type="button" class="list-group-item list-group-item-action active">
                      Cras justo odio
                    </button>
                    <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>

                    <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
                    <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
                    <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
                    <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
                    <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>

                  </div> -->

          <div class="panel panel-primary" id="result_panel">
            <div class="panel-body">
              <ul class="list-group">
                <?php
                $seccionesObj = new SeccionesView();
                $seccionesList = $seccionesObj->showSecciones();
                foreach ($seccionesList as $seccion) {
                  echo '<li class="list-group-item"><strong>' . $seccion['categoryName'];
                  echo '</strong>
                        <div class="botonsillo">
                          <a href="secciones.php?seccionId=' . $seccion['categoryId'] . '" class="btn btn-info">Seleccionar Sección</a>
                        </div>
                      </li>';       //data-toggle="modal" data-target="#ModalModificarSeccion"
                }
                ?>
                <!--<li class="list-group-item"><strong>Futbol
                  </strong>
                  <div class="botonsillos">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#ModalModificarSeccion">Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#ModalBorrarSeccion">Eliminar</button>
                  </div>

                </li>
                <li class="list-group-item"><strong>Beisbol
                  </strong>
                  <div class="botonsillos">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#ModalModificarSeccion">Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#ModalBorrarSeccion">Eliminar</button>
                  </div>

                </li>
                <li class="list-group-item"><strong>Basketball
                  </strong>
                  <div class="botonsillos">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#ModalModificarSeccion">Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#ModalBorrarSeccion">Eliminar</button>
                  </div>

                </li>
                <li class="list-group-item"><strong>Deporte
                  </strong>
                  <div class="botonsillos">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#ModalModificarSeccion">Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#ModalBorrarSeccion">Eliminar</button>
                  </div>

                </li>
                <li class="list-group-item"><strong>Deporte
                  </strong>
                  <div class="botonsillos">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#ModalModificarSeccion">Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#ModalBorrarSeccion">Eliminar</button>
                  </div>

                </li>
                <li class="list-group-item"><strong>Deporte
                  </strong>
                  <div class="botonsillos">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#ModalModificarSeccion">Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#ModalBorrarSeccion">Eliminar</button>
                  </div>

                </li>
                <li class="list-group-item"><strong>Deporte
                  </strong>
                  <div class="botonsillos">
                    <button type="button" class="btn btn-warning" data-toggle="modal"
                      data-target="#ModalModificarSeccion">Modificar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                      data-target="#ModalBorrarSeccion">Eliminar</button>
                  </div>

                </li>-->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 40px">
      <div class="col-lg-6">
        <div class="alta-seccion">
          <form id="createSeccionForm" method="POST" action="../includes/editDeleteSeccion.inc.php<?php if (isset($_GET['seccionId'])) {echo "?seccionId=" . $seccionInfo[0]['categoryId'];} ?>" enctype="multipart/form-data">
            <h2 style="text-align: center;">Modificar o Eliminar Sección</h2>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nombre de Sección:</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="editSeccionName" value="<?php if (isset($_GET['seccionId'])) {echo $seccionInfo[0]['categoryName'];} ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Orden:</label>
              <input type="number" class="form-control" id="exampleFormControlInput1" name="editSeccionOrder" placeholder="0" value="<?php if (isset($_GET['seccionId'])) {echo $seccionInfo[0]['categoryOrder'];} ?>" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Agrega una imagen:</label>
              <input type="color" class="form-control" id="exampleFormControlInput1" name="editSeccionColor" required>
            </div>
            <div class="botonsillos">
              <button type="submit" class="btn btn-warning" name="editSeccionBtn">Modificar</button>
              <button type="submit" class="btn btn-danger" name="deleteSeccionBtn">Eliminar</button>
            </div>
            <!--<div class="botonsillos">
              <button type="submit" class="btn btn-warning" data-toggle="modal"
                data-target="#ModalModificarSeccion">Modificar</button>
              <button type="submit" class="btn btn-danger" data-toggle="modal"
                data-target="#ModalBorrarSeccion">Eliminar</button>
            </div>-->
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

</body>
<script src="../js/navbar.js"></script>

<script>



</script>

</html>