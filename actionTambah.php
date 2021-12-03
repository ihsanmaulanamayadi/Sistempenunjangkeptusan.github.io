<?php 
include 'config.php';

if(isset($_POST['submit'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $bagian = $_POST['bagian'];


    $query = mysqli_query($conn,"INSERT INTO karyawan (nik,nama,jk,bagian) VALUES ('$nik','$nama','$jk','$bagian')");
    
    if($query){
        echo "<script> alert('Data Berhasil dimasukan ke DB !');</script>";
	    echo "<script> location='index.php?page=Data Karyawan'; </script>";
    }else{
        echo "Data gagal di masukan ke databse";
    }
}