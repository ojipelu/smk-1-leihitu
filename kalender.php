<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Kalender Akademik</h3>
  </div>
  <div class="box-body">
    <table class="table table-bordered" width="100%">
      <tr>
        <th>Tanggal</th>
        <th>Kegiatan</th>
      </tr>
    <?php
    $a = mysqli_query($con, "select * from kalender_akademik order by tgl_awal asc, tgl_akhir asc");
    while($b = mysqli_fetch_array($a)){
    ?>
      <tr>
        <td><?php echo date('d/m/Y', strtotime($b['tgl_awal'])).' s/d '.date('d/m/Y', strtotime($b['tgl_akhir'])); ?></td>
        <td><?php echo $b['keterangan']; ?></td>
      </tr>                
    <?php } ?>        
    </table>
  </div>
</div>