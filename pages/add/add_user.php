<!-- add_user.php -->
<?php
  $sql = "SELECT user.*, divisi.nama AS nama_div 
          FROM user JOIN divisi ON user.divisi_id = divisi.id
          WHERE user.id = $_SESSION[user_id]";
  $hasil = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_assoc($hasil);
  
  $sql2 = "SELECT * FROM divisi";
  $hasil2 = mysqli_query($koneksi, $sql2);
?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Form Input</h3>
      </div>
      <div class="box-body">
        <form action="pages/process/process_add_user.php" method="post" enctype="multipart/form-data">
          <label>Please input user information : </label>
          <br /><br />
          <div class="form-group">
            <label>Name : </label>
            <input type="text" class="form-control" Placeholder="User Name" name="nama">
          </div>
          <div class="form-group">
            <label>Email : </label>
            <input type="email" class="form-control" Placeholder="Email" name="email">
          </div>
          <div class="form-group">
            <label>Password : </label>
            <input type="password" class="form-control" Placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <label>Division : </label>
            <select name="divisi" class="form-control">
              <option>Pilih Divisi</option>
              <?php while($row2 = mysqli_fetch_assoc($hasil2)) { ?>
                <option value="<?php echo $row2['id']; ?>"><?php echo $row2['nama']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Photo : </label>
            <input type="file" name="foto">
          </div>
          <button type="submit" class="btn btn-primary">Create User</button>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<!-- /.col (right) -->