<?php
  $sql2 = "SELECT user.*, divisi.nama AS nama_div 
           FROM user JOIN divisi ON user.divisi_id = divisi.id
           WHERE user.id = $_SESSION[user_id]";
  $hasil2 = mysqli_query($koneksi, $sql2);
  $row2 = mysqli_fetch_assoc($hasil2);
  
  $sql = "SELECT divisi.*, user.nama AS user
          FROM divisi LEFT JOIN user ON divisi.user_id = user.id";
  $hasil = mysqli_query($koneksi, $sql);
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <a class="btn btn-primary" href="index.php?in=add&page=add_div">Create Division</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No. </th>
              <th>Division Name</th>
              <th>Leader</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; while($row = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo $row['user']; ?></td>
              <td>
                <a class="btn btn-warning" href="index.php?page=edit_div&in=edit&id=<?php echo $row['id'];?>">Update</a>
                <a class="btn btn-danger" href="pages/process/process_del_div.php?id=<?php echo $row['id'];?>">Delete</a>
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
<!-- /.row -->