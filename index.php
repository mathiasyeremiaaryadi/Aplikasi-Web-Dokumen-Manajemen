<?php
session_start();

include("pages/process/db.php");

if(!isset($_SESSION['user_id'])){
  header('Location: pages/login_logout/login.php');
}

if(isset($_SESSION['user_id'])) {
  $setLogged = mysqli_query( $koneksi, "UPDATE user SET log = '" . time() . "' WHERE id = '" . $_SESSION['user_id'] . "'") or die(mysqli_error());
}

$sql = "SELECT user.*, divisi.nama AS divisi
        FROM user JOIN divisi ON user.divisi_id = divisi.id WHERE user.id = $_SESSION[user_id]";
$hasil = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($hasil);

$page = "";
$in = "";
if(isset($_GET['page'], $_GET['in'])) {
  $page = $_GET['page'];
  $in = $_GET['in'];
}
?>
<!DOCTYPE html>
<html>

<?php include("template/head.php"); ?>

<body class="hold-transition skin-blue-light sidebar-mini">
  <div class="wrapper">

    <?php include("template/header1.php"); ?>

    <!-- Left side column. contains the logo and sidebar -->
    <?php include("template/aside1.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <?php 
        include("template/breadcrumb.php");
        // echo "<b>user_id = " . $_SESSION["user_id"] . " | ";
        // echo "divisi_id = " . $_SESSION["divisi_id"] . "</b>";
        ?>
      </section>

      <!-- Main content -->
      <section class="content">

        <?php if ($page == "") {
          include("home.php");
        } else {
          include("pages/" . $in . "/" . $page . ".php");
        } ?>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include("template/footer.php"); ?>

  </div>
  <!-- ./wrapper -->

  <?php include("script/script.php"); ?>

</body>
</html>