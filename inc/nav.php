    <!-- start navBar -->

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: white;">
      <div class="container text-center">
        <a class="navbar-brand" href="index.php">MALFAT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="myFiles.php">My files</a></li>
                <li><a class="dropdown-item" href="upload.php">Uploads</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php
                if (isset($_SESSION['id']) and isset($_SESSION['name']) and isset($_SESSION['email']) and !empty($_SESSION)) :
                  echo '<li><a class="dropdown-item" href="myProfile.php">My profile</a></li>';
                endif;
                ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">About</a>
            </li>
          </ul>
          <div class="d-flex justify-content-center align-items-center">
            <?php if (isset($_SESSION['id']) and isset($_SESSION['name']) and isset($_SESSION['email']) and !empty($_SESSION)) :    
              echo '<a class="btn me-2 rounded-pill myBg1 me-2" href="logout.php">Logout</a>';
              echo '<span>Welcome '.$_SESSION['name'].'</span>';
            else :
              echo '<a class="btn me-2 rounded-pill myBg1 me-2" href="login.php">Login</a>';
              echo '<a class="btn me-2 rounded-pill myBg2 me-2" href="register.php">Register</a>';
            endif;
            ?>
          </div>
        </div>
      </div>
    </nav>

    <!-- end navBar -->