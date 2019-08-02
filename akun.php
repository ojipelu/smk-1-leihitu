<?php
must_login();
?>
<script>
$(function(){
    document.title = 'Edit Akun';
    $('#fakun').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            id_akun: {
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
            Edit Akun
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
                
                    $a = mysql_query("select * from member where id_member='$_SESSION[mbr]'");
                    $b = mysql_fetch_array($a);
                
                ?>
                <form action="akun_proses.php" method="post" id="fakun" class="form-horizontal"> 
                <input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
                <input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_member']:''; ?>" />
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Id Member</label>
                                <div class="col-lg-5">
                                    <input type="text" name="id_member" class="form-control" value="<?php echo isset($b)?$b['id_member']:''; ?>" readonly maxlength="50" />
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
                                    <input type="text" name="nis" class="form-control" value="<?php echo isset($b)?$b['nis']:''; ?>" readonly maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Jenis Kelamin</label>
                                <div class="col-lg-5">
                                    <select name="jenis_kelamin" class="form-control" disabled>
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
                                    <a href="?h=akun"><input type="button" value="Batal" class="btn btn-default" /></a>
                                </div>
                            </div>
                </form>
                
              </div>          
        </section><!-- /.content -->