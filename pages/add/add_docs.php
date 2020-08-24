<?php  
  $sql = "SELECT * FROM kategori WHERE user_id = $_SESSION[user_id] AND divisi_id IS NULL";
  $hasil = mysqli_query($koneksi, $sql);
  
  $sql2 = "SELECT * FROM kategori WHERE divisi_id = $_SESSION[divisi_id]";
  $hasil2 = mysqli_query($koneksi, $sql2);
?>
<div class="row">
  <div class="col-md-8">
    <?php
    if(isset($_GET['error']) && $_GET['error'] == 'gagal') {
    echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h4><i class='icon fa fa-ban'></i> Failed!</h4> *You fail to upload a file, please reupload smaller or allowed extention file
          </div>";
    } ?>
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Division</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Private</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <div class="box-header">
            <h3 class="box-title">Division Document</h3>
          </div>
          <div class="box-body">
            <p>Please input your document information :</p> 
            <form action="pages/process/process_add_docs.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Title : </label>
                <input type="text" class="form-control" Placeholder="Document Title" name="judul">
              </div>
              <div class="form-group">
                <label>Document File : </label>
                <p class="text-danger"><strong>*Maximum size is 10 MB</strong></p>
                <p class="text-danger"><strong>*File extention allowed (*.docx, *.doc, *.pdf, *.rtf, *.dotm, *.txt, *.dotx, *.pptx)</strong></p>
                <input type="file" name="file">
              </div>
              <div class="form-group">
                <label>Description : </label>
                <textarea rows="6" class="form-control" Placeholder="Document Description" name="deskripsi"></textarea>
              </div>
              <div class="form-group">
                <label>Category : </label>
                <div class="input-group">
                  <select name="kategori" class="form-control">
                    <option>Pilih Kategori</option>
                    <?php while($row2 = mysqli_fetch_assoc($hasil2)) { ?>
                    <option value="<?php echo $row2['id']; ?>"><?php echo $row2['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <input type="hidden" name="divisi" value="<?php echo $_SESSION['divisi_id']; ?>">
              <button type="submit" class="btn btn-primary">Create Document</button>
              <a href="index.php?page=docs" class="btn btn-success">Kembali</a>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">

          <div class="box-header">
            <h3 class="box-title">Private Document</h3>
          </div>
          <div class="box-body">
            <p>Please input your document information :</p> 
            <form action="pages/process/process_add_docs.php" method="post" enctype="multipart/form-data">
              <?php
              if(isset($_GET['error']) && $_GET['error'] == 'gagal') {
                echo "<p class='text-danger'><strong>*You fail to create document, please upload a file</strong></p>";
              } ?>
              <div class="form-group">
                <label>Title : </label>
                <input type="text" class="form-control" Placeholder="Document Title" name="judul">
              </div>
              <div class="form-group">
                <label>Document File : </label>
                <p class="text-danger"><strong>*Maximum size is 10 MB</strong></p>
                <p class="text-danger"><strong>*File extention allowed (*.docx, *.doc, *.pdf, *.rtf, *.dotm, *.txt, *.dotx, *.pptx)</strong></p>
                <input type="file" name="file">
              </div>
              <div class="form-group">
                <label>Description : </label>
                <textarea rows="6" class="form-control" Placeholder="Document Description" name="deskripsi"></textarea>
              </div>
              <div class="form-group">
                <label>Category : </label>
                <div class="input-group">
                  <select name="kategori" class="form-control">
                    <option>Pilih Kategori</option>
                    <?php while($row = mysqli_fetch_assoc($hasil)) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <input type="hidden" name="divisi" value="NULL">
              <button type="submit" class="btn btn-primary">Create Document</button>
              <a href="index.php?page=docs" class="btn btn-success">Kembali</a>
            </form>
          </div>
          <!-- /.box-body -->

        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
  <!-- /.col (right) -->
</div>
<!-- /.row -->