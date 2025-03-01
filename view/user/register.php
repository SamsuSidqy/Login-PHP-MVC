<?php  

require_once __DIR__ . '/../../controller/user/Register.php';
$valuePost = extract($_POST);
$ControllerRegister = new Register();

if ($valuePost) {

  $ControllerRegister::HandleRegister($_POST,'register','auth');
  
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  
  <link rel="stylesheet" href="../../">
  <link rel="stylesheet" href="../../">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<style>

<?php 

if (isset($_GET['page'])) {
	include 'assets/css/vertical-layout-light/style.css';
	include 'assets/vendors/ti-icons/css/themify-icons.css';
	include 'assets/vendors/css/vendor.bundle.base.css';
	include 'assets/css/vertical-layout-light/style.css';

}


?>	

</style>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">             
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" action="" method="POST">
                <div class="form-group">                  
                  <input name="username" type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username">
                </div>
                <div class="form-group">                   
                  <input name="email" type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                  <input name="name" type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Name">
                </div>
                <div class="form-group">                  
                  <input name="password" type="password" class="form-control  form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="?page=login" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
