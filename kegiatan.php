<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Kegiatan</h3>
  </div>
  <div class="box-body">
    <?php
    $a = mysqli_query($con, "select * from kegiatan order by tgl_posting desc");
    while($b = mysqli_fetch_array($a)){
    ?>
    <div id="isi" align="justify" style="margin-top: 10px;">
    
      <b><?php echo $b['nama_kegiatan']; ?></b><br />
      <span style="color: blue;font-size: 9px;"><?php echo $b['jenis']; ?></span> | <span style="color:red;font-size: 9px;"><?php echo date('d/m/Y H:i:s', strtotime($b['tgl_posting'])); ?></span><br />
      <?php
      if($b['gambar']!=''){
      ?>
      <img style="margin-right: 5px;" src="kegiatan/<?php echo $b['gambar']; ?>" width="100" height="100" align="left" />
      <?php } ?>
      <?php echo substr(strip_tags($b['isi']), 0, 600).'.........'; ?><br />
      <div style="clear: both;">&nbsp;</div>
      <a href="?h=kegiatan_detail&id=<?php echo $b['id_kegiatan']; ?>">lihat detail &gt;</a>
    
    </div>
    <?php } ?>  
  </div>
</div>