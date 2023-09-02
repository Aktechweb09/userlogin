
<!DOCTYPE html>
<html>
<head>
    <title>password change</title>
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
            color: #fff;
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
    <h2>password change..</h2>
    <form method="post" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>
        
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>




<?php
 session_start();
 $vemail = $_SESSION['v_email'];

$connect = mysqli_connect("localhost","root","","email"); 

if(isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


           // Validation
              if ($password != $confirm_password) 
              {
                  echo "Passwords do not match.";
              } 

   
            else 
            {
                   $hasspwd = password_hash($password, PASSWORD_BCRYPT);  //password is encrypted 
                   
                    $data =  "SELECT * from registration where(email='$email')";
                     $query = mysqli_query($connect, $data);
                        if(mysqli_num_rows($query)!=0)
                        {
                            $result = mysqli_fetch_assoc($query);
                            $id = $result['id'];
                            $result1 = "UPDATE registration SET pwd='$hasspwd' where id='$id'";
                            $query1 = mysqli_query($connect, $result1);
                             if($query1)
                                {
                                     echo " updated password";

                                   header('location:login.php');

                                }
                                else
                                {
                                    echo "something went wrong";
                                }
              
                        }
                        else
                           {
                            echo " this email id is nor registered! ";
                           }  
             }
        
        
    }
?>
