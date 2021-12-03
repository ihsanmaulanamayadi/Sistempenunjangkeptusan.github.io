<?php
  $conn = mysqli_connect ("localhost","root","","dbkaryawan");
  if (mysqli_connect_errno()){
  echo "Koneksi Gagal".mysqli_connect_error();
}
$query = mysqli_query($conn,"SELECT*FROM karyawan ORDER BY Nama ASC");

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

$dataforfactor = mysqli_query($conn,"SELECT*FROM karyawan ORDER BY Nama ASC");

$absiNilai = [];
$kinerjaNilai = [];
$atitudeNilai = [];
$safetyNilai = [];
$sayaratNilai = [];

// Jumlah Hasil benefit cost x bobot factor
while($row = mysqli_fetch_array($dataforfactor)){
  array_push($absiNilai, $row['absensi'] / $absensibenefit * 0.45);
  array_push($kinerjaNilai, $row['kinerja'] / $kinerjabenefit * 0.2);
  array_push($atitudeNilai, $row['atitude'] / $atitudebenefit * 0.1);
  array_push($safetyNilai, $safetrybenefit / $row['safeti'] * 0.2);
  array_push($sayaratNilai, $row['syarat_ketentuan'] / $syaratbenefit * 0.05);
}

// var_dump($absiNilai);
// Hasil akhir
$result = $absiNilai[0] + $kinerjaNilai[0] + $atitudeNilai[0] + $safetyNilai[0] + $sayaratNilai[0];

$dataVal = mysqli_query($conn,"SELECT*FROM karyawan ORDER BY Nama ASC");

?>
<h1>HASIL HITUNG METHODE SAW</h1>
<br>

<table id="example" class="table table-striped table-bordered" style="width:100%">

  <thead class="bg-info"> 
    <tr>
      
      <th scope="col">Nik</th>
      <th scope="col">Nama</th>
      <th scope="col">Bagian</th>
      <th scope="col">Absensi</th>
      <th scope="col">Kinerja</th>
      <th scope="col">Attitude</th>
      <th scope="col">Safety</th>
      <th scope="col">Syarat & Ketentuan</th>
      <th scope="col">Hasil</th>
      <th scope="col">Ketentuan</th>
      
    </tr>
  </thead>
  <tbody>
  <?php $i=-1; while($row = mysqli_fetch_array($dataVal)) : ?>
     <tr>
         <?php $i++; ?>
         <td><?= $row['nik'] ?></td>
         <td><?= $row['nama'] ?></td>
         <td><?= $row['bagian'] ?></td>
         <td><?= $absiNilai[$i] ?></td>
        <td><?= $kinerjaNilai[$i] ?></td>
        <td><?= $atitudeNilai[$i] ?></td>
        <td><?= $safetyNilai[$i] ?></td>
        <td><?= $sayaratNilai[$i] ?></td>
         
         <td><?= $absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] ?></td>
         <td>
         <?php 
          if($absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] >= 0 && $absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] < 0.61 ){
            echo "Tidak Layak";
          }else if($absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] > 0.61 && $absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] < 0.71 ){
            echo "Dipertimbangkan";
          }else if($absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] > 0.70 && $absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] < 0.86 ){
            echo "Layak";
          }else if($absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] > 0.85 && $absiNilai[$i] + $kinerjaNilai[$i] + $atitudeNilai[$i] + $safetyNilai[$i] + $sayaratNilai[$i] < 1.1){
            echo "Sangat Layak";
          }else {
            echo "aku";
          }  
            
        ?>
         </td>
         
     </tr>
  <?php endwhile; ?>
  </tbody>
</table>
<p>ada dasarnya hanya ada tiga tahap dari pehitungan SAW, yaitu :</p>

Tahap 1 Analisa, 
<p>tahap ini melakukan penentuan jenis kriteria apakah benefit atau cost, serta mengubah semua nilai attribut sesuai dengan nilai yang ada pada data crips. Jika attribut tidak mempunyai data crips, maka langsung dimasukkan data aslinya.</p>

Tahap 2 normalisasi, 
<p>tahap ini digunakan untuk merubah nilai dari setiap attribut ke dalam skala 0-1 dengan memperhatikan jenis kriteria nya apakah benefit / cost. Berikut rumusnya :</p>


<p>rumus tahap normalisasi saw</p>
Tahap 3 perankingan, 
<p>tahap ini merupakan tahap utama dimana mengalikan semua attribut dengan bobot kriteria pada setiap alternatif. Berikut rumusnya :</p>


<p>tahap perankingan saw</p>

