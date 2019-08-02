<?php
must_login();
?>
<?php
$a = mysqli_query($con, "select * from akademik a join guru g on a.id_guru=g.id_guru where id_akademik='$_GET[id]'");
$b = mysqli_fetch_array($a);
?>
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $b['nama_akademik']; ?></h3>
  </div>
  <div class="box-body">
    <span style="color: blue;font-size: 9px;"><?php echo $b['kategori']; ?></span> | <span style="color:red;font-size: 9px;"><?php echo date('d/m/Y', strtotime($b['tgl_posting'])); ?></span><br />
    <?php echo $b['isi']; ?><br />
    <?php echo isset($b)&&$b['file_materi']!=''?"<a href=\"akademik/".$b['file_materi']."\">download</a>":''; ?>
    <div style="clear: both;">&nbsp;</div>
    <span style="color: blue;font-size: 9px;">diposting oleh guru : <?php echo $b['nama_guru']; ?></span>
  </div>
</div>