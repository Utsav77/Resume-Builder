function validate(){
    let name = document.forms["RegForm"]["username"];
    let dob = document.forms["RegForm"]["dob"];
    let gender = document.forms["RegForm"]["gender"]; 
    let email = document.forms["RegForm"]["email"]; 
    let contact = document.forms["RegForm"]["contact"]; 
    let skills = document.forms["RegForm"]["skills"]; 
    let about = document.forms["RegForm"]["about"];
    let address = document.forms["RegForm"]["address"];
    let res = 0;
    let mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (email.value == "") { 
        document.getElementById("mail").innerHTML = "Email address can't be blank";
        email.focus(); 
        res+=1; 
    } 

    if(email.value.match(mailformat)){
        document.getElementById("mail").innerHTML = "";
    }
    else{

        document.getElementById("mail").innerHTML = "Please enter a valid e-mail address."; 
        email.focus(); 
        res+=1;
    }

    let letters = /^[A-Za-z]+$/;

    if (name.value == "") { 
        document.getElementById("name").innerHTML= "Please enter your name."; 
        name.focus(); 
        res+=1; 
    } 
        
    if(name.value.match(letters))
    {
        document.getElementById("name").innerHTML= ""; 
    }
    else{
        document.getElementById("name").innerHTML= "Username must contain only letters."; 
        name.focus(); 
        res+=1;
    }

    if (contact.value == "") { 
        document.getElementById("contact").innerHTML = "Contact Number can't be blank";
        contact.focus(); 
        res+=1; 
    }
    else if (contact.value.length != 10 || contact.value < 0) { 
        document.getElementById("contact").innerHTML = "Contact Number should be consists of 10digits";
        contact.focus();
        res+=1; 
    }

    if (dob.value == "") { 
        document.getElementById("dob").innerHTML= "Please enter your Date of Birth."; 
        dob.focus(); 
        res+=1; 
    } 

    if (gender.value == "") { 
        document.getElementById("gender").innerHTML= "Please select your gender."; 
        gender.focus(); 
        res+=1; 
    } 

    if (skills.value == "") { 
        document.getElementById("skills").innerHTML= "Please select any of the skills"; 
        skills.focus(); 
        res+=1; 
    } 

    if (about.value == "") { 
        document.getElementById("about").innerHTML= "Please write about yourself."; 
        about.focus(); 
        res+=1; 
    } 

    if (address.value == "") { 
        document.getElementById("address").innerHTML= "Please enter your address."; 
        address.focus(); 
        res+=1; 
    } 

    if(res==0){
        return true;
    }
    return false;
   
}