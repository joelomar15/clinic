<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">


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
  <!-- calendar file css -->
  <link rel="stylesheet" href="<?= base_url() ?>template/js/semantic.min.css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
</head>

<body class="inner_page login">
  <div class="full_container">
    <div class="container">
      <div class="center verticle_center full_height">
        <div class="login_section">
          <div class="logo_login">
            <div class="center">
              <img width="210" src="<?= base_url() ?>template/images/logo/logo.png" alt="#" />
            </div>
          </div>
          <div class="login_form">
            <?php echo $this->renderSection('contenedor'); ?>
          </div>
        </div>
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
  <!-- nice scrollbar -->
  <script src="<?= base_url() ?>template/js/perfect-scrollbar.min.js"></script>
  <script>
    var ps = new PerfectScrollbar('#sidebar');
  </script>
  <!-- custom js -->
  <script src="<?= base_url() ?>template/js/custom.js"></script>


</body>

</html>