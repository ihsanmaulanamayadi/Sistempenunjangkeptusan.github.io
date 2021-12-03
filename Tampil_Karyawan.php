<?php
  $conn = mysqli_connect ("localhost","root","","dbkaryawan");
  if (mysqli_connect_errno()){
  echo "Koneksi Gagal".mysqli_connect_error();
}


$dataVal = mysqli_query($conn,"SELECT*FROM karyawan ORDER BY Nama ASC");

?>
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
<h1>DATA KARYAWAN TRAINING</h1><br>

<table id="myTable" class="table table-striped table-bordered" style="width:100%">

  <thead class="bg-success"> 
    <tr>
      <center>
      
      <th width="120px" >Nilai</th>
      <th width="90px">Nik</th>
      <th align='center'width="280px">Nama</th>
      <th width="120px">Jenis Kelamin</th>
      <th width="150px">Bagian</th>
      <th width="220px">Action</th>
      </center>
    </tr>
  </thead>
  <tbody>
  <?php $i=0; while($row = mysqli_fetch_array($dataVal)) : ?>
    <tr>
  
         <td><a class="btn btn-success" href="tambahnilai.php?id=<?= $row['id_karyawan']; ?>">Add Nilai</a></td>
         <td><?= $row['nik'] ?></td>
         <td><?= $row['nama'] ?></td>
         <td><?= $row['jk'] ?></td>
         <td><?= $row['bagian'] ?></td>
         
         
         <td align="center">
            
            <a onclick="return confirm('Yakin mengganti data ini ?')" class="btn btn-warning" href="ubah.php?id=<?= $row['id_karyawan']; ?>">Ubah</a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="hapus.php?id=<?= $row['id_karyawan']; ?>">Hapus</a>
         </td>
    </tr>

  <?php endwhile; ?>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  
  </tbody>
</table>
<p>Data di input apa bila ada Karyawan Training baru, Data bisa di Ubah atau dihapus sewaktu waktu, dan Data Nilai di input di "add Nilai" Setelah Karyawan tersebut telah menjalani Training Selama 3 Bulan Atau dalam jangka waktu yang telah di tentukan.
</p>
<p>Kemudian akan dihitung menggunakan Metode Simple Additive Weighting (S.A.W).
</p>



