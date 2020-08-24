<?php  
  $sql = "SELECT user.*, divisi.nama AS nama_div 
          FROM user JOIN divisi ON user.divisi_id = divisi.id
          WHERE user.id = $_SESSION[user_id]";
  $hasil = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_assoc($hasil);
  
  $sql2 = "SELECT * FROM divisi WHERE id = $_GET[id]";
  $hasil2 = mysqli_query($koneksi, $sql2);
  $row2 = mysqli_fetch_assoc($hasil2);
  
  $sql3 = "SELECT divisi.*, user.id AS usr, user.nama AS user 
           FROM divisi RIGHT JOIN user ON divisi.user_id = user.id
           WHERE user_id IS NULL  AND user.divisi_id = $_GET[id]";
  $hasil3 = mysqli_query($koneksi, $sql3);
?>
<div class="row">
  <div class="col-xs-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Your Division</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="pages/process/process_edit_div.php" method="post">
          <label>Please input your document information : </label>
          <br /><br />
          <div class="form-group">
            <label>Divison Name : </label>
            <input type="text" class="form-control" value="<?php echo $row2['nama']; ?>" name="nama">
          </div>
          <div class="form-group">
            <label>Leader : </label>
            <select name="user" class="form-control">
              <option value="">Pilih Leader</option>
              <?php while($row3 = mysqli_fetch_assoc($hasil3)) { ?>
                <option value="<?php echo $row3['usr']; ?>"><?php echo $row3['user']; ?></option>
              <?php } ?>
            </select>
          </div>
          <button type="submit" class="btn btn-warning">Update Division</button>
          <input type="hidden" name="id" value="<?php echo $row2['id']; ?>" />
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->