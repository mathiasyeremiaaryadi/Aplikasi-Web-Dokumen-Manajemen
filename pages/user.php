<?php
$sql = "SELECT user.id, user.nama, user.email, user.foto, user.divisi_id, divisi.nama AS nama_div
        FROM user LEFT JOIN divisi ON user.divisi_id = divisi.id";
$hasil = mysqli_query($koneksi, $sql);
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <a class="btn btn-primary" href="index.php?page=add_user&in=add">Create User</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No. </th>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>Division</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; while($row = mysqli_fetch_assoc($hasil)) { ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><img src="<?php echo $row['foto']; ?>" class="img-circle" width="45" height="45"></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['nama_div']; ?></td>
                <td>
                  <a class="btn btn-warning" href="index.php?in=edit&page=edit_user&id=<?php echo $row['id'];?>">Update</a>
                  <a class="btn btn-danger" href="pages/process/process_del_user.php?id=<?php echo $row['id'];?>">Delete</a>
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