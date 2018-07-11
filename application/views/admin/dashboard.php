<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Chrome Extension</title>
  <!-- Bootstrap core CSS-->
  <link href="<?=base_url('theme')?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?=base_url('theme')?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?=base_url('theme')?>/css/sb-admin.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/css/toastr.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Chrome Extension</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <div class="row">
        <div class="col-md-12">
          <h3>Upload File</h3>
          <!-- <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p> -->
        </div>
        <div class="col-md-12">
        <form class="form-horizontal" action="<?php echo site_url('admin/upload_file'); ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-md-4" for="email">Select File:</label>
            <div class="col-md-8">
              <input type="file" class="form-control" id="upload_file" name="upload_file">
            </div>
          </div>         
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-4">
              <button type="submit" class="btn btn-success">Submit</button>
              <a href="<?php echo base_url().'admin/download_excel_file'; ?>">
                <button type="button" class="btn btn-default">Download File</button>
              </a>
            </div>           
          </div>
        </form>
        </div>
      </div>
     
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you sure you want to log out?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('theme')?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('theme')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('theme')?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('theme')?>/js/sb-admin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/js/toastr.js"></script>
    <script>
      <?php if(isset($login_success)){?>
      $(function () {
          $('#error').ready(function () {
              // make it not dissappear
              toastr.success("<?=$login_success?>", "Login successfully", {
                  "timeOut": "0",
                  "extendedTImeout": "0"
              });
          });
                
      });

    <?php } ?>
    <?php if(isset($success)){?>
      $(function () {
          $('#error').ready(function () {
              // make it not dissappear
              toastr.success("<?=$success?>", "File Uploaded successfully", {
                  "timeOut": "0",
                  "extendedTImeout": "0"
              });
          });
                
      });
    <?php } ?>
    <?php if(isset($error)){?>
      $(function () {
          $('#error').ready(function () {
              // make it not dissappear
              toastr.error("<?=$error?>", "Error", {
                  "timeOut": "0",
                  "extendedTImeout": "0"
              });
          });
                
      });
    <?php } ?>


    </script>
  </div>

  
</body>

</html>
