<?php 
include "config.php";
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM karyawan WHERE id_karyawan=$id ");
$response = mysqli_fetch_row($query);

// $data = ['laki-laki','perempuan'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <div class="container mt-5">
    <h3>Masukan Nilai</h3>
    <form method="POST" action="">
        
        <div class="col-md-6 mt-4">
            <div class="form-group">
                  <label for="exampleInputPassword1">Absensi</label>
                  <select type="number" value="<?=$response[5]?>" name="absensi" class="form-control" id="exampleInputPassword1" placeholder="100/75/50/0">
                      <option value="100">100</option>
                      <option value="75">75</option>
                      <option value="50">50</option>
                      <option value="0">0</option>
                  </select>
            </div>
        
        </div>
            <div class="col-md-6 mt-4">
                <div class="form-group mb-3">
                  <label for="exampleInputEmail1">Kinerja</label>
                  <input type="number" value= "<?=$response[6]?>" name="kinerja" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0-100">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Atitude</label>
                  <input type="number"value= "<?=$response[7]?>" name="atitude" class="form-control" id="exampleInputPassword1" placeholder="0-100">
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="form-group mb-3">
                  <label for="exampleInputEmail1">Safety (100=0, 0=0, 10=100)</label>
                  <input type="number"value= "<?=$response[8]?>" name="safety" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=100-10>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Syarat</label>
                  <input type="number"value= "<?=$response[9]?>" name="syarat" class="form-control" id="exampleInputPassword1" placeholder="0-100">
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 mt-4">
            <button onclick="return confirm('Apakah Data Sudah Sesuai?')" type="submit" name="submit" class="btn btn-primary" type="button">Tambakan Nilai</button>
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

    $absensi = $_POST['absensi'];
    $kinerja = $_POST['kinerja'];
    $atitude = $_POST['atitude'];
    $safeties = $_POST['safety'];
    $syarat = $_POST['syarat'];
    
    // simpan data ke databse
    $query = mysqli_query($conn,"UPDATE karyawan SET  absensi='$absensi', kinerja='$kinerja', atitude='$atitude', safeti='$safeties', syarat_ketentuan='$syarat' WHERE id_karyawan='$id' ");
    if($query){
        echo "<script> alert('NILAI BERHASIL DITAMBAHKAN !');</script>";
	      echo "<script> location='index.php?page=Data Karyawan'; </script>";

    }else{
        echo "Data gagal di masukan ke databse";
    }
}

