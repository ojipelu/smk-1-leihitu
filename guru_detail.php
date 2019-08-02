<?php
$a = mysqli_query($con, "select * from guru where id_guru='$_GET[id]'");
$b = mysqli_fetch_array($a);
?>
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"><b><?php echo $b['nama_guru']; ?></b></h3>
  </div>
  <div class="box-body">
    <table>
      <tr>
        <td>Nama</td>
        <td>: <?php echo $b['nama_guru']; ?></td>
      </tr>
      <tr>
        <td>NIK</td>
        <td>: <?php echo $b['nip']; ?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>: <?php echo $b['email']; ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>: <?php echo $b['alamat']; ?></td>
      </tr>
      <tr>
        <td>Riwayat Pendidikan</td>
        <td>: <?php echo $b['riwayat_pendidikan']; ?></td>
      </tr>
      <tr>
        <td>Guru Bidang Studi</td>
        <td>: <?php echo $b['bidang_studi']; ?></td>
      </tr>
    </table>
  </div>
</div>