
<?php include('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>REGISTER</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="center">
        <h1>Register</h1>

        
<?php 
            if (isset($_POST['submit']))
                {
                    
                    
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $phonenumber=$_POST['phonenumber'];
                    $emailid =$_POST['emailid'];
                    $password1=$_POST['password1'];
                    $password2=$_POST['password2'];
           // product image //$Item_Photo = addslashes(file_get_contents($_FILES['Item_Photo']['tmp_name'])); 
           if($password1 != $password2) {
           array_push($errors, "The two passwords do not match");
          }  
                    
                    $sql="INSERT into registerform(firstname,lastname,phonenumber,emailid,password1,password2) values ('$firstname','$lastname','$phonenumber','$emailid','$password1','$password2')";   
                  
                        if(mysqli_query($db,$sql))
                        {
                            echo "Registration Successful";
                        }
                        else
                        {
                           echo "Failed to Register.Try again";
                        }  
                } 
            ?>


        <form method="post" action="">
            <div class="txt_field">
                <input type="text" name="firstname" required>
                <span></span>
                <label>First name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="lastname"required>
                <span></span>
                <label>Last name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="phonenumber" required>
                <span></span>
                <label>Phone number</label>
            </div>
            <div class="txt_field">
                <input type="text" name="emailid" required>
                <span></span>
                <label>Email-id</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password1" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password2" required>
                <span></span>
                <label>Confirm password</label>
            </div>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>