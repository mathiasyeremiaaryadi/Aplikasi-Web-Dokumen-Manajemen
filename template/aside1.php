<!-- aside1.php -->
<?php 
  $class_home = "";
  $class_docs = "";
  $class_div = "";
  $class_user = "";
  $none = "";

  if(isset($_GET['page'])) {
      $page = $_GET['page'];
  } else {
    $page = "";
  }

  switch($page) {
    case "docs":
    case "kat":
    case "add_docs":
    case "add_kat":
    case "edit_docs":
    case "edit_kat":
      $class_docs = "active"; break;

    case "div":
    case "add_div":
    case "edit_div":
      $class_div = "active"; break;

    case "user":
    case "add_user":
    case "edit_user":
      $class_user = "active"; break;
    
    case "profile":
     $none; break;
     
    default:
      $class_home = "active"; break;
  }
?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $row['foto']; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $row['nama']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1){ ?>
      <li class="<?php echo $class_home; ?>">
        <a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a>
      </li>
      <li class="<?php echo $class_docs; ?>">
        <a href="index.php?page=docs"><i class="fa fa-files-o"></i> <span>Documents</span></a>
      </li>
      <li class="<?php echo $class_div; ?>">
        <a href="index.php?page=div"><i class="fa fa-users"></i> <span>Division</span></a>
      </li>
      <li class="<?php echo $class_user; ?>">
        <a href="index.php?page=user"><i class="fa fa-user"></i> <span>User</span></a>
      </li>
      <?php } elseif(isset($_SESSION['leader']) && $_SESSION['leader'] == 1){ ?>
      <li class="<?php echo $class_home; ?>">
        <a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a>
      </li>
      <li class="<?php echo $class_docs; ?>">
        <a href="index.php?page=docs"><i class="fa fa-files-o"></i> <span>Documents</span></a>
      </li>
      <li class="<?php echo $class_div; ?>">
        <a href="index.php?page=div"><i class="fa fa-users"></i> <span>Division</span></a>
      </li>
      <?php } elseif(isset($_SESSION['leader']) && $_SESSION['leader'] == 0){ ?>
      <li class="<?php echo $class_home; ?>">
        <a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a>
      </li>
      <li class="<?php echo $class_docs; ?>">
        <a href="index.php?page=docs"><i class="fa fa-files-o"></i> <span>Documents</span></a>
      </li>
      <?php } ?>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>