
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('01.jpg'); /* URL apni background image ke liye replace karein */
            background-size: cover;
            background-blur: 0.1px; /* Blur intensity adjust karein */
        }

        h2 {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8); /* Transparent white background for form */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #fff;
        }

        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218dbb;
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }

        p a {
            color: #3498db;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>
        
        <input type="submit" name="register" value="Register">

        <p> You have Registared ? <a href="login.php"> Login Now ! </a>  </p>

    </form>
</body>
</html>




<?php
error_reporting(0);
$connect = mysqli_connect("localhost","root","","email"); 
 $status = 0;
if(isset($_POST['register'])) 
{
    $email = $_POST['email'];
   $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $otp = rand(1000,9999);




    // email is already exists 
       $exits = "SELECT * from registration where email='$email'";
       $xresult = mysqli_query($connect,$exits);
       $numexist = mysqli_num_rows($xresult);
       if ($numexist)
        {
           // code...
           
           echo '<script>
                                alert(" username is already exists");
                            </script>';


         }
        else
        {

           // Validation
              if ($password != $confirm_password) 
              {
                  

                   echo '<script>
                                alert("Passwords do not match.");
                            </script>';
              } 

   
            else 
            {
                   $hasspwd = password_hash($password, PASSWORD_BCRYPT);  //password is encrypted 
                   
                   $query = "INSERT INTO registration(email,pwd,otp,status) VALUES('$email','$hasspwd','$otp','$status')";
                   $data = mysqli_query($connect, $query);
                   if ($data)
                    {

                        include('email.php');
                       // $mail->send();
                        //session_start();
                        $_SESSION['v_email'] = $vemail;
                        header("location:otp.php");
                        echo '<script>
                                alert("Registration successful!");
                            </script>';
                   }
                   else
                   {
                    echo '<script>
                            alert("not run");
                        </script>';
                   }  
             }
        }
        
    }
?>


