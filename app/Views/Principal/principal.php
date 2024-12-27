<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TRAVELER - Free Travel Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?= base_url() ?>template2/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>template2/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>info@quiropracticosquito.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0" >
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5" >
                <a href="" class="navbar-brand" style="width: 30%">
                    <img src="<?= base_url() ?>template2/img/logo.jpeg" width="100%">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Principal</a>
                        <a href="#nosotros" class="nav-item nav-link">Nosotros</a>
                        <a href="#servicios" class="nav-item nav-link">Servicios</a>
                        <a href="#productos" class="nav-item nav-link">Productos</a>
                        <a href="#citas" class="nav-item nav-link">Agendar Cita</a>
                        
                       
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="https://sciatica.clinic/wp-content/uploads/2020/12/smiling-physiotherapist-with-diagnosis-and-pen-ges-GMVJ8ZS_02.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Quiropracticos Quito</h4>
                            <h3 class="display-3 text-white mb-md-4">Donde comienza el alivio y renace el bienestar</h3>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Agendar Cita</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="https://momentuminjury.com/wp-content/uploads/2021/02/chiro-tools.jpg" alt="Image" >
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Quiropracticos Quito</h4>
                            <h1 class="display-3 text-white mb-md-4">El primer paso hacia una vida sin dolor.</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Agendar Cita</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


   


    <!-- About Start -->
    <section id="nosotros">
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="https://i0.wp.com/elmilenio.info/wp-content/uploads/2018/11/quiropraxia-para-tratamento-de-coluna.jpg?resize=640%2C768&ssl=1" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Sobre Nosotros</h6>
                        <h1 class="mb-3">Donde comienza el alivio y renace el bienestar.</h1>
                        <p>En el Centro de Terapias Quiroprácticas Quito, somos especialistas en cuidar de tu salud y bienestar a través de soluciones personalizadas y efectivas. Nuestro compromiso es ayudarte a recuperar la movilidad, aliviar el dolor y mejorar tu calidad de vida, siempre con un enfoque profesional y humano.</p>
                        <div class="row mb-4">
                            <div class="col-12">
                                <img class="img-fluid" src="https://static.vecteezy.com/system/resources/previews/033/879/018/non_2x/human-skeleton-anatomy-x-ray-on-dark-background-3d-rendering-highlighted-lower-back-pain-showing-with-red-holographic-spine-ai-generated-free-photo.jpg" alt="">
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Precios Accesibles</h5>
                            <p class="m-0">Cuidamos tu salud, sin comprometer tu bolsillo</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Mejor Atención</h5>
                            <p class="m-0">Tu salud en manos de especialistas certificados</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Innovación y Salud</h5>
                            <p class="m-0">Tratamientos avanzados, resultados excepcionales</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Service Start -->
    <section id="servicios">
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Servicios</h6>
                <h1>Especialistas para tu salud</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        
                        <i class="fas fa-hospital-alt mx-auto mb-4"></i>
                        <h5 class="mb-2">Citas Medicas</h5>
                        <p class="m-0">Tu bienestar comienza con una cita. ¡Agenda ahora!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fas fa-shopping-cart mx-auto mb-4"></i>
                        <h5 class="mb-2">Productos</h5>
                        <p class="m-0">Elige calidad, elige salud. Productos para tu cuerpo en su mejor estado.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4">
                        <i class="fas fa-user-md mx-auto mb-4"></i>
                        <h5 class="mb-2">Especialistas</h5>
                        <p class="m-0">Confía en los expertos, confía en tu salud.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Service End -->


    <!-- Packages Start -->
    <section id="productos">
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Productos</h6>
                <h1>A los mejores precios</h1>
            </div>
            <div class="row">
                
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="https://www.miquiropractica.com/cdn/shop/products/IMG_5957_1024x1024@2x.png?v=1627008415" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Disponible</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>1 Persona</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Disco de Balance</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>5.0</h6>
                                    <h5 class="m-0">$49.99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="https://www.miquiropractica.com/cdn/shop/products/IMG_5957_1024x1024@2x.png?v=1627008415" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Disponible</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>1 Persona</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Disco de Balance</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>5.0</h6>
                                    <h5 class="m-0">$49.99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="https://www.miquiropractica.com/cdn/shop/products/IMG_5957_1024x1024@2x.png?v=1627008415" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Disponible</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>1 Persona</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Disco de Balance</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>5.0</h6>
                                    <h5 class="m-0">$49.99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="https://www.miquiropractica.com/cdn/shop/products/IMG_5957_1024x1024@2x.png?v=1627008415" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Disponible</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>1 Persona</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Disco de Balance</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>5.0</h6>
                                    <h5 class="m-0">$49.99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="https://www.miquiropractica.com/cdn/shop/products/IMG_5957_1024x1024@2x.png?v=1627008415" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Disponible</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>1 Persona</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Disco de Balance</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>5.0</h6>
                                    <h5 class="m-0">$49.99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="https://www.miquiropractica.com/cdn/shop/products/IMG_5957_1024x1024@2x.png?v=1627008415" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Disponible</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>1 Persona</small>
                            </div>
                            <a class="h5 text-decoration-none" href="">Disco de Balance</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>5.0</h6>
                                    <h5 class="m-0">$49.99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </section>
    <!-- Packages End -->


    <!-- Registration Start -->
    <section id="citas">
    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Agenda tu cita con nuestros profesionales</h6>
                        <h1 class="text-white"><span class="text-primary">¡CUIDA TU SALUD Y BIENESTAR</span> CON QUIROPRÁCTICA PROFESIONAL!</h1>
                    </div>
                    <p class="text-white">Descubre el alivio que tu cuerpo necesita</p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Ajustes quiroprácticos seguros y efectivos.</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Terapias complementarias para el alivio del dolor.</li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Planes de cuidado diseñados para tus necesidades.</li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-primary text-center p-4">
                            <h1 class="text-white m-0">Agenda Tu Cita</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-white p-5">
                            <form>
                                <label class="form-group">Doctor</label>
                                <div class="form-group">
                                    <select class="custom-select px-4">
                                        <option>Seleccione</option>
                                    </select>
                                </div>
                                <label class="form-group">Horario</label>
                                <div class="form-group">
                                    <select class="custom-select px-4">
                                        <option>Seleccione</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-group">Observación</label>
                                    <input type="text" class="form-control p-4" name="observacion" />
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block py-3" type="submit" name="enviar">Agendar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Registration End -->

    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Quiropracticos Quito</a>. Todos los derechos reservados.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Desarrollado por <a href="https://htmlcodex.com"></a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>template2/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>template2/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>template2/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= base_url() ?>template2/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= base_url() ?>template2/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?= base_url() ?>template2/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?= base_url() ?>template2/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>template2/js/main.js"></script>
</body>

</html>