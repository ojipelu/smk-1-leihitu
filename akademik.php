<?php
must_login();
?>
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Akademik</h3>
  </div>
  <div class="box-body">
    <?php
      $a = mysqli_query($con,"select * from akademik a join guru g on a.id_guru=g.id_guru order by tgl_posting desc");
      while($b = mysqli_fetch_array($a)){
      ?>
      <div id="isi" align="justify" style="margin-top: 10px;">
      
        <b><?php echo $b['nama_akademik']; ?></b><br />
        <span style="color: green;font-size: 9px;"><?php echo $b['nama_guru']; ?></span> | <span style="color: blue;font-size: 9px;"><?php echo $b['kategori']; ?></span> | <span style="color:red;font-size: 9px;"><?php echo date('d/m/Y', strtotime($b['tgl_posting'])); ?></span><br />
        <?php echo $b['isi']; ?><br />
        <div style="clear: both;">&nbsp;</div>
        <a href="?h=akademik_detail&id=<?php echo $b['id_akademik']; ?>">lihat detail &gt;</a>
      
      </div>
      <?php } ?>  
  </div>
</div>