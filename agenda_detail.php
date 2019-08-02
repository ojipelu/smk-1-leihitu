<?php
$a = mysqli_query($con,"select * from agenda k join admin a on k.id_pemosting=a.id_admin where id_agenda='$_GET[id]'");
$b = mysqli_fetch_array($a);
?>
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $b['nama_agenda']; ?></h3>
  </div>
  <div class="box-body">
    <span style="color:red;font-size: 9px;"><?php echo date('d/m/Y', strtotime($b['tgl_agenda'])); ?></span><br />
    <?php echo $b['isi']; ?><br />
    <div style="clear: both;">&nbsp;</div>
    <span style="color: blue;font-size: 9px;">diposting oleh : <?php echo $b['nama_admin']; ?></span>
  </div>
</div>