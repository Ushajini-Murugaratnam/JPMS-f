<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JPMS Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>

  <section class="vh-100 gradient-custom" style="background: linear-gradient(to bottom,#c5d1d1 10%, #6e6ec7 90%);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card  text-dark" style="border-radius: 1rem;background:#c5d1d1;">
          <div class="card-body p-4 text-center">
          <?php                    
              if(isset($_SESSION['sucess'])&&$_SESSION['sucess']){
                echo '<div class="alert alert-success" role="alert">Admin <span class="close">'.$_SESSION['sucess'].'</span></div>';
                unset($_SESSION['sucess']);
              }
                         
          if(isset($_SESSION['status'])&&$_SESSION['status']){
            echo '<div class="alert alert-success" role="alert">Admin <span class="close">'.$_SESSION['status'].'</span></div>';
            unset($_SESSION['status']);
          }
      ?>
            <div class="mb-md-5 mt-md-4 pb-2">
            <form action="logincheck.php" method="POST" id="signin" id="login">
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-dark-50 mb-2">Please enter your login and password!</p>

              <div class="form-outline form-dark mb-2">
                <input type="email" id="email"   name="email" class="form-control form-control-lg" />
                <label class="form-label" for="email">Email</label>
              </div>

              <div class="form-outline form-dark mb-2">
                <input type="password" id="password"   name="password" class="form-control form-control-lg" />
                <label class="form-label" for="password">Password</label>
              </div>


              <button class="btn btn-outline-light btn-lg px-5" type="submit"name="login_btn"   value="Login" id="st-btn">Login</button>


            </div>
            </form>
            <div>
              <p class="mb-0">Don't have an account? <a href="register.php" class="text-dark-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>