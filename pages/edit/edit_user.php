<?php
  $sql = "SELECT user.*, divisi.nama AS nama_div 
          FROM user JOIN divisi ON user.divisi_id = divisi.id
          WHERE user.id = $_SESSION[user_id]";
  $hasil = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_assoc($hasil);

  $sql2 = "SELECT * FROM user WHERE id = $_GET[id]";
  $hasil2 = mysqli_query($koneksi, $sql2);
  $row2 = mysqli_fetch_assoc($hasil2);

  $sql3 = "SELECT * FROM divisi";
  $hasil3 = mysqli_query($koneksi, $sql3);
?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Form Input</h3>
      </div>
      <div class="box-body">
        <form action="pages/process/process_edit_user.php" method="post" enctype="multipart/form-data">
          <label>Please input user information : </label>
          <br /><br />
          <?php
          if(isset($_GET['sukses']) && $_GET['sukses'] == "pass") {
            echo "<p class='text-success'><b>Your password has been updated</b></p><br />";
          } ?>
          <div class="form-group">
            <label>Name : </label>
            <input type="text" class="form-control" value="<?php echo $row2['nama']; ?>" name="nama">
          </div>
          <div class="form-group">
            <label>Email : </label>
            <input type="email" class="form-control" value="<?php echo $row2['email']; ?>" name="email">
          </div>
          <div class="form-group">
            <label>Division : </label>
            <select name="divisi" class="form-control">
              <?php while($row3 = mysqli_fetch_assoc($hasil3)) { ?>
              <option <?php echo ($row3['id'] == $row2['divisi_id'] ? 'selected' : ''); ?> value="<?php echo $row3['id']; ?>"><?php echo $row3['nama']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <p class="text-danger"><strong>*Maximum size is 2 MB</strong></p>
            <p class="text-danger"><strong>*File extenction allowed (*.jpg, *.jpeg, *.png, *.gif)</strong></p>
            <label>Photo : </label>
            <input type="file" name="foto">
          </div>
          <button type="submit" class="btn btn-warning">Update User</button>
          <a href="index.php?in=edit&page=edit_pass&id=<?php echo $row2['id']; ?>" class="btn btn-warning">Update Password</a>
          <input type="hidden" name="id" value="<?php echo $row2['id']; ?>" />
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col (right) -->
</div>
<!-- /.row -->