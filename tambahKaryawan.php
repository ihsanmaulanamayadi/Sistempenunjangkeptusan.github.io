
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>ADD</title>
  </head>
  <body>
    <div class="container mt-5">
              <h2><center>Tambah Karyawan</center></h2>
                    <div class="alert alert-primary" role="alert">
                      <b><center>Profil</b></center>
                    </div>
    <form method="POST" action="actionTambah.php">
        <div class="row center">
            <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="exampleInputEmail1">
                    <div class="badge bg-secondary text-wrap" style="width: 6rem;">
                    NIK
                    </div>
                  </label>
                  <input type="number" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="2019804xxx">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">
                    <div class="badge bg-secondary text-wrap" style="width: 6rem;">
                    Nama
                    </div>
                  </label>
                  <input type="text" name="nama" placeholder="Masukan Nama" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">
                    <div class="badge bg-secondary text-wrap" style="width: 6rem;">
                    Jenis Kelamin
                    </div>
                  </label>
                  <select  name="jk"  class="form-control" id="exampleInputPassword1" placeholder="Pilih" >
                              <option value="(PILIH)"><b>(PILIH)</b></option>
                              <option value="Laki-Laki">Laki-Laki</option>
                              <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="exampleInputEmail1">
                    <div class="badge bg-secondary text-wrap" style="width: 6rem;">
                    Bagian
                    </div>
                  </label>
                  <select  name="bagian" class="form-control" id="exampleInputPassword1" placeholder="Pilih" >
                              <option value="(PILIH)"><b>(PILIH)</b></option>
                              <option value="IT Support">IT Support</option>
                              <option value="UX/UI Design">UX/UI Design</option>
                              <option value="Web Developer (front end)">Web Developer (front end)</option>
                              <option value="Web Developer (back end)">Web Developer (back end)</option>
                              <option value="software engginer">software engginer</option>
                  </select>
                </div>
            </div>
        <div class="d-grid gap-2 mt-4">
            <button onclick="return confirm('Apakah Data Sudah Sesuai?')" type="submit" name="submit" class="btn btn-outline-success btn-sm" type="button">Tambahkan</button>
            <input onclick="return confirm('Yakin Ingin Mereset?')" class="btn btn-outline-danger btn-sm" type="reset" value="Reset">
        </div>
        
    </form>
    </div>
  </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>

