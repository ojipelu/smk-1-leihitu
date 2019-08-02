<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Agenda</h3>
  </div>
  <div class="box-body">
    <?php
    $a = mysqli_query($con, "select * from agenda order by tgl_agenda desc");
    while($b = mysqli_fetch_array($a)){
    ?>
    <div id="isi" align="justify" style="margin-top: 10px;">
    
      <b><?php echo $b['nama_agenda']; ?></b><br />
      <span style="color:red;font-size: 9px;"><?php echo date('d/m/Y', strtotime($b['tgl_agenda'])); ?></span><br />
      <?php echo substr(strip_tags($b['isi']), 0, 600).'.........'; ?><br />
      <div style="clear: both;">&nbsp;</div>
      <a href="?h=agenda_detail&id=<?php echo $b['id_agenda']; ?>">lihat detail &gt;</a>
    
    </div>
    <?php } ?>   
  </div>
</div>