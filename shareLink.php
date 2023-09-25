<?php
require_once('core/init.php');
require_once('inc/header.php');
titleChanger("Share link");//page title
require_once('inc/nav.php');

checkSession(BU . "login.php");
?>

<div class="container-fluid d-flex justify-content-center align-items-center vh-100">


    <div class="card myCard">
        <div class="card-header">
            <h1 class="text-center">Your file</h1>
        </div>

        <div id="copyShareLinkMsg" style="display:none;">
            <div class="alert alert-success alert-dismissible fade show" role="alert" >
                <strong>Copied successfully</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>



        <div class="card-body">
            <h3 class="card-title"><?php echo base64_decode($_GET['file_name']); ?></h3>
            <div id="shareLink" class="card-title" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;width:200px;"><?php echo BU."download.php?unique_name=" . $_GET['unique_name'] . "&user_id=" . $_GET['user_id'] . "&file_name=" . $_GET['file_name'] . "&is_public=" . $_GET['is_public'] . ""; ?></div>
        </div>

        <div class="m-3 d-grid gap-2">
            <button class="btn btn myBg1" id="copyShareLinkBtn">Copy to share</button>
        </div>
    </div>



</div>



<?php
require_once('inc/footer.php');
?>