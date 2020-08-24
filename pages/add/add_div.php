<?php
  $sql = "SELECT user.*, divisi.nama AS nama_div 
          FROM user JOIN divisi ON user.divisi_id = divisi.id
          WHERE user.id = $_SESSION[user_id]";
  $hasil = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_assoc($hasil);
  
  $sql2 = "SELECT divisi.*,  user.id AS usr, user.nama AS user 
           FROM divisi RIGHT JOIN user  ON divisi.user_id = user.id
           WHERE user_id IS NULL";
  $hasil2 = mysqli_query($koneksi, $sql2); 
?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Form Input</h3>
      </div>
      <div class="box-body">
        <form action="pages/process/process_add_div.php" method="post">
          <label>Please input your divison information : </label>
          <br /><br />
          <div class="form-group">
            <label>Divison Name : </label>
            <input type="text" class="form-control" Placeholder="Divison Name" name="nama">
          </div>
          <div class="form-group" id="leader">
            <label>Leader : </label>
            <select name="user" class="form-control">
              <option value="">Pilih Leader</option>
              <?php while($row2 = mysqli_fetch_assoc($hasil2)) { ?>
              <option value="<?php echo $row2['usr']; ?>"><?php echo $row2['user']; ?></option>
              <?php } ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Create Divison</button>
          <button type="button" id="btn-leader" class="btn btn-primary">Add Leader</button>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col (right) -->
</div>
<!-- /.row -->