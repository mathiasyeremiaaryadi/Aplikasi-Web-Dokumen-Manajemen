<?php
$sql = "SELECT kategori.id, kategori.nama, kategori.user_id, divisi_id
        FROM kategori WHERE user_id = $_SESSION[user_id]";
$hasil = mysqli_query($koneksi, $sql);
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <a class="btn btn-primary" href="index.php?in=add&page=add_kat">Create Category</a>
        <a class="btn btn-success" href="index.php?page=docs">Back to Document List</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No. </th>
              <th>Category Name</th>
              <th>Shared</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; while($row = mysqli_fetch_assoc($hasil)) { ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td><?php echo is_null($row['divisi_id']) ? "No" : "Yes" ?></td>
              <td>
                <a class="btn btn-warning" href="index.php?in=edit&page=edit_kat&id=<?php echo $row['id'];?>">Update</a>
                <a class="btn btn-danger" href="pages/process/process_del_kat.php?id=<?php echo $row['id'];?>">Delete</a>
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