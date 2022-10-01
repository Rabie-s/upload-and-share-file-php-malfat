<?php
require_once('core/init.php');
require_once('inc/header.php');
titleChanger("My profile");//page title
require_once('inc/nav.php');

checkSession(BU . "login.php");

$user = new user();
$file = new file();

$userStorage = MAXStorageForOneUser - $file->userStorage($_SESSION['id']);

?>


<div class="container-fluid d-flex justify-content-center align-items-center vh-100">


    <div class="card myCard">
        <div class="card-header">
            <h1 class="text-center">My profile</h1>
        </div>

    <?php foreach($user->fetchUser($_SESSION['id']) as $row): ?>
        <div class="card-body">

            <div class="form-group m-3">
                <label class="form-label" for="">Name</label>
                <input type="email" class="form-control" id="userName" name="name" value="<?php echo $row['name']; ?>" disabled>
            </div>

            <div class="form-group m-3">
                <label class="form-label" for="">Email</label>
                <input type="email" class="form-control" id="userEmail" name="email" value="<?php echo $row['email']; ?>" disabled>
            </div>

            <div class="form-group m-3">
                <label class="form-label" for="">Your storage</label>
                <input type="email" class="form-control" id="userEmail" name="email" value="<?php echo $userStorage ; ?>MB" disabled>
            </div>


        </div>

        <?php endforeach; ?>

    </div>

</div>





<?php
require_once('inc/footer.php');
?>