<?php

// Function To PreProcess The Input Fields
function preProcessInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// All variables
$email = $name = $gender = $phone = $addr =  $education  = $linkedin =  "";
$skill = $interests = [];
$emailErr =  $nameErr = $genderErr = $phoneErr = $addrErr =  $educationErr  = $linkedinErr = $skillErr = $interestsErr = $imgErr =  "";

//Validate Image
if(isset($_POST["submit"]))
{
    if(!empty($_FILES["image"]["name"]))
    {
        //user has browsed a file to upload
        if($_FILES["image"]["error"] == 0)
        {
            //no errors with the file
            
            //alloweed file type array
            $allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");
            
            if((in_array($_FILES["image"]["type"], $allowed_types)))
            {
                //correct file type
                
                //get the dot position
                $dot_pos = strrpos($_FILES["image"]["name"], ".");
                
                //from dot position to the end is the extension
                $extension = substr($_FILES["image"]["name"], $dot_pos);
               
                //use date function to get random number
                $random_name = date("YmdHis");
                
                //add date function value with extension to get unique new file name
                $new_name = $random_name . $extension;
            

                if($_FILES["image"]["size"] < 1000000)
                {
                    $uploaded = move_uploaded_file($_FILES["image"]["tmp_name"],"./assets/" . $new_name);
                    if($uploaded)
                    {
                        $image = "./assets/".$new_name;
                    }
                    else
                    {
                        $imgErr = "File could not be uploaded";
                    }   
                }
                else
                {
                    $imgErr = "File should be less than 1MB " . $_FILES["image"]["size"];
                }
            }
            else
            {
                //invalid file type
                $imgErr = "Please upload JPG or PNG files";
            }
        }
        else
        {
            //error with the file uploading
            $imgErr = "There are some errors with the file";
        }
    }
    else
    {
        //error message for not selecting any file
        $imgErr = "Please browse a file to upload";
    }
}

// Function to do Validation of Fields
function validateFields($key, $re, $ifEmpty, $ifInvalid)
{
    $data = $_POST[$key];
    if (empty($data))
        return $ifEmpty;
    else {
        $tmp = preProcessInput($data);
        if (!preg_match($re, $tmp))
            return $ifInvalid;
    }

    return "";
}

// Function to valiate URL
function validateURL($key, $ifEmpty, $ifInvalid)
{
    $url = $_POST[$key];
    if ($url == "") return "";
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return $ifInvalid;
    }
    return "";
}

// Validate Date 
function validateDate($key, $ifEmpty, $ifUnder , $ifInvalid)
{
    $data = $_POST[$key];
    if (empty($data))
        return $ifEmpty;
    else {
        $test_arr  = explode('-', $data);
        if (checkdate($test_arr[1], $test_arr[2], $test_arr[0])) {
            if (time() < strtotime('+15 years', strtotime($data)))
                return $ifUnder;
            elseif ($test_arr[0] < 1900 )
                return $ifInvalid;
        }
    }
    return "";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name Validation
    $_SESSION["name"] = $name = $_POST["name"];
    $nameErr =   validateFields(
        "name",
        '/^[a-zA-Z ]{1,40}$/',
        "Name is Required!",
        "Name must only contains alphabets and length should be greater than 0 and less than 40"
    );

    // Date of Birth Validation
    $_SESSION["dob"] =  $dob = $_POST["dob"];
    $dobErr = $nameErr ? "" : validateDate("dob", "Date of Birth is Required!", "User should be atleast 15 years old" , "Year of birth should be greater than 1900");

    // Gender Validation
    if (empty($_POST['gender']))
        $genderErr =  $nameErr || $dobErr  ? "" : "Gender is Required!";
    else
        $_SESSION["gender"] = $gender = $_POST['gender'];

    // Email Validation
    $_SESSION["email"] = $email =  $_POST["email"];
    $emailErr = $nameErr || $dobErr || $genderErr   ? "" :  validateFields(
        "email",
        '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',
        "Email is Required!",
        "Enter valid email id"
    );

    // Phone No validation
    $_SESSION["phone"] = $phone = $_POST["phone"];
    $phoneErr = $nameErr || $dobErr || $genderErr  || $emailErr  ? "" :  validateFields("phone", '/^\d{10}$/', "Phone no is Required!", "Enter valid phone no.", "Another account with same PHONE NO exist!");

    // skilss Validation
    $_SESSION["skill"] = $skill = $_POST["skill"];
    $skillErr = $nameErr || $dobErr || $genderErr  || $emailErr || $phoneErr ? "" : (count($skill) === 0 ? "Skills are required!" : "");

    // Vaidate Image 
    $_SESSION["image"] = $image;
    $imgErr = $nameErr || $dobErr || $genderErr  || $emailErr || $phoneErr || $skillErr ? "" : $imgErr;
    
    // About is Optional
    $_SESSION["about"] = $about = $_POST['about'];

    // Validate Address
    $_SESSION["addr"] = $addr = $_POST["addr"];
    $addrErr = $nameErr || $dobErr || $genderErr  || $emailErr || $phoneErr || $skillErr || $imgErr   ? "" : ($addr == "" ? "Addesss is required!" : "");

    //  Education Qualification
    $_SESSION["education"] = $education = $_POST["education"];
    $educationErr = $nameErr || $dobErr || $genderErr  || $emailErr || $phoneErr || $skillErr || $imgErr  || $addrErr  ? "" : ($education == "" ? "Education field is required!" : "");

    // Interests
    $_SESSION["interests"] = $interests = $_POST["interests"];
    $interestsErr = $nameErr || $dobErr || $genderErr  || $emailErr || $phoneErr || $skillErr || $imgErr  || $addrErr || $educationErr ? "" : (count($interests) === 0 ? "Interests are required!" : "");

    // Validate Linkedin
    $_SESSION["linkedin"] = $linkedin = $_POST["linkedin"];
    $linkedinErr = $nameErr || $dobErr || $genderErr  || $emailErr || $phoneErr || $skillErr || $imgErr  || $addrErr || $educationErr || $interestsErr ? "" :  validateURL(
        "linkedin",
        "",
        "Enter valid Linked URL"
    );




    if (!$nameErr && !$dobErr && !$genderErr && !$emailErr && !$phoneErr && !$skillErr &&  !$imgErr &&  !$addrErr && !$educationErr && !$interestsErr && !$linkedinErr && !$githubErr) {
        header('Location: ./php/profile.php');
        exit();
    }
}