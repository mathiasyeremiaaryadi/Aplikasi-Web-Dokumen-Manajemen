<?php
if(!isset($_GET['kat_id']) AND !isset($_GET['user_id'])) {
    $sql = "SELECT docs.*, kategori.nama AS nama_kat, kategori.user_id
            FROM docs INNER JOIN kategori ON kategori.id = docs.kategori_id
            WHERE docs.divisi_id = $_SESSION[divisi_id]";
  } elseif(isset($_GET['kat_id']) AND !isset($_GET['user_id'])) {
    $sql = "SELECT docs.*, kategori.nama AS nama_kat, kategori.user_id
            FROM docs INNER JOIN kategori ON kategori.id = docs.kategori_id
            WHERE docs.divisi_id = $_SESSION[divisi_id] AND kategori.id = $_GET[kat_id]";
  } elseif(isset($_GET['user_id']) AND !isset($_GET['kat_id'])) {
    $sql = "SELECT docs.*, kategori.nama AS nama_kat, kategori.divisi_id
            FROM docs INNER JOIN kategori ON docs.kategori_id = kategori.id
            WHERE kategori.user_id = $_GET[user_id] AND kategori.divisi_id IS NULL";
  } else {
    $sql = "SELECT docs.*, kategori.nama AS nama_kat, kategori.divisi_id
            FROM docs INNER JOIN kategori ON docs.kategori_id = kategori.id
            WHERE kategori.user_id = $_GET[user_id] AND kategori.id = $_GET[kat_id]";
  }
$hasil = mysqli_query($koneksi, $sql);

$sql3 = "SELECT * FROM kategori WHERE divisi_id = $_SESSION[divisi_id]";
$hasil3 = mysqli_query($koneksi, $sql3);
$sql4 = "SELECT * FROM kategori WHERE divisi_id IS NULL AND user_id = $_SESSION[user_id]";
$hasil4 = mysqli_query($koneksi, $sql4);
?>
<div class="row">
<?php if((isset($_SESSION['admin']) && $_SESSION['admin'] == 1) || (isset($_SESSION['leader']) && $_SESSION['leader'] == 1)) { ?>
  <div class="col-md-3">
    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Division Category</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="index.php?page=docs"><i class="fa fa-folder-o text-primary"></i> All Category</a></li>
          <?php while($row3 = mysqli_fetch_assoc($hasil3)) { ?>
          <li><a href="index.php?page=docs&kat_id=<?php echo $row3['id']; ?>"><i class="fa fa-folder-o text-primary"></i> <?php echo $row3['nama']; ?></a></li>
          <?php } ?>
          <li><a href="index.php?page=kat"><i class="fa fa-plus text-success"></i> <strong>Manage Category</strong></a></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Private Category</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="index.php?page=docs&user_id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-folder-o text-primary"></i> All Category</a></li>
          <?php while($row4 = mysqli_fetch_assoc($hasil4)) { ?>
          <li><a href="index.php?page=docs&kat_id=<?php echo $row4['id']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-folder-o text-primary"></i> <?php echo $row4['nama']; ?></a></li>
          <?php } ?>
          <li><a href="index.php?page=kat"><i class="fa fa-plus text-success"></i> <strong>Manage Category</strong></a></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>

  </div>
<?php } elseif (isset($_SESSION['leader']) && $_SESSION['leader'] == 0) { ?>
  <div class="col-md-3">

    <div class="box box-solid box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Division Category</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="index.php?page=docs"><i class="fa fa-folder-o text-primary"></i> All Category</a></li>
          <?php while($row3 = mysqli_fetch_assoc($hasil3)) { ?>
          <li><a href="index.php?page=docs&kat_id=<?php echo $row3['id']; ?>"><i class="fa fa-folder-o text-primary"></i> <?php echo $row3['nama']; ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>

    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-book"></i> Private Category</h3>
        <div class="box-tools">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="index.php?page=docs&user_id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-folder-o text-primary"></i> All Category</a></li>
          <?php while($row4 = mysqli_fetch_assoc($hasil4)) { ?>
          <li><a href="index.php?page=docs&kat_id=<?php echo $row4['id']; ?>&user_id=<?php echo $_SESSION['user_id']; ?>"><i class="fa fa-folder-o text-primary"></i> <?php echo $row4['nama']; ?></a></li>
          <?php } ?>
          <li><a href="index.php?page=kat"><i class="fa fa-plus text-success"></i> <strong>Manage Category</strong></a></li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>

  </div>
<?php } ?>
<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-header">
      <a class="btn btn-primary" href="index.php?in=add&page=add_docs">Add Document</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No. </th>
            <th>Title</th>
            <th>File</th>
            <th>Description</th>
            <th>Date</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; while($row = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['judul']; ?></td>
              <td><a href="<?php echo $row['file']; ?>"><i class="fa fa-file-o" style="font-size:36px; color: black;"></i></a></td>
              <td><?php echo wordwrap($row['deskripsi'],20,"<br>",true); ?></td>
              <td><?php echo $row['tanggal']; ?></td>
              <td><?php echo $row['nama_kat']; ?></td>
              <td>
                <a class="btn btn-warning" href="index.php?in=edit&page=edit_docs&id=<?php echo $row['id'];?><?php echo (!empty($row['divisi_id'])) ? "&p=" : "" ?><?php echo $row['divisi_id']; ?>"><i class="fa fa-edit"></i> Update</a>
                <a class="btn btn-danger" href="pages/process/process_del_docs.php?id=<?php echo $row['id'];?>"><i class="fa fa-trash"></i> Delete</a>
              </td>
            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->