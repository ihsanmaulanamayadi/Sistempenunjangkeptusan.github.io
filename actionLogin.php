
<?php 
// menghubungkan dengan koneksi
include 'config.php';

// mengaktifkan session php
session_start();

// cek apakah ada action submit button
if(isset($_POST['submit'])){
    $username = $_POST['email'];
    $password = $_POST['password'];
    
    // menyeleksi data admin dengan username dan password yang sesuai
    $result = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' AND password='$password'");

    if($result->num_rows > 0 ){
        $_SESSION['username'] = $username;
	    $_SESSION['status'] = "login";
	    header("location:index.php");
    }else {
        header("login.php");
       
          }
        }
        ?>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <center><h2>Login</h2></center>
        <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form method="POST" action="actionLogin.php">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example13"><b>Username</b></label>
            <input type="text" name="email" id="form1Example13" class="form-control form-control-lg" />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form1Example23"><b>Password</b></label>
            <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
            
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div>
            <p class="fst-italic"><font color="red"><i><u>Username Atau Password Salah!</i></u></p></font>
            </div><br>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
                checked
              />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
          </div>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </form>
      </div>
    </div>
  </div>
  </section>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
       
      