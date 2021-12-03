<?php 
include "config.php";
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM karyawan WHERE id_karyawan=$id ");
$response = mysqli_fetch_row($query);

$data = ['laki-laki','perempuan'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>ubah data</title>
  </head>
  <body>
    <div class="container mt-5">
    <h2 align="center">Ubah Data Karyawan</h2>
    <form method="POST" action="">
      <div class="alert alert-primary" role="alert">
        <b><center>Profil</b></center>
      </div>
        <div class="row middle">
            <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="exampleInputEmail1">NIK</label>
                  <input type="text" value="<?=$response[1]?>" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" value= "<?=$response[2]?>"name="nama" placeholder="Input Nama" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Kelamin</label>
                  <select type="text" value="<?=$response[3]?>" name="jk"  class="form-control" id="exampleInputPassword1" placeholder="Pilih" >
                              <option value="(belum diisi!)">>Pilih<</option>
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Bagian</label>
                  <select type="text" value="<?=$response[4]?>"name="bagian" class="form-control" id="exampleInputPassword1" placeholder="Pilih" >
                              <option value="(belum diisi!)">>Pilih<</option>
                              <option value="IT Support">IT Support</option>
                              <option value="UX/UI Design">UX/UI Design</option>
                              <option value="Web Developer (front end)">Web Developer (front end)</option>
                              <option value="Web Developer (back end)">Web Developer (back end)</option>
                              <option value="software engginer">software engginer</option>
                  </select>
                </div>
            </div>
        </div>
            <br>
            <div class="alert alert-warning" role="alert-6">
               <b><center> Nilai </b></center>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="exampleInputPassword1">Absensi</label>
                  <label for="exampleInputPassword1">Absensi</label>
                  <select type="number" value="<?=$response[5]?>" name="absensi" class="form-control" id="exampleInputPassword1" placeholder="100/75/50/0">
                      <option value="100">100</option>
                      <option value="75">75</option>
                      <option value="50">50</option>
                      <option value="0">0</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kinerja</label>
                  <input type="number" value= "<?=$response[6]?>" name="kinerja" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Atitude</label>
                  <input type="number"value= "<?=$response[7]?>" name="atitude" class="form-control" id="exampleInputPassword1" placeholder="Password">               
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Safety</label>
                  <input type="number"value= "<?=$response[8]?>" name="safety" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Syarat</label>
                  <input type="number"value= "<?=$response[9]?>" name="syarat" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 mt-4">
            <button type="submit" name="submit" class="btn btn-primary" type="button">UBAH</button>
        </div>
    </form>
    </div>
  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
include "config.php";
if(isset($_POST['submit'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $bagian = $_POST['bagian'];
    $absensi = $_POST['absensi'];
    $kinerja = $_POST['kinerja'];
    $atitude = $_POST['atitude'];
    $safeties = $_POST['safety'];
    $syarat = $_POST['syarat'];
    
    // simpan data ke databse
    $query = mysqli_query($conn,"UPDATE karyawan SET nik='$nik',nama='$nama', jk='$jk',bagian='$bagian', absensi='$absensi', kinerja='$kinerja', atitude='$atitude', safeti='$safeties', syarat_ketentuan='$syarat' WHERE id_karyawan='$id' ");
    if($query){
        echo "<script> alert('Data Berhasil diubah !');</script>";
	    echo "<script> location='index.php?page=Data Karyawan'; </script>";

    }else{
        echo "Data gagal di masukan ke databse";
    }
}

