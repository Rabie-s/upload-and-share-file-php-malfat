<?php
require_once('core/init.php');
require_once('inc/header.php');
titleChanger("Register");//page title
require_once('inc/nav.php');

?>




<?php
$user = new user();
$errorsMsg = array();


if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["submit"])) {
  $name = filterString(strtolower($_POST['name'])); //Convert string to lower case,name must be lower case.
  $email = $_POST['email'];
  $password = $_POST['password'];


  //validate
  //check if fields are empty.
  if (empty($name) or empty($email) or empty($password)) {
    array_push($errorsMsg, "Please fill all field.");
  }
  //check email validate.
  elseif (!checkEmail($email)) {
    array_push($errorsMsg, "Please enter a valid email.");
  }
  //check string length is more than 8 characters.
  elseif (!minLen($password, 8)) {
    array_push($errorsMsg, "The password must be more than 8 characters.");
  }
  //check if email is exists.
  elseif ($user->existsEmail($email)) {
    array_push($errorsMsg, "The email is exists.");
  }
  //if no error insert data.
  else {
    $hashPassword = sha1($password);//hash password
    $user->userInsert($name, $email, $hashPassword);

    redirect("login.php");
  }
}

?>



<!--Home-Section-->

<<div class="container-fluid d-flex justify-content-center align-items-center vh-100">


  <div class="card myCard">
    <div class="card-header">
      <h1 class="text-center">Register</h1>
    </div>
    <div class="card-body">
      <?php
      //display error 
      if (isset($errorsMsg)) {
        foreach ($errorsMsg as $error) {
          echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
      }
      ?>


      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation my-5" novalidate>

        <div class="form-group m-3">
          <input type="text" class="form-control" id="Name" name="name" placeholder="Name">
          <div class="invalid-feedback">Please enter your name.</div>
          <div class="valid-feedback">Looks good!</div>

        </div>

        <div class="form-group m-3">
          <input type="email" class="form-control" id="Email" name="email" placeholder="Email">
          <div class="invalid-feedback">Please check your email.</div>
          <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="form-group m-3">
          <input type="password" class="form-control" id="Password" name="password" placeholder="Password" min="8">
          <div class="invalid-feedback">Please check your password.</div>
          <div class="valid-feedback">Looks good!</div>
        </div>

        <div class="m-3 d-grid gap-2">
          <button class="btn btn myBg1" type="submit" name="submit">Register</button>
        </div>


      </form>

    </div>
  </div>



  </div>

  <!--End Home-Section-->







  <?php
  require_once('inc/footer.php');
  ?>