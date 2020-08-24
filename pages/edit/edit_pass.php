<?php
	$sql = "SELECT user.*, divisi.nama AS nama_div 
  			  FROM user JOIN divisi ON user.divisi_id = divisi.id
  			  WHERE user.id = $_SESSION[user_id]";
	$hasil = mysqli_query($koneksi, $sql);
	$row = mysqli_fetch_assoc($hasil);

	$sql2 = "SELECT * FROM user WHERE id = $_GET[id]";
	$hasil2 = mysqli_query($koneksi, $sql2);
	$row2 = mysqli_fetch_assoc($hasil2);
?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Form Input</h3>
      </div>
      <div class="box-body">
        <form action="pages/process/process_password.php" method="post">
          <label>Please input the new password : </label>
          <br /><br />
          <?php
          if(isset($_GET['gagal']) && $_GET['gagal'] == "salah"){
            echo "<p class='text-danger'><b>You failed to update your password because the old password did not match, please try again</b></p><br />";
          }else if(isset($_GET['gagal']) && $_GET['gagal'] == "user"){
            echo "<p class='text-danger'><b>You failed to update your password because your email has not been registered yet, please contact admin to register your email</b></p><br />";
          }
          ?>
          <div class="form-group">
            <label>Old Password : </label>
            <input type="password" class="form-control" Placeholder="Old Password" name="lama">
          </div>
          <div class="form-group">
            <label>New Password : </label>
            <input type="password" class="form-control" Placeholder="New Password" name="baru">
          </div>
          <button type="submit" class="btn btn-warning">Update Password</button>
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