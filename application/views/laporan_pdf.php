<!DOCTYPE html>
<html><head>
<title></title>
</head><body>     

      <?php
      foreach ($all->result_array() as $d)
      {
      ?>

      <div>Nis : <?php echo $d['nis']; ?></div>
      <div>Nama Lengkap : <?php echo $d['nama_lengkap']; ?></div>
      <div>Kelas : <?php echo $d['kelas']; ?></div>

      <table  width="100%" border="1" style="border-collapse:collapse" cellspacing="2" cellpadding="2" class="table table-striped table-bordered table-hover">
            <tr>
                  <th>mapel</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th>KKM</th>
                  <th>Nilai Raport</th>
            </tr>

            <tr>
                  <td align="center"><?php echo $d['mapel']; ?></td>
                  <td align="center"><?php echo $d['uts']; ?></td>
                  <td align="center"><?php echo $d['uas']; ?></td>
                  <td align="center"><?php echo $d['kkm']; ?></td>
                  <td align="center"><?php echo $d['n_raport']; ?></td>
            </tr>
      </table>

      <?php
      }
      ?> 

</body></html>