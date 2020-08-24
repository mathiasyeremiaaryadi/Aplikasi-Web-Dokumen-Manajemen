<!DOCTYPE html>
<html>
<?php include("../../template/formhead.php"); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Doc - </b>M</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your management!!</p>
	<?php
	if(isset($_GET['error']) && $_GET['error'] == "Password_salah"){
		echo "<p class='login-box-msg text-danger'><b>Invalid Password, please try again</b></p>";
	}
	
	if(isset($_GET['error']) && $_GET['error'] == "Username_tidak_terdaftar") {
		echo "<p class='login-box-msg text-danger'><b>Sorry, your email has not register yet</b></p>";
	}
	?>
    <form action="../process/process_login.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Your Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Your Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
