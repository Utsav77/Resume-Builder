<?php
session_start();
if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $skills = $_POST["skills"];
    $about = $_POST["about"];
    $address = $_POST["address"];
    $education = $_POST["education"];
    $interest = $_POST["interest"];
    $website = $_POST["website"];
    $error = false;
    
    
    if(empty($username))
    {
        echo "Please enter your name" . "<br />";
        $error = true;
    }
    else if(strlen($username) < 5)
    {
        echo '<p style="color:red;">Username should be minimum 5 characters</p>';
        $error = true;
    }
    
    if(empty($dob))
    {
        echo "Please enter your date of birth" . "<br />";
        $error = true;
    }

    elseif (time() < strtotime('+18 years', strtotime($dob))) {
        echo '<p style="color:red;">Users age should be greater than 18 years</p>';
        $error = true;
    }

    if(empty($gender))
    {
        echo "Please select your gender" . "<br />";
        $error = true;
    }

    if(empty($email))
    {
        echo "Please enter your email" . "<br />";
        $error = true;
    }
    elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    } 
    else {
        echo("<b>$email</b> is not a valid email address")  . "<br />";
        $error = true;
    }

    if(empty($contact))
    {
        echo "Please enter your Contact Number" . "<br />";
        $error = true;
    }

    elseif(strlen($contact) != 10)
    {
        echo '<p style="color:red;">Contact Number should be consists of 10 digits.</p>';
        $error = true;
    }

    if(empty($about))
    {
        echo "Please write about your yourself" . "<br />";
        $error = true;
    }
    elseif(strlen($about) > 40)
    {
        echo '<p style="color:red;">About should be less than 40 characters.</p>';
        $error = true;
    }

    if(empty($address))
    {
        echo "Please enter your address" . "<br />";
        $error = true;
    }
    elseif(strlen($address) > 100)
    {
        echo '<p style="color:red;">Address should be less than 100 characters</p>';
        $error = true;
    }

    if(empty($education))
    {
        echo "Please select your educational qualification" . "<br />";
        $error = true;
    }

    if(filter_var($website, FILTER_VALIDATE_URL)) {

    }
    else {
        echo "<p><b>$website</b> is not a valid URL</p>";
        $error = true;
    }

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
                    $uploaded = move_uploaded_file($_FILES["image"]["tmp_name"],"../assets/" . $new_name);
                    if($uploaded)
                    {
                        $image = "../assets/".$new_name;
                    }
                    else
                    {
                        echo "File could not be uploaded";
                        echo "<br />";
                        $error = true;
                    }   
                }
                else
                {
                    echo "File should be less than 1MB " . $_FILES["image"]["size"];
                    echo "<br />";
                    $error = true;
                }
            }
            else
            {
                //invalid file type
                echo "Please upload JPG or PNG files";
                echo "<br />";
                $error = true;
            }
        }
        else
        {
            //error with the file uploading
            echo "There are some errors with the file";
            echo "<br />";
            $error = true;
        }
    }
    else
    {
        //error message for not selecting any file
        echo "Please browse a file to upload";
        echo "<br />";
        $error = true;
    }
    
    
    if(!$error)
    {
        $_SESSION["username"] = $username;
        $_SESSION["dob"] = $dob;
        $_SESSION["gender"] = $gender;
        $_SESSION["email"] = $email;
        $_SESSION["contact"] = $contact;
        $_SESSION["skills"] = $skills;
        $_SESSION["about"] = $about;
        $_SESSION["address"] = $address;
        $_SESSION["education"] = $education;
        $_SESSION["interest"] = $interest;
        $_SESSION["website"] = $website;
        $_SESSION["image"] = $image;
        header("location:profile.php"); 
    }
    echo '<a href="../index.php">Go to Registration Page</a>';
}
?>
