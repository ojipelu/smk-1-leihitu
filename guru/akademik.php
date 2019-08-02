<script>
$(function(){
	document.title = 'akademik';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fakademik').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			id_akademik: {
                validators: {
                    notEmpty: {
                        message: 'Id akademik harus diisi'
                    },
                }
            },
            nama_akademik: {
                validators: {
                    notEmpty: {
                        message: 'Nama akademik harus diisi'
                    },
                }
            },
            kategori: {
                validators: {
                    notEmpty: {
                        message: 'Kategori harus diisi'
                    },
                }
            },
            isi: {
                validators: {
                    notEmpty: {
                        message: 'Isi akademik harus diisi'
                    },
                }
            },
            guru: {
                validators: {
                    notEmpty: {
                        message: 'Guru harus dipilih'
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
            akademik
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
                    $a = mysqli_query($con,"select * from akademik a join guru g on a.id_guru=g.id_guru where id_akademik='$_GET[id]'");
                    $b = mysqli_fetch_array($con,$a);
                }
                ?>
				<form action="akademik_proses.php" method="post" id="fakademik" class="form-horizontal" enctype="multipart/form-data"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_akademik']:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Id akademik</label>
                                <div class="col-lg-5">
									<input type="text" name="id_akademik" class="form-control" value="<?php echo isset($b)?$b['id_akademik']:''; ?>" maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Guru</label>
                                <div class="col-lg-5">
                                    <input type="hidden" name="guru" value="<?php echo $_SESSION['gru']; ?>" />
                                    <input type="text" name="nama_guru" value="<?php echo $_SESSION['nm_gru']; ?>" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama akademik</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama_akademik" class="form-control" value="<?php echo isset($b)?$b['nama_akademik']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Kategori</label>
                                <div class="col-lg-5">
                                    <input type="text" name="kategori" class="form-control" value="<?php echo isset($b)?$b['nip']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Keterangan</label>
                                <div class="col-lg-5">
                                    <input type="text" name="keterangan" class="form-control" value="<?php echo isset($b)?$b['isi']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Upload Materi</label>
                                <div class="col-lg-5">
                                    <input type="file" name="file_materi" />
                                    <?php echo isset($b)&&$b['file_materi']!=''?"<a href=\"../akademik/".$b['file_materi']."\">download</a>":''; ?>
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=akademik"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id akademik</th>
                            <th>Nama akademik</th>
                            <th>Kategori</th>
                            <th>Ketarangan</th>
                            <th>Tgl Posting</th>
                            <th>Guru</th>
                            <th>File Materi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = mysqli_query($con,"select * from akademik a join guru g on a.id_guru=g.id_guru where a.id_guru='$_SESSION[gru]' order by tgl_posting desc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_akademik']; ?></td>
                            <td><?php echo $y['nama_akademik']; ?></td>
                            <td><?php echo $y['kategori']; ?></td>
                            <td><?php echo $y['isi']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($y['tgl_posting'])); ?>
                            <td><?php echo $y['nama_guru']; ?></td>
                            <td><?php echo $y['file_materi']!=''?"<a href=\"../akademik/".$y['file_materi']."\">download</a>":''; ?></td>
                            <td align="center">
                            	<a href="?h=akademik&id=<?php echo $y['id_akademik']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="akademik_proses.php?id=<?php echo $y['id_akademik']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->