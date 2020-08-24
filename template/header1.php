<?php
  $loggedtime = time() - 300; // 5 minutes
  $sql2 = "SELECT judul FROM docs WHERE divisi_id = $_SESSION[divisi_id]";
  $sql = "SELECT nama, log FROM user WHERE log > '" . $loggedtime . "' ORDER BY `id` ASC";
  $getLogged = mysqli_query($koneksi, $sql) or die(mysqli_error());
  $getFile = mysqli_query($koneksi, $sql2);
?>
<!-- header1.php -->
<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>D</b>M</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Doc - </b>M</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning"><?php echo mysqli_num_rows($getLogged); ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header"><?php echo mysqli_num_rows($getLogged); ?> user(s) online</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <?php if(mysqli_num_rows($getLogged) > 0) {
                    while($logged = mysqli_fetch_array($getLogged)) {
                 ?>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-green"></i> <?php echo $logged['nama']; ?> is Online<br>
                  </a>
                </li>
              <?php 
                } } //end if 
                else echo "<li><a href='#''>No user is online</a></li>";
              ?>
                <?php while($row5 = mysqli_fetch_array($getFile)) { ?>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> <?php echo $row5['judul']; ?> File added
                  </a>
                </li>
              <?php } ?>
              </ul>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo $row['foto']; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $row['nama']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo $row['foto']; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $row['nama']; ?> - <?php echo $row['divisi']; ?>
                <small>Member since <?php echo $row['member']; ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="index.php?page=profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="pages/login_logout/logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>