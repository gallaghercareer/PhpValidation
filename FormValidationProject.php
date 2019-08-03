<?php
//Error variables are initialized blank so the page doesn't load the error message upon starting
$nameError="";
$emailError="";
$genderError="";
$websiteError="";

//Triggered by Form Submission
if(isset($_POST["submit"])){
        //validate name
        if(empty($_POST["name"])){
            $nameError="Name is Required";
        }
        else{
            $name=Test_User_Input($_POST["name"]);
            if(!preg_match("/^[A-Za-z. ]*$/", $name)) {
                $nameError = "Only letters & whitespaces are allowed";
            }
        }
        //validate email
        if(empty($_POST["email"])){
            $emailError="Email is Required";
        }
        else{
            $email=Test_User_Input($_POST["email"]);
            if (!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email)){
                $emailError = "You must enter a proper email address";
            }
        }
        //validate gender
        if(empty($_POST["gender"])){
            $genderError="Gender is Required";
        }
        else{
            $gender=Test_User_Input($_POST["gender"]);

        }
        //validate website
        if(empty($_POST["website"])){
            $websiteError="Website is Required";
        }
        else{
            $website=Test_User_Input($_POST["website"]);
            if (!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $website)){
                $websiteError = "Invalid Website address. Strict format requirements";
            }
        }

        //Display data submitted by form
        //ONLY if all fields are properly validated
        if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["gender"]) && !empty($_POST["website"])) {
            if((preg_match("/^[A-Za-z. ]*$/", $name)==true) && (preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/", $email)==true)
            && (preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/", $website)==true)){
                echo "<h3> Data From Submission: </h3> <br>";
                echo "Name: {$_POST["name"]} <br>";
                echo "Email: {$_POST["email"]} <br>";
                echo "Gender: {$_POST["gender"]} <br>";
                echo "Website: {$_POST["website"]} <br>";
            }
        }
}

function Test_User_Input($Data)
{
    return $Data;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .errorText {
        color: red;
    }

</style>
<body>
<h2> Form Validation with PHP </h2>
<form action ="FormValidationProject.php" method="post">
    <fieldset>
        <legend>Please Fill out the following fields. </legend>
        <label for="Name">Name:<br></label>
        <input class="input" type="text" Name="name" value="">
        <?php echo $nameError; ?>
        <br>
        <br>
        Email:
        <br>
        <input class="input" type="text" Name="email" value="">
        <div class="errorText"> <?php echo $emailError; ?> </div>
        <br>
        <br>
        Gender:
        <br>
        Male
        <input class="radio" type="radio" Name="gender" value="Male">
        Female
        <input class="radio" type="radio" Name="gender" value="Female">
        <?php echo $genderError; ?>
        <br>
        <br>
        Website:
        <br>
        <br>
        <input class ="input" type="text" Name="website" value="">
        <?php echo $websiteError; ?>
        <br>
        <br>
        Comments:
        <br>
        <textarea name="comments" rows="5" cols="25"  value=""> </textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="Submit">
    </fieldset>
</form>
</body>
</html>
