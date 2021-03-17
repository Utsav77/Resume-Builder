<?php
//start the session
session_start();
?>

<?php include_once './php/server.php'?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
        <title>Registration Page</title>
        <script src="./js/form.js"></script>
        
        
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
                        <form method="post" name="RegForm" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name ?>" aria-label="name" aria-describedby="basic-addon1">
                                <p id="msg-name" class=" <?php if ($nameErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $nameErr; ?></p>
                            </div>

                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $dob ?>" />
                                <p id="msg-dob" class=" <?php if ($dobErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $dobErr; ?></p>
                            </div>
                            
                            <div class="form-group">
                                <label>Gender</label><br>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="male" <?php if ($gender === "male")  echo "checked" ?> />
                                            Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="female" <?php if ($gender === "female")  echo "checked" ?> />
                                            Female
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="other" <?php if ($gender === "other")  echo "checked" ?> />
                                            Others
                                    </label>
                                </div>
                                <p id="msg-gender" class=" <?php if ($genderErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $genderErr; ?></p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" />
                                <p id="msg-email" class=" <?php if ($emailErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $emailErr; ?></p>
                            </div>
                            
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>" />
                                <p id="msg-phone" class=" <?php if ($phoneErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $phoneErr; ?></p>
                            </div>

                            <div class="form-group" id="skills">
                                <label for="skills">Skills</label>
                                <br>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="skill[]" value="Python" <?php if (in_array("Python", $skill))  echo "checked" ?>>
                                <label class="form-check-label" for="inlineCheckbox1">Python</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="skill[]" value="JAVA" <?php if (in_array("JAVA", $skill))  echo "checked" ?>>
                                <label class="form-check-label" for="inlineCheckbox2">JAVA</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="skill[]" value="PHP" <?php if (in_array("PHP", $skill))  echo "checked" ?>>
                                <label class="form-check-label" for="inlineCheckbox3">PHP</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="skill[]" value="JavaScript" <?php if (in_array("JavaScript", $skill))  echo "checked" ?>>
                                <label class="form-check-label" for="inlineCheckbox4">JavaScript</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" name="skill[]" value="MySQL" <?php if (in_array("MySQL", $skill))  echo "checked" ?>>
                                <label class="form-check-label" for="inlineCheckbox5">MySQL</label>

                                </div>
                                <p id="msg-skill" class=" <?php if ($skillErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $skillErr; ?></p>
                            </div>

                            <div class="form-group">
                                <label for="img">Profile Photo</label>
                                <input type="file" class="form-control-file" name="image" value="<?php echo $img ?>" id="image">
                                <p id="msg-img" class=" <?php if ($imgErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $imgErr; ?></p>
                            </div>

                            <div class="form-group">
                                <label for="about"> About</label>
                                <textarea type="text" class="form-control" id="about" name="about"><?php echo $about ?></textarea>
                                <p id="msg-about" class=" <?php if ($aboutErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $aboutErr; ?></p>
                            </div>

                            <div class="form-group">
                                <label for="addr"> Address</label>
                                <textarea type="text" class="form-control" id="addr" name="addr"><?php echo $addr ?></textarea>
                                <p id="msg-addr" class=" <?php if ($addrErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $addrErr; ?></p>
                            </div>

                            <div class="form-group">
                                <label for="education" class="required"> Education Qualification</label>
                                <select class="form-control" id="education" name="education">
                                <option selected disabled>Select</option>
                                <option class="dropdown-item" value="High-school" href="#" <?php if ($education && $education === "High-school")  echo "selected" ?>>High School</option>
                                <option class="dropdown-item" value="Bachelors" href="#" <?php if ($education && $education === "Bachelors")  echo "selected" ?>>Bachelors</option>
                                <option class="dropdown-item" value="Doctorate" href="#" <?php if ($education && $education === "Doctorate")  echo "selected" ?>>Doctorate</option>
                                <option class="dropdown-item" value="Masters" href="#" <?php if ($education && $education === "Masters")  echo "selected" ?>>Masters</option>
                                </select>

                                <p id="msg-education" class=" <?php if ($educationErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $educationErr; ?></p>

                            </div>

                            
                            <div class="form-group p-1">
                                <label for="interests"> Interests</label>
                                <select class="form-control" name="interests[]" id="interests" multiple data-live-search="true">
                                    <option class="dropdown-item" value="Sports" <?php if (in_array("Sports", $interests))  echo "selected" ?>>Sports</option>
                                    <option class="dropdown-item" value="Movies" <?php if (in_array("Movies", $interests))  echo "selected" ?>>Movies</option>
                                    <option class="dropdown-item" value="Travelling" <?php if (in_array("Travelling", $interests))  echo "selected" ?>>Travelling</option>
                                    <option class="dropdown-item" value="Photography" <?php if (in_array("Photography", $interests))  echo "selected" ?>>Photography</option>
                                    <option class="dropdown-item" value="Technology" <?php if (in_array("Technology", $interests))  echo "selected" ?>>Technology</option>
                                    <option class="dropdown-item" value="Books" <?php if (in_array("Books", $interests))  echo "selected" ?>>Books</option>
                                </select>

                                <p id="msg-interests" class=" <?php if ($interestsErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $interestsErr; ?></p>

                            </div>
                            
                            <div class="form-group">
                                <label for="linkedin"> LinkedIn</label>
                                <input type="url" class="form-control" id="linkedin" name="linkedin" value="<?php echo $linkedin ?>" />
                                <p id="msg-linkedin" class=" <?php if ($linkedinErr == "") echo "d-none"  ?>  w-100  text-center rounded border bg-error border-danger text-danger"> <?php echo $linkedinErr; ?></p>
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
