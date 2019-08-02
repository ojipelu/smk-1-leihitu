<script>
$(function(){
    $("#tgl_lahir").datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
        todayHighlight: true
    });
    document.title = 'Akun';
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
            tempat_lahir: {
                validators: {
                    notEmpty: {
                        message: 'Tempat Lahir harus diisi'
                    },
                }
            },
            tgl_lahir: {
                validators: {
                    notEmpty: {
                        message: 'Tgl Lahir harus diisi'
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
            Akun
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
                $a = mysql_query("select * from guru where id_guru='$_SESSION[gru]'");
                $b = mysql_fetch_array($a);                
                ?>
                <form action="akun_proses.php" method="post" id="fguru" class="form-horizontal"> 
                <input type="hidden" name="aksi" value="<?php echo isset($b)?'edit':'tambah'; ?>" />
                <input type="hidden" name="kode_lama" value="<?php echo isset($b)?$b['id_guru']:''; ?>" />
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Id Guru</label>
                                <div class="col-lg-5">
                                    <input readonly type="text" name="id_guru" class="form-control" value="<?php echo isset($b)?$b['id_guru']:''; ?>" maxlength="50" />
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
                                    <input readonly type="text" name="nik" class="form-control" value="<?php echo isset($b)?$b['nip']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tempat Lahir</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo isset($b)?$b['tempat']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tgl Lahir</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?php echo isset($b)?date('d/m/Y', strtotime($b['tgl_lahir'])):''; ?>" maxlength="50" />
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
                                <label class="col-lg-3 control-label">Status</label>
                                <div class="col-lg-5">
                                    <select disabled name="status" class="form-control">
                                        <option value="pns" <?php echo isset($b)&&$b['status']=='pns'?'selected':''; ?>>PNS</option>
                                        <option value="honor" <?php echo isset($b)&&$b['status']=='honor'?'selected':''; ?>>HONOR</option>
                                    </select>
                                </div>
                            </div>
                            <div disabled class="form-group">
                                <label class="col-lg-3 control-label">Golongan</label>
                                <div class="col-lg-5">
                                    <input readonly type="text" name="golongan" class="form-control" value="<?php echo isset($b)?$b['golongan']:''; ?>" maxlength="50" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Prestasi</label>
                                <div class="col-lg-5">
                                    <textarea name="prestasi" class="form-control"><?php echo isset($b)?$b['prestasi']:''; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Riwayat Pendidikan</label>
                                <div class="col-lg-5">
                                    <textarea name="riwayat_pendidikan" class="form-control"><?php echo isset($b)?$b['riwayat_pendidikan']:''; ?></textarea>
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