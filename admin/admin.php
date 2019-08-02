<script>
$(function(){
	document.title = 'Admin';
	$('#data').DataTable({
		"ordering": false
	});
	$('#fadmin').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			id_admin: {
                validators: {
                    notEmpty: {
                        message: 'Id Admin harus diisi'
                    },
                }
            },
            nama_admin: {
                validators: {
                    notEmpty: {
                        message: 'Nama Admin harus diisi'
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
            }
        }
    });
});
</script>
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 style="margin-top:30px;">
            Admin
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
                    $a = mysqli_query($con, "select * from admin where id_admin='$_GET[id]'");
                    $b = mysql_fetch_array($a);
                }
                ?>
				<form action="admin_proses.php" method="post" id="fadmin" class="form-horizontal"> 
				<input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
				<input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_admin']:''; ?>" />
							<div class="form-group">
                            	<label class="col-lg-3 control-label">Id Admin</label>
                                <div class="col-lg-5">
									<input type="text" name="id_admin" class="form-control" value="<?php echo isset($b)?$b['id_admin']:''; ?>" maxlength="50" />
							  	</div>
							</div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Admin</label>
                                <div class="col-lg-5">
                                    <input type="text" name="nama_admin" class="form-control" value="<?php echo isset($b)?$b['nama_admin']:''; ?>" maxlength="50" />
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
                                <div class="col-lg-9 col-lg-offset-3">
									<input type="submit" value="Simpan" class="btn btn-primary" />
									<a href="?h=admin"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
				</form>
                
                <table id="data" class="table table-bordered table-hover" cellspacing="0" width="100%">
                	<thead>
                        <tr>
                            <th>Id Admin</th>
                            <th>Nama Admin</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php 
                        $x = mysqli_query($con,"select * from admin order by id_admin desc");
                        while($y = mysqli_fetch_array($x)){
                        ?>
                        <tr>
                            <td><?php echo $y['id_admin']; ?></td>
                            <td><?php echo $y['nama_admin']; ?></td>
                            <td><?php echo $y['user_name']; ?></td>
                            <td>*****</td>
                            <td align="center">
                            	<a href="?h=admin&id=<?php echo $y['id_admin']; ?>" title="edit"><img src="../templates/images/edit.png" width="20" height="20" /></a>
                                <a href="admin_proses.php?id=<?php echo $y['id_admin']; ?>" title="hapus" onclick="return confirm('yakin menghapus?')"><img src="../templates/images/remove.png" width="20" height="20" /></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>          
        </section><!-- /.content -->