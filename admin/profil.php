<script src="../templates/plugins/ckeditor/ckeditor.js"></script>
<script>
$(function(){
	document.title = 'Profil Sekolah';
    CKEDITOR.replace('teks_isi');
	$('#data').DataTable({
		"ordering": false
	});
	$('#fprofil').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			id_profil: {
                validators: {
                    notEmpty: {
                        message: 'Id Profil harus diisi'
                    },
                }
            },
            judul_profil: {
                validators: {
                    notEmpty: {
                        message: 'Judul Profil harus diisi'
                    },
                }
            },
            isi: {
                validators: {
                    notEmpty: {
                        message: 'Isi Profil harus diisi'
                    },
                }
            }
        }
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Profil Sekolah
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
             <?php if(isset($_COOKIE['berhasil'])){ ?>
             <div class="box box-solid box-success" id="berhasil">
                <div class="box-header">
                  <h3 class="box-title" id="judul_berhasil">sukses</h3>
                </div>
                <div class="box-body" id="pesan_berhasil"><?php echo $_COOKIE['berhasil']; ?></div>
              </div>
            <?php } ?>
            <?php if(isset($_COOKIE['gagal'])){ ?>
              <div class="box box-solid box-danger" id="gagal">
                <div class="box-header">
                  <h3 class="box-title" id="judul_gagal">gagal</h3>
                </div>
                <div class="box-body" id="pesan_gagal"><?php echo $_COOKIE['gagal']; ?></div>
              </div>
            <?php } ?>
              <div id="isi">
                <?php
                if(isset($_GET['id'])){
                    $a = mysqli_query($con,"select * from profil_sekolah where id_profil='$_GET[id]'");
                    $b = mysqli_fetch_array($a);
                }
                ?>
				<form action="profil_proses.php" method="post" id="fprofil" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_profil']:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Id Profil</label>
                                <div class="col-lg-5">
									<input type="text" name="id_profil" class="form-control" value="<?php echo isset($b)?$b['id_profil']:''; ?>" maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Judul Profil</label>
                                <div class="col-lg-5">
                                    <input type="text" name="judul_profil" class="form-control" value="<?php echo isset($b)?$b['judul_profil']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="box-body pad">
                                    <textarea name="isi" id="teks_isi"><?php echo isset($b)?$b['isi_profil']:''; ?></textarea>
                                </div>
                            </div>

							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=profil"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Profil</th>
                            <th>Judul Profil</th>
                            <th>Isi Profil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = mysqli_query($con,"select * from profil_sekolah order by judul_profil asc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_profil']; ?></td>
                            <td><?php echo $y['judul_profil']; ?></td>
                            <td><?php echo substr(strip_tags($y['isi_profil']), 0, 100).'...'; ?></td>
                            <td align="center">
                            	<a href="?h=profil&id=<?php echo $y['id_profil']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="profil_proses.php?id=<?php echo $y['id_profil']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->