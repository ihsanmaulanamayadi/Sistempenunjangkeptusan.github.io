<?php
  $conn = mysqli_connect ("localhost","root","","dbkaryawan");
  if (mysqli_connect_errno()){
  echo "Koneksi Gagal".mysqli_connect_error();
}

$query = mysqli_query($conn,"SELECT*FROM karyawan ORDER BY nama ASC");

$absesnsi = [];
$kinerja = [];
$atitude = [];
$safety = [];
$sayarat = [];

while($row = mysqli_fetch_array($query)){
  array_push($absesnsi, $row['absensi']);
  array_push($kinerja, $row['kinerja']);
  array_push($atitude, $row['atitude']);
  array_push($safety, $row['safeti']);
  array_push($sayarat, $row['syarat_ketentuan']);
}
// data pencarian nilai bnefit dan cost
$absensibenefit = max($absesnsi);
$kinerjabenefit = max($kinerja);
$atitudebenefit = max($atitude);
$safetrybenefit = min($safety);
$syaratbenefit = max($sayarat);

$dataforfactor = mysqli_query($conn,"SELECT*FROM karyawan ORDER BY nama ASC");

$absiNilai = [];
$kinerjaNilai = [];
$atitudeNilai = [];
$safetyNilai = [];
$sayaratNilai = [];

// Jumlah Hasil benefit cost x bobot factor
while($row = mysqli_fetch_array($dataforfactor)){
  array_push($absiNilai, $row['absensi'] / $absensibenefit );
  array_push($kinerjaNilai, $row['kinerja'] / $kinerjabenefit );
  array_push($atitudeNilai, $row['atitude'] / $atitudebenefit );
  array_push($safetyNilai, $safetrybenefit / $row['safeti'] );
  array_push($sayaratNilai, $row['syarat_ketentuan'] / $syaratbenefit);
}

// var_dump($absiNilai);
// Hasil akhir



$dataVal = mysqli_query($conn,"SELECT*FROM karyawan ORDER BY nama ASC");



?>
<table id="example" class="table table-striped table-bordered" style="width:100%">
<h2>Data Normalisasi</h2>
<br>

<thead class="bg-warning"> 
  <tr>
    
    <th scope="col">Nik</th>
    <th scope="col">Nama</th>
    <th scope="col">Jenis Kelamin</th>
    <th scope="col">Bagian</th>
    <th scope="col">Absensi</th>
    <th scope="col">Kinerja</th>
    <th scope="col">Attitude</th>
    <th scope="col">Safety</th>
    <th scope="col">Syarat & Ketentuan</th>
    
    

    
  </tr>
</thead>

<tbody>
 
<?php $i=-1; while($row = mysqli_fetch_array($dataVal)) : ?>
    <tr>
       <?php $i++; ?>
       <td><?= $row['nik'] ?></td>
       <td><?= $row['nama'] ?></td>
       <td><?= $row['jk'] ?></td>
       <td><?= $row['bagian'] ?></td>
       <td><?= $absiNilai[$i] ?></td>
       <td><?= $kinerjaNilai[$i] ?></td>
       <td><?= $atitudeNilai[$i] ?></td>
       <td><?= $safetyNilai[$i] ?></td>
       <td><?= $sayaratNilai[$i] ?></td>
       
       
    </tr>  
    <?php endwhile; ?>


</tbody>
</table>


