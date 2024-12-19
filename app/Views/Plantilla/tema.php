<!DOCTYPE html>
<html>

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>QP | <?php echo $titulo; ?></title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- site icon -->
  <link rel="icon" href="<?= base_url() ?>template/images/fevicon.png" type="image/png" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="<?= base_url() ?>template/css/bootstrap.min.css" />
  <!-- site css -->
  <link rel="stylesheet" href="<?= base_url() ?>template/style.css" />
  <!-- responsive css -->
  <link rel="stylesheet" href="<?= base_url() ?>template/css/responsive.css" />
  <!-- color css -->
  <link rel="stylesheet" href="<?= base_url() ?>template/css/colors.css" />
  <!-- select bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>template/css/bootstrap-select.css" />
  <!-- scrollbar css -->
  <link rel="stylesheet" href="<?= base_url() ?>template/css/perfect-scrollbar.css" />
  <!-- custom css -->
  <link rel="stylesheet" href="<?= base_url() ?>template/css/custom.css" />

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="dashboard dashboard_1">
  <div class="full_container">
    <div class="inner_container">
      <!-- Sidebar  -->
      <nav id="sidebar">
        <div class="sidebar_blog_1">
          <div class="sidebar-header">
            <div class="logo_section">
              <a href="<?= base_url() ?>ad/home"><img class="logo_icon img-responsive rounded-circle" src="<?= dirname(base_url()) . "/writable/" . session('foto') ?>" alt="#" /></a>
            </div>
          </div>
          <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
              <div class="user_img" id="fotoTema1"><img class="img-responsive" src="<?= dirname(base_url()) . "/writable/" . session('foto') ?>" alt="#" /></div>
              <div class="user_info">
                <h6><?php echo session('usuario'); ?></h6>
                <p><span class="online_animation"></span> Online</p>
              </div>
            </div>
          </div>
        </div>
        <div class="sidebar_blog_2">
          <h4>Panel de Control</h4>
          <ul class="list-unstyled components">
            <li><a href="<?= base_url() ?>ad/home"><i class="fa fa-home blue2_color"></i> <span>Home</span></a></li>
            <li><a href="<?= base_url() ?>ad/doctor"><i class="fa fa-user-md orange_color"></i> <span>Doctores</span></a></li>
            <li><a href="<?= base_url() ?>ad/cliente"><i class="fa fa-user purple_color2"></i> <span>Clientes</span></a></li>
            <li><a href="<?= base_url() ?>ad/horario"><i class="fa fa-calendar red_color"></i> <span>Horarios</span></a></li>
            <li><a href="<?= base_url() ?>ad/oferta"><i class="fa fa-gift green_color"></i> <span>Ofertas</span></a></li>
            <li><a href="<?= base_url() ?>ad/producto"><i class="fa fa-shopping-cart blue1_color"></i> <span>Productos</span></a></li>
            <li><a href="<?= base_url() ?>ad/asignar"><i class="fa fa-tasks yellow_color"></i> <span>Asignaciones</span></a></li>
            <li class="active">
              <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
              <ul class="collapse list-unstyled" id="additional_page">
                <li>
                  <a href="profile.html">> <span>Profile</span></a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
      <!-- end sidebar -->
      <!-- right content -->
      <div id="content">
        <!-- topbar -->
        <div class="topbar">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="full">
              <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
              <div class="logo_section">
                <a href="<?= base_url() ?>ad/home"><img class="img-responsive" src="<?= base_url() ?>template/images/logo/logo.png" alt="#" /></a>
              </div>
              <div class="right_topbar">
                <div class="icon_info">
                  <ul class="user_profile_dd">
                    <li>
                      <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="<?= dirname(base_url()) . "/writable/" . session('foto') ?>" alt="#" /><span class="name_user"><?php echo session('usuario'); ?></span></a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url() ?>ad/doctor/newPass"><span>Cambiar Contraseña</span> <i class="fa fa-sign-out"></i></a>
                        <a class="dropdown-item" href="<?= base_url() ?>salir"><span>Cerrar Sessión</span> <i class="fa fa-sign-out"></i></a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
        <!-- dashboard inner -->
        <div class="midde_cont">
          <div class="container-fluid">
            <div class="row column_title">
              <div class="col-md-12">
                <div class="page_title">
                  <h2><?php echo $titulo; ?></h2>
                </div>
              </div>
            </div>

            <?php echo $this->renderSection('contenedor'); ?>

          </div>
          <!-- footer -->
          <div class="container-fluid">
            <div class="footer">
              <p>Copyright © 2024 QuiroPracticos Quito. All rights reserved.<br><br>
              </p>
            </div>
          </div>
        </div>
        <!-- end dashboard inner -->
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url() ?>template/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>template/js/popper.min.js"></script>
  <script src="<?= base_url() ?>template/js/bootstrap.min.js"></script>
  <!-- wow animation -->
  <script src="<?= base_url() ?>template/js/animate.js"></script>
  <!-- select country -->
  <script src="<?= base_url() ?>template/js/bootstrap-select.js"></script>
  <!-- owl carousel -->
  <script src="<?= base_url() ?>template/js/owl.carousel.js"></script>
  <!-- chart js -->
  <script src="<?= base_url() ?>template/js/Chart.min.js"></script>
  <script src="<?= base_url() ?>template/js/Chart.bundle.min.js"></script>
  <script src="<?= base_url() ?>template/js/utils.js"></script>
  <script src="<?= base_url() ?>template/js/analyser.js"></script>
  <!-- nice scrollbar -->
  <script src="<?= base_url() ?>template/js/perfect-scrollbar.min.js"></script>
  <script>
    var ps = new PerfectScrollbar('#sidebar');
  </script>
  <!-- custom js -->
  <script src="<?= base_url() ?>template/js/chart_custom_style1.js"></script>
  <script src="<?= base_url() ?>template/js/custom.js"></script>


  <?php echo $this->renderSection('scripts'); ?>


</body>

</html>