function validate(){
    let name = document.forms["RegForm"]["username"];
    let dob = document.forms["RegForm"]["dob"];
    let gender = document.forms["RegForm"]["gender"]; 
    let email = document.forms["RegForm"]["email"]; 
    let contact = document.forms["RegForm"]["contact"]; 
    let skills = document.forms["RegForm"]["skills"]; 
    let about = document.forms["RegForm"]["about"];
    var res = 0;
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

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

    var letters = /^([a-zA-Z ]){2,30}$/;

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
    else if (contact.value.length != 10 && contact.value > 0) { 
        document.getElementById("contact").innerHTML = "Contact Number should be consists of 10digits";
        contact.focus();
        res+=1; 
    }
   
    /*

    if (password.value == "") { 
        document.getElementById("pass").innerHTML= "Please enter your password"; 
        password.focus(); 
        res+=1; 
    }

    if (password.value.length < 8 || password.value.length >= 16) { 
        document.getElementById("pass").innerHTML= "Password should be of length 8 to 15 characters"; 
        password.focus(); 
        res+=1;
    }
    else {
        var pass =  /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/;
        if(password.value.match(pass))
        {
            document.getElementById("pass").innerHTML= "";
        }
        else {
            document.getElementById("pass").innerHTML= "Password must contain at least a symbol, upper and lower case letters and a number"; 
            password.focus(); 
            res+=1;
        }
    }

    if (cpassword.value == "") { 
        document.getElementById("cpass").innerHTML= "Password should be of length 8 to 15 characters"; 
        cpassword.focus(); 
        res+=1; 
    }

    if (password.value !== cpassword.value) { 
        document.getElementById("cpass").innerHTML= "Password doesn't matched"; 
        cpassword.focus();
        res+=1; 
    }
    else {
        document.getElementById("cpass").innerHTML= "";
    }

    if (agree.checked == true) { 
        document.getElementById("check").innerHTML= "";     
    }
    else{
        document.getElementById("check").innerHTML= "Please click the above checkbox to continue"; 
        agree.focus(); 
        res+=1;
    }
    */
    if (res==0){
        return true;
    }
    return false;
    
} 
/*
function validate1() { 
    var email = 
        document.forms["RegForm"]["email"]; 
    var username = 
        document.forms["RegForm"]["uname"];
    var password = 
        document.forms["RegForm"]["pswd"];
    var cpassword = 
        document.forms["RegForm"]["cpswd"];
    var agree =
        document.forms["RegForm"]["remember"];
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (email.value == "") { 
        document.getElementById("mail").innerHTML = "Email address can't be blank";
        email.focus(); 
        return false;
    } 

    if(email.value.match(mailformat)){
        document.getElementById("mail").innerHTML = "";
    }
    else{

        document.getElementById("mail").innerHTML = "Please enter a valid e-mail address."; 
        email.focus(); 
        return false;
    }

    var letters = /^[A-Za-z]+$/;

    if (username.value == "") { 
        document.getElementById("name").innerHTML= "Please enter your name."; 
        username.focus(); 
        return false; 
    } 
        
    if(username.value.match(letters))
    {
        document.getElementById("name").innerHTML= ""; 
    }
    else{ 

        document.getElementById("name").innerHTML= "Username must contain only letters."; 
        username.focus(); 
        return false;
    }

    if (password.value == "") { 
        document.getElementById("pass").innerHTML= "Please enter your password"; 
        password.focus(); 
        return false; 
    }

    if (password.value.length < 8 || password.value.length >= 16) { 
        document.getElementById("pass").innerHTML= "Password should be of length 8 to 15 characters"; 
        password.focus(); 
        return false;
    }
    else {
        var pass =  /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/;
        if(password.value.match(pass))
        {
            document.getElementById("pass").innerHTML= "";
        }
        else {
            document.getElementById("pass").innerHTML= "Password must contain at least a symbol, upper and lower case letters and a number"; 
            password.focus(); 
            return false;
        }
    }

    if (cpassword.value == "") { 
        document.getElementById("cpass").innerHTML= "Password should be of length 8 to 15 characters"; 
        cpassword.focus(); 
        return false; 
    }

    if (password.value !== cpassword.value) { 
        document.getElementById("cpass").innerHTML= "Password doesn't matched"; 
        cpassword.focus();
        return false;
    }
    else {
        document.getElementById("cpass").innerHTML= "";
    }

    if (agree.checked == true) { 
        document.getElementById("check").innerHTML= "";     
    }
    else{
        document.getElementById("check").innerHTML= "Please click the above checkbox to continue"; 
        agree.focus(); 
        return false;
    }

    
    return true; 
    
}
*/
