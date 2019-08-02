<script>
$(function(){
	document.title = 'Guru';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fguru').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			id_guru: {
                validators: {
                    notEmpty: {
                        message: 'Id Guru harus diisi'
                    },
                }
            },
            nama_guru: {
                validators: {
                    notEmpty: {
                        message: 'Nama Guru harus diisi'
                    },
                }
            },
            nik: {
                validators: {
                    notEmpty: {
                        message: 'NIK harus diisi'
                    },
                }
            },
            alamat: {
                validators: {
                    notEmpty: {
                        message: 'Alamat harus diisi'
                    },
                }
            },
             email: {
                validators: {
                    notEmpty: {
                        message: 'Email harus diisi'
                    },
                }
            },
            bidang_studi: {
                validators: {
                    notEmpty: {
                        message: 'Bidang Studi harus diisi'
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
            Guru
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
                    $a = mysqli_query($con, "select * from guru where id_guru='$_GET[id]'");
                    $b = mysqli_fetch_array($a);
                }
                ?>
				<form action="guru_proses.php" method="post" id="fguru" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_guru']:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Id Guru</label>
                                <div class="col-lg-5">
									<input type="text" name="id_guru" class="form-control" value="<?php echo isset($b)?$b['id_guru']:''; ?>" maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Guru</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama_guru" class="form-control" value="<?php echo isset($b)?$b['nama_guru']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">NIK</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nik" class="form-control" value="<?php echo isset($b)?$b['nip']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Alamat</label>
                                <div class="col-lg-5">
                                    <input type="text" name="alamat" class="form-control" value="<?php echo isset($b)?$b['alamat']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Bidang Studi</label>
                                <div class="col-lg-5">
                                    <input type="text" name="bidang_studi" class="form-control" value="<?php echo isset($b)?$b['bidang_studi']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">E-mail</label>
                                <div class="col-lg-5">
                                    <input type="text" name="email" class="form-control" value="<?php echo isset($b)?$b['email']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Riwayat Pendidikan</label>
                                <div class="col-lg-5">
                                    <textarea name="riwayat_pendidikan" class="form-control" ><?php echo isset($b)?$b['riwayat_pendidikan']:''; ?>
                                    </textarea>
                                </div>
                            </div>
                            

							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=guru"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Guru</th>
                            <th>Nama Guru</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Bidang Studi</th>
                            <th>E-mail</th>
                            <th>Riwayat Pendidikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = mysqli_query($con, "select * from guru order by id_guru asc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_guru']; ?></td>
                            <td><?php echo $y['nama_guru']; ?></td>
                            <td><?php echo $y['nip']; ?></td>
                            <td><?php echo $y['alamat']; ?></td>
                            <td><?php echo $y['bidang_studi']; ?></td>
                            <td><?php echo $y['email']; ?></td>
                            <td><?php echo $y['riwayat_pendidikan']; ?></td>
                            <td align="center">
                            	<a href="?h=guru&id=<?php echo $y['id_guru']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="guru_proses.php?id=<?php echo $y['id_guru']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->