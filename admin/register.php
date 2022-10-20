<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JPMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>

<section class="vh-100 gradient-custom"     style="background: linear-gradient(to bottom,#c5d1d1 10%, #6e6ec7 90%);";>
  <div class="container py-1 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-8">
        <div class="card text-black"style="border-radius: 1rem;background:#c5d1d1;"">
          <div class="card-body text-center">
          <?php     
                    if(isset($_SESSION['password_status'])&&$_SESSION['password_status']){                                    
                    echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['password_status'].'</span></div>';
                    unset($_SESSION['password_status']);
                    }else if(isset($_SESSION['mobile_status'])&&$_SESSION['mobile_status']){                                    
                      echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['mobile_status'].'</span></div>';
                      unset($_SESSION['mobile_status']);
                    }else if(isset($_SESSION['email_status'])&&$_SESSION['email_status']){
                      echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['email_status'].'</span></div>';
                      unset($_SESSION['email_status']);
                      }else if(isset($_SESSION['status'])&&$_SESSION['status']){
                      echo '<div class="alert alert-warning" role="alert">Admin <span class="close">'.$_SESSION['status'].'</span></div>';
                      unset($_SESSION['status']);
                      }else if(isset($_SESSION['r_status'])&&$_SESSION['r_status']){
                        echo '<div class="alert alert-warning" role="alert">hello <span class="close">'.$_SESSION['r_status'].'</span></div>';
                        unset($_SESSION['r_status']);
                      } 
                  ?>
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                  
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-10">
                      <form name="reg" action="Manage/profileManage.php" onsubmit="return validateForm()" method="post" id="reg"  class="row g-3 needs-validation" novalidate>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <input type="text" id="fullname" name="fullname" class="form-control" required />
                                  
                                  <label class="form-label" for="fullname">Full name</label>
                                </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <input type="text" id="username" name="username" class="form-control" required />
                                  
                                  <label class="form-label" for="username">user name</label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                  <!-- Email input -->
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <input type="email" id="email" name="email" class="form-control" required />
                            
                                  <label class="form-label" for="email">Email address</label>
                                </div>
                              </div> 
                                  <!-- mobile input -->
                              <div class="col-md-6 mb-4">
                                <div class="form-outline mb-">
                              <input type="text" name="mobile" id="" maxlength="10" class="form-control" required  />                          
                                  <label class="form-label" for="mobile">mobile</label>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <input type="password" id="password" name="password" class="form-control" required/>
                                  <label class="form-label" for="password">Password</label>
                                </div>
                              </div>
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required />
                                  <label class="form-label" for="confirmpassword">Confirm Password</label>
                                </div>
                              </div>
                            </div>
                            
                                <!-- Submit button -->
                            <div class="d-grid gap-2 col-6 mx-auto">
                              <button class="btn btn-primary sm" type="submit"  name="register_btn" value="Login" id="st-btn">Register</button>
                            </div>
                          

                      </form>
                    </div>
                  </div><br>
                <p class="mb-0">Already on JPMS Account? <a href="index.php" class="text-dark-50 fw-bold"> Sign in</a></p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')
  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
  form.addEventListener('submit', event => {
  if (!form.checkValidity()) {
  event.preventDefault()
  event.stopPropagation()
  }
  form.classList.add('was-validated')
  }, false)
  })
  })()
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>