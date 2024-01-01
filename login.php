
<?php
session_start();
include "incloud/conn.php";

@$email= $_POST['email'] ;
@$pass= $_POST['pass'] ;
@$btn= $_POST['btn'] ;


if(isset($btn)){


    if(empty($email)||empty($pass)){
        echo "<div class='alert alert-danger'>"."الرجاء ادخال البريد الكتروني وكلمة السر"."</div>";

    }
    
    
    else{
        $query = "SELECT * FROM admin WHERE email='$email'and password='$pass'";
        $res = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($res);
        
    if(@in_array($email,$row) && @in_array($pass,$row)){

            echo "<div class='alert alert-success'>"."  مرحبا سيتم تحويلك الى لوحة تحكم"  ."</div>";
            $_SESSION['id']=$row['id'];

            header('REFRESH:2;URL=dashbord.php');



        }else{
            echo "<div class='alert alert-danger'>"." معلومات غير مطابقة"."</div>";

        }
        


}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/dashbord.css">


    <style>
        .login{
            width: 300px;
            margin: 80px auto;
        }
        .login h5{
            color:#555;
            margin-bottom: 20px;
            text-align: center;
        }
        .login button{
          
         
            margin-right: 115px
        }
    </style>
</head>
<body>

<div class="login">
    <form action="login.php" method="POST">
        <h5>تسجيل دخول</h5>
        <div class="form-group">
            <label for="mail">البريد الكتروني </label>
            <input type="text" name="email" id="mail" class="form-control">
        </div>

        <div class="form-group">
            <label for="pass">كلمة المرور</label>
            <input type="text" name="pass" id="pass" class="form-control">
        </div>
        
        <button class="custom-btn" name="btn">تسجيل</button>
   
    </form>
</div>



<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html> 