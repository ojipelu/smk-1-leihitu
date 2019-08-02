<script>
$(function(){
    $("#tgl_awal").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });
    $("#tgl_akhir").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });
	document.title = 'Kalender akademik';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fkalender').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			id_kalender: {
                validators: {
                    notEmpty: {
                        message: 'Id Kalender harus diisi'
                    },
                }
            },
            tgl_awal: {
                validators: {
                    notEmpty: {
                        message: 'Tgl Awal harus diisi'
                    },
                }
            },
            tgl_akhir: {
                validators: {
                    notEmpty: {
                        message: 'Tgl Akhir harus diisi'
                    },
                }
            },
            keterangan: {
                validators: {
                    notEmpty: {
                        message: 'Keterangan harus diisi'
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
            Kalender akademik
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
                    $a = mysqli_query($con, "select * from kalender_akademik where id_kalender='$_GET[id]'");
                    $b = mysqli_fetch_array($a);
                }
                ?>
				<form action="kalender_proses.php" method="post" id="fkalender" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_kalender']:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Id Kalender</label>
                                <div class="col-lg-5">
									<input type="text" name="id_kalender" class="form-control" value="<?php echo isset($b)?$b['id_kalender']:''; ?>" maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tgl Awal</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tgl_awal" id="tgl_awal" class="form-control" value="<?php echo isset($b)?date('d/m/Y', strtotime($b['tgl_awal'])):''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tgl Akhir</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control" value="<?php echo isset($b)?date('d/m/Y', strtotime($b['tgl_akhir'])):''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Keterangan</label>
                                <div class="col-lg-5">
                                    <textarea name="keterangan" class="form-control"><?php echo isset($b)?$b['keterangan']:''; ?></textarea>
                                </div>
                            </div>

							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=agenda"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Kalender</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = mysqli_query($con,"select * from kalender_akademik order by id_kalender desc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_kalender']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($y['tgl_awal'])); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($y['tgl_akhir'])); ?></td>
                            <td><?php echo $y['keterangan']; ?></td>
                            <td align="center">
                            	<a href="?h=kalender&id=<?php echo $y['id_kalender']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="kalender_proses.php?id=<?php echo $y['id_kalender']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->