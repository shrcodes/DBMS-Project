<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="login.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>


   <?php

            

            if (isset($_POST['Login'])) {
               include("config.php"); 
            $emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
            $password2 = mysqli_real_escape_string($conn,$_POST['password2']); 
               $sql =mysqli_query($conn, "SELECT emailid, password2 FROM registerform WHERE emailid = '$emailid' and password2 = '$password2'");
               $count = mysqli_num_rows($sql);
               if($count == 1) 
                  {  
                  /*$_SESSION['UserType']="Admin";*/
                  header('Location:main.php');
                  }  
            else
            {
               echo "<strong>Email and Password you entered did not match</strong> ";  
               }
            }
            ?>       

            
<?php
 

if (isset($_POST['submit'])) {
   include("config.php"); 
$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']); 
   $sql =mysqli_query($conn, "SELECT * FROM admin WHERE username= 'username' and password= '$password'");
   $count = mysqli_num_rows($sql);
   if($count==1)
   {
       //User AVailable and Login Success
       $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
       $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

       //REdirect to HOme Page/Dashboard
       header('location:'.SITEURL.'admin/');
   }
   else
   {
       //User not Available and Login FAil
       $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
       //REdirect to HOme Page/Dashboard
       header('location:'.SITEURL.'admin/login.php');
   }


}

?>

      <div class="wrapper">
         <div class="title-text">
            <div class="title customer">Login</div>
            <div class="title admin">Login</div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="customer" checked>
               <input type="radio" name="slide" id="admin">
               <label for="customer" class="slide customer">Customer</label>
               <label for="admin" class="slide admin">Admin</label>
               <div class="slider-tab"></div>
            </div>
            <form method="" action="#"></form>
            <div class="form-inner">
               <form method="post" class="customer">
                  <div class="field">
                     <input type="text" placeholder="username(emailid)" name="emailid" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="password" name="password2" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="Login" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="register.php">Signup</a>
                  </div>
               </form>
               <form action="#" method="post" class="admin">
                  <div class="field">
                     <input type="text" placeholder="Admin ID" name="username" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" name="password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name=submit value="submit">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const custText = document.querySelector(".title-text .customer");
         const custForm = document.querySelector("form.customer");
         const custBtn = document.querySelector("label.customer");
         const adBtn = document.querySelector("label.admin");
         /*const signupLink = document.querySelector("form .signup-link a");*/
         adBtn.onclick = (()=>{
           custForm.style.marginLeft = "-50%";
           custText.style.marginLeft = "-50%";
         });
         custBtn.onclick = (()=>{
           custForm.style.marginLeft = "0%";
           custText.style.marginLeft = "0%";
         });
         /*signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });*/
      </script>
      
     

   </body>
</html>