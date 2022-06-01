<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
  body{
    font-size: 10px;
    text-align: center;
  }
  #title{
    width: 100%;
    font-size: 20px;
    text-align: center;
    margin-bottom: 15px;
    margin:0 auto;
  }
  .left-desc{
    text-align: right;
    float: right;
  }
  #customers, #description {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
  }

  #description td{
    color: black;
  }

  #customers td, #customers th {
    border: 0;
    /*padding: 8px;*/
  }

  #customers td, #customers th {
      border: 1px solid #ddd;
      /*padding: 8px;*/
  }

  #customers tr:nth-child(even){background-color: #f2f2f2;}

  #customers tr:hover {background-color: #ddd;}

  #customers th {
      /*padding-top: 12px;*/
      /*padding-bottom: 12px;*/
      text-align: center;
      background-color: #ffff;
      color: black;
  }

  #customers td{
    text-align: center;
  }
</style>
<body>
  <div id="title">
   <span><b>Laporan Harian Detail</b></span>
  </div>
   <table id="description">
   <tr>
     <td><b>NIP</b></td>
     <td><b>:</b></td>
     <td><?=$users[0]['nip']?></td>
     <td class="left-desc">Periode Waktu</td>
   </tr>
   <tr>
     <td><b>Nama</b></td>
     <td><b>:</b></td>
     <td><?=$users[0]['full_name']?></td>
     <td class="left-desc">Dari <?=$users[0]['from']?> s/d <?=$users[0]['to']?></td>
   </tr>
 </table>
 <table id="customers">
    <tr>
      <th class="normal">tanggal</th>
      <th class="normal">Jam Masuk</th>
      <th class="normal">Jam Pulang</th>
      <th class="normal">Scan Masuk</th>
      <th class="normal">Scan Keluar</th>
      <th class="normal">Terlambat</th>
      <th class="normal">Plg Cpt</th>
      <th class="normal">Lembur</th>
      <th class="normal">Jam Kerja</th>
      <th class="normal">Jml Hadir</th>
    </tr>
    <?php foreach($users as $user): ?>
      <tr>
      <td><?php echo $user['tanggal']; ?></td>
      <td><?php echo $user['jam_masuk']; ?></td>
      <td><?php echo $user['jam_pulang']; ?></td>
      <td><?php echo $user['scan_masuk']; ?></td>
      <td><?php echo $user['scan_keluar']; ?></td>
      <td><?php echo $user['terlambat']; ?></td>
      <td><?php echo $user['plg_cpt']; ?></td>
      <td><?php echo $user['lembur']; ?></td>
      <td><?php echo $user['jam_kerja']; ?></td>
      <td><?php echo $user['jml_hadir']; ?></td>
      </tr>
    <?php endforeach; ?>

</table>
</body>