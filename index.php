<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <title>Inventory System</title>
  
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="plugins/sweetalert/sweetalert.css">

  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/moment.js"></script>
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="plugins/fastclick/fastclick.js"></script>
  <script src="js/app.min.js"></script>
  <script src="plugins/datatables/jquery.dataTables.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.js"></script>
  <script src="plugins/sweetalert/sweetalert.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="./" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>I</b>NV</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Inventory</b>&nbsp;System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce
                  <small>Administrator</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                  <a href="#" class="btn btn-default btn-block">Change Password</a>
                  <a href="#" class="btn btn-default btn-block">Log Out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
    $page = "";
    if(isset($_GET['p'])){
      $page = base64_decode($_GET['p']);
    }
  ?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header" id="waktu" style="text-align: center; color: white; font-size: 12px;"></li>

        <li class="treeview <?php echo empty($page)?'':substr($page,0,2)=='md'?'active':''; ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo empty($page)?'':$page=='mdKota'?'active':''; ?>">
              <a href="?p=<?php echo base64_encode('mdKota'); ?>"><i class="fa fa-circle-o"></i> Data Kota</a>
            </li>
            <li class="<?php echo empty($page)?'':$page=='mdCustomer'?'active':''; ?>">
              <a href="?p=<?php echo base64_encode('mdCustomer'); ?>"><i class="fa fa-circle-o"></i> Data Customer</a></li>
            <li class="<?php echo empty($page)?'':$page=='mdSupplier'?'active':''; ?>">
              <a href="?p=<?php echo base64_encode('mdSupplier'); ?>"><i class="fa fa-circle-o"></i> Data Supplier</a></li>
          </ul>
        </li>

        <li class="treeview <?php echo empty($page)?'':substr($page,0,2)=='ms'?'active':''; ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Master Stock</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo empty($page)?'':$page=='msCategory'?'active':''; ?>">
              <a href="?p=<?php echo base64_encode('msCategory'); ?>"><i class="fa fa-circle-o"></i> Data Category</a>
            </li>
            <li class="<?php echo empty($page)?'':$page=='msBrand'?'active':''; ?>">
              <a href="?p=<?php echo base64_encode('msBrand'); ?>"><i class="fa fa-circle-o"></i> Data Merk</a>
            </li>
          </ul>
        </li>

        <li><a href="#"><i class="fa fa-book"></i> <span>Setting</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1 id="judul">Content Header</h1>
    </section>

    <section class="content">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-body" id="konten">
            <?php include('pages/content.php'); ?>
          </div>
        </div>
      </div>
    </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 by [K]</a></strong>
  </footer>
</div>

<script>
  function waktu(){
    a = moment().format('dddd, DD MMMM YYYY - HH:mm:ss');
    $('#waktu').html(a);
  }

  $(document).ready(function(){
    setInterval(function(){ waktu(); }, 1000);
  });
</script>
</body>
</html>
