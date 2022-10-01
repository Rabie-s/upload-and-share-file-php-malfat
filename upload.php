<?php

use function PHPSTORM_META\map;

require_once('core/init.php');
require_once('inc/header.php');
titleChanger("Upload");//page title
require_once('inc/nav.php');

checkSession(BU . "login.php");



//uploads

$user = new user();
$file = new file();
$errorsMsg = array();


if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["submit"])) {

  $randomNum = rand(10, 1000000); //generate random number

  //$fileName = $_POST['fileName'];
  $fileName = $_FILES['file']['name']; //get file from form;
  $fileTmp_name = $_FILES['file']['tmp_name']; //get file temp
  $fileType =  $_FILES['file']['type']; //get type of file
  $fileSize = $_FILES['file']['size'] / 1000000; //get size using mb format *
  $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION); //get file EXTENSION

  $isPublic = $_POST['isPublic'];

  $uniqueName = $randomNum . "." . $fileExtension;



  //validate
  //check if user upload file.
  if (empty($fileName) or empty($fileTmp_name)) {
    array_push($errorsMsg, "Please choose a file.");
  } elseif (!$file->checkUserMaxStorage($_SESSION['id'], MAXStorageForOneUser)) {
    array_push($errorsMsg, "you don't have Enough storage.");
    echo $file->fetchUserStorage($_SESSION['id']);
  } elseif ($fileSize > MAXStorageForOneUser) {
    array_push($errorsMsg, "you don't have Enough storage.");
  } else {
    $file->upload($fileName, $uniqueName, $isPublic, $fileSize, $_SESSION['id']); //insert file name,random name file and user how uploaded a file in dataBase.
    move_uploaded_file($fileTmp_name, UPLOADFilesPATH . $randomNum . "." . $fileExtension); //save file in upload directory folder and change name to random name.



  }


}


?>



<!--Home-Section-->

<div class="container-fluid d-flex justify-content-center align-items-center vh-100">


  <div class="card myCard">
    <div class="card-header">
      <h1 class="text-center">Upload file</h1>
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
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="needs-validation my-5" enctype="multipart/form-data" novalidate>


        <div class="form-group mb-3">
          <input class="form-control" type="file" id="formFile" name="file" required>
          <div class="invalid-feedback">Please upload file.</div>
          <div class="valid-feedback">Looks good.</div>

        </div>


        <div class="form-group m-3">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="isPublic" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Public</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="isPublic" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">Privet</label>
          </div>
        </div>





        <div class="m-3 d-grid gap-2">
          <button class="btn btn myBg1" name="submit" type="submit">Upload</button>
        </div>



      </form>
    </div>
  </div>



</div>

<!--End Home-Section-->


<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>

<?php
require_once('inc/footer.php');
?>