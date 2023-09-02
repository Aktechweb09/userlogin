<?php


    //database connection 
  require("database.php");



        if($_POST)
        {
            // extract($_POST);

            $email = $_POST['email'];
            $firstpassword = $_POST['pwd'];
            $status = 1;

            $query = mysqli_query($connect,"SELECT * from registration where email='$email' and status=$status");
            if(mysqli_num_rows($query)!= 0)

            {
                $result = mysqli_fetch_assoc($query);
                 $password = $result['pwd'];

                 $pass_decode = password_verify($firstpassword,$password);
                 if ($pass_decode) 
                 {
                     if (isset($_POST['rememberme'])) {
                         // code...
                        setcookie('emailcookie',$email,time()+86400);
                        setcookie('passwordcookie',$firstpassword,time()+86400);

                        session_start();
                       $_SESSION['id'] = $result['id'];
                        header('location:home.php');
                     }
                     else
                     {
                        session_start();
                        $_SESSION['id'] = $result['id'];
                        header('location:home.php');
                      
                     }
                      
                        
                         echo '<script>
                        alert("login sussccefully");
                    </script>';

                   

                    }else
                    { 
                      echo '<script>
                        alert(" password is incurect");
                    </script>';

                    }

              
            }
            else{
              echo '<script>
                        alert("This Email id is not Registered ! ");
                    </script>';
              
            }
            
        }
    ?>




  <!DOCTYPE html>
<html>
<head>
    <title>User login</title>
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
    <h2>User login</h2>
    <form method="post" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label>
        <input type="password" name="pwd" required><br><br>

        <input type="checkbox"  name="rememberme"> <span style="color: #fff; display: inline-block;">Remember me</span>

        <input style="display: block; width: 90%; margin: 20px;" type="submit" name="log in" >


        <p> New user ? <a href="registration.php"> Registration Now ! </a>  </p>
        <p> Forgate Your password ? <a href="newpassword.php"> Click here ! </a>  </p>
    </form>
</body>
</html>

