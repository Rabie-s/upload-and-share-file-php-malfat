<?php
require_once('core/init.php');
require_once('inc/header.php');
require_once('inc/nav.php');

checkSession(BU . "login.php");

$file = new file();


?>



<!--Home-Section-->

<div class="container">


  <div class="row">

    <div class="col-12 mb-4">
      <div class="card">
        <h1 class="m-3 text-dark text-center">MY FILES</h1>
      </div>

    </div>

    <?php foreach ($file->fetchFiles($_SESSION['id']) as $row) : ?>

      <div class="col-12 mb-4">
        <div class="card">
          <div class="card-body">
            <h2 class="card-text"><?php echo $row['file_name']; ?></h2>

            <div class="d-flex align-items-center m-3">
              <?php if ($row['isPublic'] == 0) :
                echo '<p class="card-text"><small class="text-muted">Privet file</small></p>';
              else :
                echo '<small class="text-muted">Public file</small>';
                echo '<span id="shareLinkBtn" data-toggle="tooltip" data-placement="right" title="Share" role="button">
                
                <a href="shareLink.php?unique_name=' . base64_encode($row['unique_name']) . '&user_id=' . base64_encode($row['user_id']) . '&file_name=' . base64_encode($row['file_name']) . '&is_public=' . base64_encode($row['isPublic']) . ' ">
                <i class="bi bi-share"></i>
                </a>

                
                </span>';

              endif;
              ?>
            </div>


            <a class="btn btn myBg2" id="shareLink" href="download.php?unique_name=<?php echo base64_encode($row['unique_name']); ?>&user_id=<?php echo base64_encode($row['user_id']); ?>&file_name=<?php echo base64_encode($row['file_name']); ?>&is_public=<?php echo base64_encode($row['isPublic']); ?>">Download</a>
            <a class="btn btn myBg1" href="deleteFile.php?file_id=<?php echo base64_encode($row['id']); ?>&unique_name=<?php echo base64_encode($row['unique_name']); ?>&user_id=<?php echo base64_encode($row['user_id']); ?>">Delete</a>
          </div>
        </div>
      </div>

    <?php endforeach; ?>


  </div>

</div>

<!--End Home-Section-->


<?php
require_once('inc/footer.php');
?>