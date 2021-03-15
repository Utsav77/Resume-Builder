<?php
//start the session
session_start();
?>

<?php include 'php/server.php'?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
        <title>Registration Page</title>
        <script src="js/form.js"></script>
        
        
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2"></div>
                <div class="col-lg-6 col-md-8">
                    <br>
                    <div class="col-lg-12 row justify-content-md-center">
                            <h3>Register Account<h3>
                    </div>
                    <div class="col-lg-12 login-form">
                        <form method="post" name="RegForm" action="php/server.php" onsubmit="return validate()" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" required aria-label="Username" aria-describedby="basic-addon1">
                                <p id="name" style="color:red;"></p>
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control" name="dob" required>
                            </div>
                            <div class="form-group">
                                <label>Gender</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender[]" id="inlineRadio1" value="male">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender[]" id="inlineRadio2" value="female">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender[]" id="inlineRadio3" value="others">
                                    <label class="form-check-label" for="inlineRadio3">Others</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <p id="mail" style="color:red;"><p>
                            </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="number" name="contact" class="form-control" placeholder="9876543210">
                                <p id="contact" style="color:red;"><p>
                            </div>
                            <div class="form-group">
                                <label>Skills</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="skills[]" value="python">
                                    <label class="form-check-label" for="inlineCheckbox1">Python</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="skills[]" value="java">
                                    <label class="form-check-label" for="inlineCheckbox2">Java</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="skills[]" value="php">
                                    <label class="form-check-label" for="inlineCheckbox3">PHP</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="skills[]" value="js">
                                    <label class="form-check-label" for="inlineCheckbox4">JavaScript</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Profile Photo</label>
                                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control" aria-label="With textarea" name="about"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" aria-label="With textarea" name="address"></textarea>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Educational Qualification</label>
                                </div>
                                <select class="custom-select" name="education" id="inputGroupSelect01">
                                    <option value="B.Tech">B.Tech</option>
                                    <option value="M.Tech">M.Tech</option>
                                    <option value="MCA">MCA</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Interests</label>
                                </div>
                                <select name="interest" id="interest" multiple>
                                    <option value="tech">Technology</option>
                                    <option value="sports">Sports</option>
                                    <option value="travel">Travelling</option>
                                    <option value="movies">Movies</option>
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>LinkedIn Profile</label>
                                <input type="text" name="website" class="form-control" required/>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
    </body>
</html>


