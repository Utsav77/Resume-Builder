<?php
//start the session
session_start();

if(!isset($_SESSION["name"]))
{
    //redirect to login page
    header('Location: ../index.php');
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Resume</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- External CSS -->
    <link rel="stylesheet" href="../css/form.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" />
  </head>



  <body class="bg-light">
    <div class="">
      <div class="bgcolr">
        <div class="container">
          <div class="pt-4 pb-4 text-light no-gutters bg-col row">
            <div class="col">
              <h2>Resume</h2>
            </div>
            <div class="col text-right my-auto">
              <button onclick="location.href = 'logout.php';" type="button" class="btn btn-light">Logout</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Introduction -->
      <div class="myback pt-5">
        <div class="container">
            <div class="shadow row no-gutters mt-4 mb-5">
              <div id = "left" class="col col-md-5 col-12 bgcolr">
                <div class="">
                  <img src=<?php echo $_SESSION["image"]; ?>  style="height:100%; width: 100%; object-fit: cover" alt="">
                </div>

              </div>
              <div id = "right" class="col col-md-7 col-12 bg-light">
                <div class="p-5">
                  <h1>I'M <b><?php echo $_SESSION["name"] ; ?></b></h1>
                  <p class="mb-4">Software Developer</p>
                  <!-- details -->
                  <div class="details">
                    <div class="row">
                      <div class="col col-4">
                        <p><b>DOB</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["dob"]; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-4">
                        <p><b>Address</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["addr"]; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-4">
                        <p><b>Phone</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["phone"]; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-4">
                        <p><b>Email</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["email"]; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-4">
                          <p><b>Education</b></p>
                      </div>
                      <div class="col col-8">
                        <p><?php echo $_SESSION["education"]; ?></p>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="mt-auto text-light pt-4 pb-4 text-center row no-gutters bgcolr">
                  <div class="col">
                  <a href=<?php echo $_SESSION['linkedin']; ?>>
                    <i class="text-light fab fa-linkedin-in"></i></a>
                  </div>
                  <div class="col">
                    <i class="fab fa-github"></i></a>
                  </div>
                  <div class="col">
                    <i class="fab fa-facebook-f"></i>
                  </div>
                  <div class="col">
                    <i class="fab fa-twitter"></i>
                  </div>
                  <div class="col">
                    <i class="fab fa-google-plus-g"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <h3 class="text-center textcolr mb-4">Skills</h3>
      <div class="container mb-5">
        <div class=" shadow row no-gutters">
          <div class="p-5 col-md-6">
            <p class="mb-3"><b>About</b></p>
            <p class="mb-5"><?php echo $_SESSION["about"]; ?></p>
            <p class="mb-3"><b>Interests</b></p>
            <?php
       
                foreach ($_SESSION["interests"] as $value) {
                  if ($value!=""){
                    echo '<span class="mr-2 mb-2 pl-3 pr-3 pt-2 pb-2 text-light rounded bg-success">' .
                      $value .
                    '</span>';
                  }
                }

            ?>

          </div>
          <div class="p-5 col-md-6">
            <p class="mb-3"><b>Skills :</b></p>
              <?php
                
                foreach ($_SESSION["skill"] as $value) {
                    if ($value!=""){
                      echo '<span class="mr-2 mb-2 pl-3 pr-3 pt-2 pb-2 text-light rounded bg-primary">' .
                        $value .
                      '</span>';
                    }
                  } 
              ?>
          </div>
      </div>
    </div>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Font Awesome  -->
    <script src="https://kit.fontawesome.com/31875a1568.js" crossorigin="anonymous"></script>


    <!-- BootStrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  </body>
</html>