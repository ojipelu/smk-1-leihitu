<?php
$a = mysqli_query($con, "select * from kegiatan k join admin a on k.id_pemosting=a.id_admin where id_kegiatan='$_GET[id]' order by tgl_posting desc");
$b = mysqli_fetch_array($a);
?>
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $b['nama_kegiatan']; ?></h3>
  </div>
  <div class="box-body">
    <span style="color: blue;font-size: 9px;"><?php echo $b['jenis']; ?></span> | <span style="color:red;font-size: 9px;"><?php echo date('d/m/Y H:i:s', strtotime($b['tgl_posting'])); ?></span><br />
    <?php
    if($b['gambar']!=''){
    ?>
    <img src="kegiatan/<?php echo $b['gambar']; ?>" width="300" height="280" />
    <?php } ?>
    <?php echo $b['isi']; ?><br />
    <div style="clear: both;">&nbsp;</div>
    <span style="color: blue;font-size: 9px;">diposting oleh : <?php echo $b['nama_admin']; ?></span>
  </div>
</div>
        