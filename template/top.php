<!-- top.php -->
<?php
  $sql = "SELECT user.* FROM user
          JOIN divisi ON user.divisi_id = divisi.id
          WHERE user.id = $_SESSION[user_id]";
  $hasil = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_assoc($hasil);
  
  $sql2 = "SELECT * FROM user";
  $hasil2 = mysqli_query($koneksi, $sql2);
  $row2 = mysqli_num_rows($hasil2);
  
  $sql3 = "SELECT * FROM divisi";
  $hasil3 = mysqli_query($koneksi, $sql3);
  $row3 = mysqli_num_rows($hasil3);
  
  $sql4 = "SELECT kategori.id, kategori.nama, kategori.user_id
           FROM kategori
           WHERE user_id = $_SESSION[user_id] AND divisi_id IS NULL";
  $hasil4 = mysqli_query($koneksi, $sql4);
  $row4 = mysqli_num_rows($hasil4);
  
  $sql5 = "SELECT kategori.id, kategori.nama, kategori.divisi_id
           FROM kategori
           WHERE divisi_id = $_SESSION[divisi_id]";
  $hasil5 = mysqli_query($koneksi, $sql5);
  $row5 = mysqli_num_rows($hasil5);
  
  $sql6 = "SELECT *, kategori.nama AS nama_kat, kategori.user_id
           FROM docs INNER JOIN kategori ON kategori.id = docs.kategori_id
           WHERE kategori.user_id = $_SESSION[user_id] AND docs.divisi_id IS NULL";  
  $hasil6 = mysqli_query($koneksi, $sql6);
  $row6 = mysqli_num_rows($hasil6);
  
  $sql7 = "SELECT *, kategori.nama AS nama_kat, kategori.divisi_id
           FROM docs INNER JOIN kategori ON kategori.id = docs.kategori_id
           WHERE kategori.divisi_id = $_SESSION[divisi_id]";  
  $hasil7 = mysqli_query($koneksi, $sql7);
  $row7 = mysqli_num_rows($hasil7);
  
  $sql8 = "SELECT user.id, user.nama, user.divisi_id, docs.judul, docs.tanggal
           FROM user JOIN docs ON docs.user_id = user.id
           WHERE user.divisi_id = $_SESSION[divisi_id]";
  $hasil8 = mysqli_query($koneksi, $sql8);
  
  $sql9 = "SELECT docs.id, docs.tanggal, docs.user_id, user.nama
           FROM docs JOIN user ON docs.user_id = user.id";
  $hasil9 = mysqli_query($koneksi, $sql9);
  $row9 = mysqli_num_rows($hasil9);
  if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
?>
  <div class="col-lg-2 col-xs-6">

    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $row2; ?></h3>
        <p>Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="index.php?page=user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-2 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $row3; ?></h3>
        <p>Division</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-people"></i>
      </div>
      <a href="index.php?page=div" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>


  <div class="col-lg-2 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $row4; ?></h3>
        <p>Priv. Categories</p>
      </div>
      <div class="icon">
        <i class="ion ion-bookmark"></i>
      </div>
      <a href="index.php?page=kat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-2 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $row5; ?></h3>
        <p>Div. Categories</p>
      </div>
      <div class="icon">
        <i class="ion ion-bookmark"></i>
      </div>
      <a href="index.php?page=kat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-2 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $row6; ?></h3>
        <p>Priv. Docs. Uploaded</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-paper"></i>
      </div>
      <a href="index.php?page=docs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-2 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $row7; ?></h3>
        <p>Div. Docs. Uploaded</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-paper"></i>
      </div>
      <a href="index.php?page=docs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <?php
}elseif(isset($_SESSION['leader']) && $_SESSION['leader'] == 1){
  ?>
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $row4; ?></h3>
        <p>Priv. Categories</p>
      </div>
      <div class="icon">
        <i class="ion ion-bookmark"></i>
      </div>
      <a href="index.php?page=kat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $row5; ?></h3>
        <p>Div. Categories</p>
      </div>
      <div class="icon">
        <i class="ion ion-bookmark"></i>
      </div>
      <a href="index.php?page=div_kat" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $row6; ?></h3>
        <p>Priv. Docs. Uploaded</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-paper"></i>
      </div>
      <a href="index.php?page=docs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $row7; ?></h3>
        <p>Div. Docs. Uploaded</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-paper"></i>
      </div>
      <a href="index.php?page=docs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <?php } elseif(isset($_SESSION['leader']) && $_SESSION['leader'] == 0){ ?>
  <div class="col-lg-6 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $row6; ?></h3>
        <p>Priv. Docs. Uploaded</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-paper"></i>
      </div>
      <a href="index.php?page=docs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-6 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $row7; ?></h3>
        <p>Div. Docs. Uploaded</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-paper"></i>
      </div>
      <a href="index.php?page=div_docs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
<?php } ?>

<div class="col-xs-12">
  <div class="box box-primary">
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-hover">
        <tbody>
          <?php $i = 1; while($row8 = mysqli_fetch_assoc($hasil8)) { ?>
            <tr>  
              <td><?php echo $i; ?></td>
              <td>You Uploaded document </td>
              <td><?php echo $row8['judul']; ?> <small class="btn btn-success pull-right">On <?php echo $row8['tanggal']; ?></small></td>
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