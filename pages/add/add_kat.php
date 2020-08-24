<?php
  $sql = "SELECT user.*, divisi.nama AS nama_div 
          FROM user JOIN divisi ON user.divisi_id = divisi.id
          WHERE user.id = $_SESSION[user_id]";
  $hasil = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_assoc($hasil);
?>
<?php if((isset($_SESSION['admin']) && $_SESSION['admin'] == 1) || (isset($_SESSION['leader']) && $_SESSION['leader'] == 1)) { ?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Form Input</h3>
      </div>
      <div class="box-body">
        <form action="pages/process/process_add_kat.php" method="post">
          <label>Please input your category information : </label>
          <br /><br />
          <div class="form-group">
            <label>Category Name : </label>
            <input type="text" class="form-control" Placeholder="Category Name" name="nama">
          </div>
          <div class="form-group">
            <label><input type="radio" name="cat" value="NULL" required> Private Category</label><br>
            <label><input type="radio" name="cat" value="<?php echo $row['divisi_id']; ?>"> Division Category</label>
          </div>
          <button type="submit" class="btn btn-primary">Create Category</button>
          <a class="btn btn-success" href="index.php?page=kat">Kembali</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col (right) -->
</div>
<!-- /.row -->
<?php } elseif (isset($_SESSION['leader']) && $_SESSION['leader'] == 0) { ?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Form Input</h3>
      </div>
      <div class="box-body">
        <form action="pages/process/process_add_kat.php" method="post">
          <label>Please input your category information : </label>
          <br /><br />
          <div class="form-group">
            <label>Category Name : </label>
            <input type="text" class="form-control" Placeholder="Category Name" name="nama">
          </div>
          <input type="hidden" name="cat" value="NULL">
          <button type="submit" class="btn btn-primary">Create Category</button>
          <a class="btn btn-success" href="index.php?page=kat">Kembali</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col (right) -->
</div>
<!-- /.row -->
<?php } ?>