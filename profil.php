<!-- <section class="content">
               
</section> 
 -->
 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Profile Sekolah</h3>
  </div>
  <div class="box-body">
    <?php
    $a = mysqli_query($con, "select * from profil_sekolah order by judul_profil asc");
    while($b = mysqli_fetch_array($a)){
    ?>
    <div id="isi" align="justify" style="margin-top: 10px;">
    
      <b><?php echo $b['judul_profil']; ?></b><br />
      <?php echo $b['isi_profil']; ?>
      <div style="clear: both;">&nbsp;</div>                
    </div>
    <?php } ?> 
  </div>
</div> 