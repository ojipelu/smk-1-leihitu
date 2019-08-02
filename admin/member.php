<script>
$(function(){
	document.title = 'Member / Siswa';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fmember').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			id_member: {
                validators: {
                    notEmpty: {
                        message: 'Id Member harus diisi'
                    },
                }
            },
            nama_member: {
                validators: {
                    notEmpty: {
                        message: 'Nama Member harus diisi'
                    },
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username harus diisi'
                    },
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password harus diisi'
                    },
                }
            },
            nis: {
                validators: {
                    notEmpty: {
                        message: 'NIS harus diisi'
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
            Member / Siswa
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
                    $a = mysqli_query($con, "select * from member where id_member='$_GET[id]'");
                    $b = mysqli_fetch_array($a);
                }
                ?>
				<form action="member_proses.php" method="post" id="fmember" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_member']:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Id Member</label>
                                <div class="col-lg-5">
									<input type="text" name="id_member" class="form-control" value="<?php echo isset($b)?$b['id_member']:''; ?>" maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Member</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama_member" class="form-control" value="<?php echo isset($b)?$b['nama_member']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Username</label>
                                <div class="col-lg-5">
                                    <input type="text" name="username" class="form-control" value="<?php echo isset($b)?$b['user_name']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Password</label>
                                <div class="col-lg-5">
                                    <input type="password" name="password" class="form-control" value="<?php echo isset($b)?$b['password']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">NIS</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nis" class="form-control" value="<?php echo isset($b)?$b['nis']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-lg-3 control-label">Agama</label>
                                <div class="col-lg-5">
                                    <select name="agama" class="form-control">
                                        <option value="Islam" <?php echo isset($b)&&$b['agama']=='Islam'?'selected':''; ?>>Islam</option>
                                        <option value="Kristen" <?php echo isset($b)&&$b['agama']=='Kristen'?'selected':''; ?>>Kristen</option>
                                        <option value="Katolik" <?php echo isset($b)&&$b['agama']=='Katolik'?'selected':''; ?>>Katolik</option>
                                        <option value="Hindu" <?php echo isset($b)&&$b['agama']=='Hindu'?'selected':''; ?>>Hindu</option>
                                        <option value="Budha" <?php echo isset($b)&&$b['agama']=='Budha'?'selected':''; ?>>Budha</option>
                                        <option value="Konghucu" <?php echo isset($b)&&$b['agama']=='Konghucu'?'selected':''; ?>>Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jenis Kelamin</label>
                                <div class="col-lg-5">
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="L" <?php echo isset($b)&&$b['jenis_kelamin']=='L'?'selected':''; ?>>laki - laki</option>
                                        <option value="P" <?php echo isset($b)&&$b['jenis_kelamin']=='P'?'selected':''; ?>>perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Alamat</label>
                                <div class="col-lg-5">
                                    <input type="text" name="alamat" class="form-control" value="<?php echo isset($b)?$b['alamat']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            

							<div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=member"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Member</th>
                            <th>Nama Member</th>
                            <th>Username</th>
                            <th>NIS</th>
                            <th>Agama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = mysqli_query($con, "select * from member order by id_member desc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_member']; ?></td>
                            <td><?php echo $y['nama_member']; ?></td>
                            <td><?php echo $y['user_name']; ?></td>
                            <td><?php echo $y['nis']; ?></td>
                            <td><?php echo $y['agama']; ?></td>
                            <td><?php echo $y['jenis_kelamin']; ?></td>
                            <td><?php echo $y['alamat']; ?></td>
                            <td align="center">
                            	<a href="?h=member&id=<?php echo $y['id_member']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="member_proses.php?id=<?php echo $y['id_member']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->