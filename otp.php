
<?php
 require("database.php");
 session_start();
 $vemail = $_SESSION['v_email'];
 if($_POST){
    extract($_POST);
    $data =  "SELECT * from registration where(otp='$otp')";
    $query = mysqli_query($connect, $data);
    if(mysqli_num_rows($query)!=0){
        $result = mysqli_fetch_assoc($query);
        $id = $result['id'];
        $status = 1;
        $result1 = "UPDATE registration SET status='$status' where id='$id'";
        $query1 = mysqli_query($connect, $result1);
        if($query1){

            header('location:login.php');
        }else{
            
            echo        '<script>
                            alert("something went wrong");
                        </script>';
        }
       
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
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

     

        input[type="text"]
       {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            margin: 20px ;
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

    </style>
</head>
<body>
    <div class="container" align="center">
        <h2>OTP Verification</h2>
        <form action="" method="POST">
            <input type="text" name="otp" placeholder="Enter your otp" required>
      
            <input style="display: block; width: 40% ; margin: 20px;" type="submit" name="submit" value="submit">
        </form>

     
    </div>
</body>
</html>
