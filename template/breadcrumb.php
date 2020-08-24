<!-- breadcrumb.php -->
<?php 
	$user = "";
	$doc = "";
	$division = "";
	$kategori = "";
	$home = "";
	$tambah = "";
	$edit = "";
	$profil = "";

	if(isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = "";
  }

  switch($page) {
    case "docs":
    	$doc = "Document"; break;
    case "kat":
    	$kategori = "Kategori"; break;
    case "div":
    	$division = "Divisi"; break;
    case "user":
    	$user = "User"; break;
    	
    case "add_docs":
    case "docs":
    	$doc = "Document";
    	$tambah = "Tambah"; break;

    case "add_kat":
		case "kat":
			$kategori = "Kategori";
	    $tambah = "Tambah"; break;

    case "add_div":
    case "div":
	    $division = "Divisi";
	    $tambah = "Tambah"; break;

    case "add_user":
    case "user":
    	$user = "User";
      $tambah = "Tambah"; break;

    case "edit_docs":
    case "docs":
    	$doc = "Document";
    	$edit = "Edit"; break;

    case "edit_kat":
    case "kat":
    	$kategori = "Kategori";
    	$edit = "Edit"; break;

    case "edit_div":
    case "div":
    	$division = "Divisi";
    	$edit = "Edit"; break;

    case "edit_user":
    case "user":
    	$user = "User";
      $edit = "Edit"; break;

    case "profile":
     $profil = "Profile"; break;
     
    default:
      $home = "Dashboard"; break;
  }
?>
<h1>
	<?php echo $user . $doc . $division . $kategori . $home . $profil; ?>
	<small><?php echo $tambah . $edit; ?></small>
</h1>