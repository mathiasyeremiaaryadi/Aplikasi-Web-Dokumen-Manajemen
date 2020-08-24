<div class="row">
  <div class="col-xs-4">
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo $row['foto']; ?>" alt="User profile picture">

          <h3 class="profile-username text-center"><?php echo $row['nama']; ?></h3>

          <p class="text-muted text-center"><?php echo $row['divisi']; ?></p>

          <form action="pages/process/process_edit_gambar.php" method="post" enctype="multipart/form-data">
            <h3>Ubah Gambar</h3>
            <?php
            if(isset($_GET['error']) && $_GET['error'] == 'gagal') {
              echo "<p class='text-danger text-center'><strong>*You failed to update your photo because the size is to big or your photo file extenction did not compatible or no file uploaded, please try again</strong></p>";
            } ?>
            <hr>
            <div class="form-group">
              <input type="file" name="foto" class="btn-block">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            </div>
            <div class="form-group">
              <button type="sumbit" name="kirim" class="btn btn-primary btn-block">Ubah Gambar</button>
            </div>
          </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->

  <div class="col-xs-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Ubah Profile</h3>
      </div>
      <div class="box-body">
        <form class="form-horizontal" method="post" action="pages/process/process_edit_profile.php">
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Nama</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" placeholder="Nama" name="nama">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
            </div>
          </div>
          <div class="form-group">
            <label for="pass" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
              <input type="Password" class="form-control" id="pass" placeholder="Password" name="pass">
            </div>
          </div>
          <input type="hidden" name="kirim" value="<?php echo $row['id']; ?>">
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-info">Ubah</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
<!-- /.row -->