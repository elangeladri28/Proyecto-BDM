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

    <link rel="stylesheet" href="../css/modsindex.css" />
    <link rel="icon" type="image/png"
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Sport_balls.svg/1200px-Sport_balls.svg.png" />
</head>

<header>
</header>

<body>
    <div id="nav-bar">


    </div>
   

    <!--Hasta aqui termina mi header, aunque es body xd-->

    <!--Aqui empieza la pagina mecanicas-->
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide under" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cdn2.mediotiempo.com/uploads/media/2020/10/11/casos-coronavirus-nfl-obligado-multiples.jpg"
                        class="d-block w-100 rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>NFL con "Buenas noticias"</h5>
                        <p>Hasta el momento no hay casos nuevos de Covid-19.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://www.boxingnewsonline.net/bn/wp-content/uploads/2020/10/lopez-lomachenko-action.jpg"
                        class="d-block w-100 rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>El Box y sus estrellatos</h5>
                        <p>Teofimo Lopez, el hombre que derroco a Vasiliy Lomachenko.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://cdn.24.co.za/files/Cms/General/d/8879/d687b06ae80a40c7b99ea5b266148c77.jpg"
                        class="d-block w-100 rounded" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Liderando Medio Maraton</h5>
                        <p>Jepchirchir cimenta un lugar en la historia como medio maratón de todos los tiempos.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!--Aqui el contenido es debajo del carrusel-->

        <!--Aqui empieza el primer card-deck-->
        <div class="card-deck">
            <div class="card">
                <img src="https://www.entrelineas.info/media/cache/pub_news_details_large/media/i/d2be38ece660cd10da650d10e0f8aa27775dc586.jpeg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">RUMBO A TOKIO 2021</h5>
                    <p class="card-text">El ENARD y el Comité Olímpico Argentino eligieron La Costa para la preparación
                        de la selección de Judo, con Paula Pareto.</p>
                </div>
                <!--Botonsote-->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#noticia4">Detalles</button>
                <div class="modal fade" id="noticia4" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Ver noticia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Botonsote-->
                <div class="card-footer">
                    <small class="text-muted">Deporte: Judo</small>
                </div>
            </div>
            <div class="card">
                <img src="https://imgresizer.eurosport.com/unsafe/1200x0/filters:format(jpeg):focal(1336x418:1338x416)/origin-imgresizer.eurosport.com/2020/10/15/2915566-59905288-2560-1440.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">NO QUIEREN QUE JUEGUE "EL BICHO"</h5>
                    <p class="card-text">El delantero portugués se encuentra confinado tras dar positivo en Italia por
                        coronavirus en la concentración con Portugal. De momento, se perderá el partido
                        que disputará este fin de semana la Juventus contra el Crotone.
                    </p>
                </div>
                <!--Botonsote-->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#noticia4">Detalles</button>
                <div class="modal fade" id="noticia4" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Ver noticia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Botonsote-->
                <div class="card-footer">
                    <small class="text-muted">Deporte: Futbol Soccer</small>
                </div>
            </div>
            <div class="card">
                <img src="https://1v1d1e1lmiki1lgcvx32p49h8fe-wpengine.netdna-ssl.com/wp-content/uploads/2019/07/1562896777-GettyImages-1156345545-960x600.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Scott regresará en dos semanas a PGA Champ.</h5>
                    <p class="card-text">Adam Scott está listo para hacer su tan esperado regreso al PGA Tour, ya que
                        planea regresar a la competencia en el PGA Championship.</p>
                </div>
                <!--Botonsote-->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#noticia4">Detalles</button>
                <div class="modal fade" id="noticia4" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Ver noticia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Botonsote-->

                <div class="card-footer">
                    <small class="text-muted">Deporte: Golf</small>
                </div>

            </div>
        </div>
        <!--Aqui termina el primer card-deck-->

        <!--Aqui empieza el segundo card-deck-->
        <div class="card-deck">
            <div class="card">
                <img src="https://www.eldiario24.com/d24ar/fotos/uploads/editorial/2013/12/29/imagenes/5255_ufc_anderson_silva_lesi%C3%B3n_2013_1.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Escalofriante lesión de la 'Araña' Anderson Silva</h5>
                    <p class="card-text">El mejor peleador de la historia en UFC, la ‘Araña’ Anderson Silva lanzó una
                        patada abajo hacia Chris Weidman, quien defendió bien, pero el luchador brasileño se fracturó la
                        pierna de manera horrible y escalofriante.</p>
                </div>
                <!--Botonsote-->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#noticia4">Detalles</button>
                <div class="modal fade" id="noticia4" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Ver noticia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Botonsote-->
                <div class="card-footer">
                    <small class="text-muted">Deporte: MMA</small>
                </div>
            </div>
            <divz class="card">
                <img src="https://k.uecdn.es/html5/html5lib/v2.73.3_ue_1/modules/KalturaSupport/thumbnail.php/p/110/uiconf_id/14969339/entry_id/0_pdy5tnxt/height/407?"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Fin al estado de alarma en los Lakers: Anthony Davis renovará</h5>
                    <p class="card-text">Anthony Davis saldrá al mercado de agentes libres, pero no para dejar los
                        Lakers. Diversas fuentes cercanas al jugador y a la directiva del campeón de la NBA han revelado
                        que la intención del ala-pívot de Chicago es negociar un nuevo contrato para seguir vistiendo de
                        amarillo las próximas temporadas.
                    </p>
                </div>
                <!--Botonsote-->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#noticia4">Detalles</button>
                <div class="modal fade" id="noticia4" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Ver noticia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Botonsote-->
                <div class="card-footer">
                    <small class="text-muted">Deporte: Basketball</small>
                </div>
            </divz>
            <div class="card">
                <img src="https://www.tennisworldes.com/imgb/40186/nadia-petrova-para-mi-roger-federer-es-perfecto-sin-embargo.jpg"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Roger Federer descarta la charla sobre la jubilación</h5>
                    <p class="card-text">Roger Federer dice que continuará jugando mientras se divierta y siga siendo
                        competitivo, aunque ha estado haciendo planes para retirarse durante cinco años.</p>
                </div>
                <!--Botonsote-->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#noticia4">Detalles</button>
                <div class="modal fade" id="noticia4" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Ver noticia</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Botonsote-->
                <div class="card-footer">
                    <small class="text-muted">Deporte: Tennis</small>
                </div>
            </div>
        </div>
        <!--Aqui termina el segundo card-deck-->

        <!--De aqui no pases culero, aqui es el container-->
    </div>

</body>
<script src="../js/navbar.js"></script>

<script>



</script>

</html>