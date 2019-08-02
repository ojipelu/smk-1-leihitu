<script src="../templates/plugins/ckeditor/ckeditor.js"></script>
<script>
$(function(){
	document.title = 'Profil Sekolah';
    CKEDITOR.replace('teks_isi');
	$('#data').DataTable({
		"ordering": false
	});
	$('#fkegiatan').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			id_kegiatan: {
                validators: {
                    notEmpty: {
                        message: 'Id Kegiatan harus diisi'
                    },
                }
            },
            nama_kegiatan: {
                validators: {
                    notEmpty: {
                        message: 'Nama Kegiatan harus diisi'
                    },
                }
            },
            isi: {
                validators: {
                    notEmpty: {
                        message: 'Isi Kegiatan harus diisi'
                    },
                }
            },
            jenis: {
                validators: {
                    notEmpty: {
                        message: 'Jenis Kegiatan harus diisi'
                    },
                }
            },
            gambar: {
                validators: {
                    file: {
                        extension: 'jpg',
                        type: 'image/jpeg',
                        message: 'Gambar harus jpg'
                    },
                }
            },            
        }
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Data Kegiatan
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
                    $a = mysqli_query($con,"select * from kegiatan k join admin a on k.id_pemosting=a.id_admin where id_kegiatan='$_GET[id]'");
                    $b = mysqli_fetch_array($a);
                }
                ?>
				<form action="kegiatan_proses.php" method="post" id="fkegiatan" class="form-horizontal" enctype="multipart/form-data"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_kegiatan']:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Id Kegiatan</label>
                                <div class="col-lg-5">
									<input type="text" name="id_kegiatan" class="form-control" value="<?php echo isset($b)?$b['id_kegiatan']:''; ?>" maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Kegiatan</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo isset($b)?$b['nama_kegiatan']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jenis</label>
                                <div class="col-lg-5">
                                    <input type="text" name="jenis" class="form-control" value="<?php echo isset($b)?$b['jenis']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Gambar</label>
                                <div class="col-lg-5">
                                    <input type="file" class="form-control" name="gambar" />
                                    <?php echo isset($b)&&$b['gambar']!=''?"<img src=\"../kegiatan/".$b['gambar']."\" width=\"100\" height=\"100\" />":''; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tgl Postingan</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tgl_posting" readonly class="form-control" value="<?php echo isset($b)?date('d/m/Y H:i:s', strtotime($b['tgl_posting'])):date('d/m/Y H:i:s'); ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Pemosting</label>
                                <div class="col-lg-5">
                                    <input type="text" name="pemosting" readonly class="form-control" value="<?php echo $_SESSION['nm_adm']; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="box-body pad">
                                    <textarea name="isi" id="teks_isi"><?php echo isset($b)?$b['isi']:''; ?></textarea>
                                </div>
                            </div>

							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=kegiatan"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Kegiatan</th>
                            <th>Nama Kegiatan</th>
                            <th>Tgl Posting</th>
                            <th>Pemosting</th>
                            <th>Isi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = mysqli_query($con, "select * from kegiatan k join admin a on k.id_pemosting=a.id_admin order by id_kegiatan desc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_kegiatan']; ?></td>
                            <td><?php echo $y['nama_kegiatan']; ?></td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($y['tgl_posting'])); ?></td>
                            <td><?php echo $y['nama_admin']; ?></td>
                            <td><?php echo substr(strip_tags($y['isi']), 0, 100).'...'; ?></td>
                            <td align="center">
                            	<a href="?h=kegiatan&id=<?php echo $y['id_kegiatan']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="kegiatan_proses.php?id=<?php echo $y['id_kegiatan']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->