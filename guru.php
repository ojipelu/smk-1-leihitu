<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">GURU SMK NEGERI 1 LEIHITU</h3>
  </div>
  <div class="box-body">
    <p>Berikut Data Guru Aktif di Smk Negeri 1 Leihitu </p>
    <table class="table table-bordered">
      <thead>
        <th>No.</th>
        <th>NIK</th>
        <th>Nama</th>
      </thead>
      <tbody>

        <?php
          $a = mysqli_query($con, "select * from guru order by nama_guru asc");
          $i = 1;
          while($b = mysqli_fetch_array($a)) {
        ?>
        <tr>
          <td><?php echo $i++;?></td>
          <td><?php echo $b['nip']; ?></td>
          <td><a href="?h=guru_detail&id=<?php echo $b['id_guru']; ?>"><?php echo $b['nama_guru']; ?></a></td>
        </tr>
    
        <?php } ?> 
        <!-- <tr>
          <td>1</td>
          <td>Ajip</td>
        </tr> -->
      </tbody>
    </table>   
  </div>
</div>
